<script setup>
import endpoint from '@/Services/endpoints'
import {api,urlBaseApi} from "@/Services/server";
import Guarantor from './Guarantor.vue';
import functions from "@/Util/functions";
import axios from 'axios';
import DialogProposal from './DialogProposal.vue'
import {
  reactive,
  onMounted,
  defineProps,
  defineEmits,
  ref
} from 'vue';
import {
  useForm
} from '@inertiajs/vue3'



const props = defineProps({
  user: Object
});

const emit = defineEmits(['updateInput', 'update:menu']);

const saveField = (val) => {
  //Propriedade do valor é preenchido apos um tratamento de campo e valor
  var valueInputNew = {
    user_id: props.user.id,
    nameInput: val.name,
    proposal_id: props.user.proposal_id,
    route: 'rental-data'
  }

  /**
   * Refatorar para um função externa
   */
  switch (val.name) {
    case 'proposedValue':
      var newValue = 0;
      newValue = parseInt(val.value.replace(/[\D]+/g, ''));
      newValue = newValue + '';
      newValue = newValue.replace(/([0-9]{2})$/g, ".$1");
      valueInputNew.valueInput = newValue
      break;

    default:
      valueInputNew.valueInput = val.value
      break;
  }
  //enviando informação para o componente pai
  emit('updateInput', valueInputNew);
}
//Dados da tabela
const state = reactive({
  type: '',
  proposedValue: 0,
  finality: '',
  ps: '',
  refImmobile: '',
  typeRentalUser: '',
  warrantyType: '',
  term: '',
  dialogGuarantor: false,
  immobiles: [],
  immobilesItens: [],
  detailsImmob: [],
  loadingSkeleton: true,
  reloadGuarantor: false
})

//Cadastro de Fiador
const form = useForm({
  email: null,
  name: null,
  user_id: props.user.id,
  proposal_id: props.user.proposal_id,
  object_type: 'personal'
})

//endpoint para buscar dados
const getData = () => {
  endpoint.getData('rental_datas', props.user.proposal_id, props.user.id, 'personal')
    .then(res => {
      //Preenchendo os dados
      state.finality = res.warrantyType
      state.proposedValue = res.proposedValue
      state.ps = res.ps
      state.refImmobile = res.refImmobile
      state.typeRentalUser = res.typeRentalUser
      state.warrantyType = res.warrantyType
      state.term = res.term
    })
    .catch(err => {
      console.log({
        err
      })
    })

}

const getImmobiles = async () => {
  const resp = await axios.get(urlBaseApi + 'all-immobile')
    .then(response => {
      response.data.original.forEach(el => {
        state.immobiles.push(el)
        state.immobilesItens.push('Cod. ' + el.propertyCode + 
        ' - ' + el.address + ', nº ' + el.number + ', ' + el.neighborhood)
      });
      
    })
    .catch(err => {
      // Handle errors
      console.error(err);
    });
}

const detailsImmobile = (value) => {
  const resultado = getValueBetweenDotAndHyphen(value);
  console.log({resultado})
  let detailsImmobile = state.immobiles.filter(immob => immob.propertyCode === resultado);
  console.log({detailsImmobile})
  state.detailsImmob = detailsImmobile
  state.loadingSkeleton = false

}

// Retornando o valor que tiver entre o Cod. e o hifen Cod. xxxxxx -
function getValueBetweenDotAndHyphen(str) {
    const match = str.match(/\.(.*?)-/);
    return match ? match[1].trim() : null;
}

onMounted(() => {
  getData()
  getImmobiles();
  var termsList = functions.termWanted
})

const closeDialog = (value) => {
  state.dialogGuarantor = value
}

const submit = () => {
  api.put('/guarantor/update', form)
    .then(res => {
      //Mensagem de sucesso
      if (res.data.message !== 'Validation errors') {
        state.reloadGuarantor = true;
        functions.toast('Sucesso', 'Fiador Cadastrado e receberá um e-mail.', 'success')
      } else {
        if (res.data && res.data.data !== undefined) {
          Object.entries(res.data.data).forEach(([key, value]) => {
            functions.toast('Ops!', value[0], 'error')
          });
        }
        return false;
      }
    })
    .catch(err => {
      console.log({ err })
    })

}

//Chamando o dialog para cadastrar fiador
const guarantor = (event) => {
  if (event == 'Fiador') {
    state.dialogGuarantor = true
  }
}

const receiveEmitguarantor = (value) => {
  state.reloadGuarantor = value
}

</script>

<template>
  <div>
    <v-row no-gutters>
      <v-badge color="default" content="Referencia do Imovel" inline></v-badge>
    </v-row>
    <v-container>
      <div class="m-2 flex w-full text-center justify-center">
        <h6>
          Vamos iniciar sua proposta, nessa etapa inicial, você informará qual imóvel você está interessado para enviar
          sua proposta. Super importante você preencher o máxima de informação possível.
        </h6>
      </div>
      <v-row>
        <v-col cols="12">
          <v-sheet elevation="5" class="mx-auto p-3" rounded="rounded" v-if="state.detailsImmob.length > 0">
            <div class='text-base leading-7'>
              <p class='font-medium text-gray-800 text-sm'>{{ state.detailsImmob[0].propertyTitle }}</p>

              <p class="text-gray-800/50 text-sm">
                <strong>Logradouro:</strong> {{ state.detailsImmob[0].address }},
                <strong>nº: </strong> {{ state.detailsImmob[0].number }},
                <strong>Bairro: </strong> {{ state.detailsImmob[0].neighborhood }},
                <strong>Cidade: </strong>{{ state.detailsImmob[0].city }},
                <strong>IPTU Mensal: </strong>{{ state.detailsImmob[0].propertyIptPrice }},
                <strong>Cond.: </strong>{{ state.detailsImmob[0].condominiumPrice }}
              </p>
            </div>
          </v-sheet>

        </v-col>
      </v-row>

    </v-container>
    <v-row no-gutters>
      <v-col col cols="12" sx="12" sm="12" md="4">
        <v-combobox variant="underlined" name="refImmobile" label="Pesquisar o Imóvel(*)" :items="state.immobilesItens"
          @blur="saveField($event.target)" @update:modelValue="detailsImmobile($event)"
          v-model="state.refImmobile">
        </v-combobox>
      </v-col>
      <v-col col cols="12" sx="12" sm="12" md="4">
        <v-select class="m-2" variant="underlined" label="Finalidade(*)" name="finality" @blur="saveField($event.target)"
          :items="['Comercial', 'Residencial', 'Temporada']" v-model="state.finality"></v-select>
      </v-col>
      <v-col col cols="12" sx="12" sm="12" md="4">
        <v-select class="m-2" variant="underlined" label="Atendente responsável" name=""
          :items="['Ana', 'Paulo', 'Maria']"></v-select>
      </v-col>
    </v-row>
    <v-row no-gutters>

      <v-col col cols="12" sx="12" sm="12" md="4">
        <v-select 
          class="m-2" variant="underlined" label="Prazo Desejado em meses" 
          name="term" suffix="meses" :items="functions.termWanted" 
          v-model="state.term">
        </v-select>
      </v-col>
      <v-col col cols="12" sx="12" sm="12" md="4">
        <v-select class="m-2" variant="underlined" label="Tipo de garantia(*)" @update:modelValue="guarantor($event)"
          @blur="saveField($event.target)" name="warrantyType" :items="functions.typeOfGuarantee"
          v-model="state.warrantyType">
        </v-select>
      </v-col>
      <v-col col cols="12" sx="12" sm="12" md="4">
        <v-text-field class="m-1" label="Aluguel Proposto" @blur="saveField($event.target)" name="proposedValue"
          prefix="R$" v-model="state.proposedValue" v-mask-decimal.br="2"></v-text-field>
      </v-col>
      <v-col col cols="12" sx="12" sm="12" md="12">
        <v-textarea class="m-1" rows="3" variant="outlined" label="Observação"
         @blur="saveField($event.target)" name="ps"
         v-model="state.ps" maxlength="120" single-line></v-textarea>
      </v-col>
      <v-row>
        <DialogProposal :dialog="state.dialogGuarantor" @updateDialog="closeDialog">
          <v-col cols="12" sx="12" sm="12" md="4">
            <div class="rounded-lg bg-white shadow-lg">
              <p class="m-2 text-gray-500 dark:text-gray-400 py-5">
                <v-icon icon="fas fa-circle-info"></v-icon>
                Você escolheu um fiador como garantia, agora precisa de algumas informações para enviar um
                e-mail para ele convidando a preencher um cadastro relacionado a essa sua proposta.
              </p>
            </div>

          </v-col>
          <v-col cols="12" sx="12" sm="12" md="8">
            <form @submit.prevent="submit">
              <v-card>
                <v-card-text>
                  <v-text-field class="m-1" label="Nome do Fiador" variant="underlined" name="guarantorName"
                    v-model="form.name"></v-text-field>
                  <v-text-field class="m-1" label="E-mail do Fiador" variant="underlined" name="guarantorEmail"
                    v-model="form.email"></v-text-field>
                </v-card-text>
                <v-card-actions>
                  <v-btn color="" :block="true" class="bg-primary mb-2" type="submit">
                    Confirmar Convite
                    <v-icon icon="fas fa-paper-plane" class="mb-1 ml-1" size="small"></v-icon>
                  </v-btn>
                </v-card-actions>
              </v-card>
            </form>

            <Guarantor
              :proposal="props.user.proposal_id"
              :user="props.user"
              :guarantor="state.reloadGuarantor"
              @loadGuarantor="receiveEmitguarantor"
            />
          </v-col>

        </DialogProposal>
      </v-row>

    </v-row>
  </div>
</template>

<style lang="scss" scoped></style>
