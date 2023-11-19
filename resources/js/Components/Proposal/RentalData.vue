<script setup>
import endpoint from '@/Services/endpoints'
import api from "@/Services/server";

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
  loadingSkeleton: true
})

//Cadastro de Fiador
const form = useForm({
  email: null,
  name: null,
  user_id: props.user.id,
  proposal_id: props.user.proposal_id,
})

//endpoint para buscar dados
const getData = () => {
  endpoint.getData('rental_datas', props.user.proposal_id, props.user.id, 'personal')
    .then(res => {
      console.log(res)
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
  const resp = await axios.get('https://espindolaimobiliaria.com.br/api/immobile-all')
    .then(response => {
      response.data.forEach(el => {
        // console.log({el})
        state.immobiles.push(el)
        state.immobilesItens.push(el.immobiles_code + ' - ' + el.immobiles_address + ', nº ' + el.immobiles_number)
      });
      // 
    })
    .catch(err => {
      // Handle errors
      console.error(err);
    });
}

const detailsImmobile = (value) => {
  console.log({ value })
  let code = value.substring(0, 6);
  console.log(state.immobiles)
  let detailsImmobile = state.immobiles.filter(immob => immob.immobiles_code === code);
  console.log(detailsImmobile)
  state.detailsImmob = detailsImmobile
  state.loadingSkeleton = false

}


onMounted(() => {
  getData()
  getImmobiles();
})

const closeDialog = (value) => {
  state.dialogGuarantor = value
}

const submit = () => {
  api.put('/guarantor/update', form)
    .then(res => {
      //Mensagem de sucesso
      if (res.data.message !== 'Validation errors') {
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
</script>

<template>
  <div>
    <v-row no-gutters>
      <v-badge color="default" content="Referencia do Imovel" inline></v-badge>
    </v-row>
    <v-container>
      <div class="m-2 flex w-full flex text-center justify-center">
        <h6>
          Vamos iniciar sua proposta, nessa etapa inicial, você informará qual imóvel você está interessado para enviar
          sua proposta. Super importante você preencher o máxima de informação possível.
        </h6>
        
      </div>
      <v-row>
        <v-col cols="12" md="12">
          <div class="text-h5 text-center">
            Informações do imóvel
          </div>
          <v-skeleton-loader :loading="state.loadingSkeleton" type="list-item-two-line"
            v-if="state.detailsImmob.length === 0">
          </v-skeleton-loader>
        </v-col>
        <v-col cols="12">

          <v-sheet elevation="5" class="mx-auto p-3" rounded="rounded" v-if="state.detailsImmob.length > 0">
            <div class='text-base leading-7'>
              <p class='font-medium text-gray-800 text-sm'>{{ state.detailsImmob[0].immobiles_property_title }}</p>

              <p class="text-gray-800/50 text-sm">
                <strong>Logradouro:</strong> {{ state.detailsImmob[0].immobiles_address }},
                <strong>nº: </strong> {{ state.detailsImmob[0].immobiles_number }},
                <strong>Bairro: </strong> {{ state.detailsImmob[0].immobiles_district }},
                <strong>Cidade: </strong>{{ state.detailsImmob[0].immobiles_city }},
                <strong>IPTU Mensal: </strong>{{ state.detailsImmob[0].immobiles_iptu_price }},
                <strong>Cond.: </strong>{{ state.detailsImmob[0].immobiles_condominium_price }}               
              </p>
            </div>
          </v-sheet>

        </v-col>
      </v-row>

    </v-container>
    <v-row no-gutters>
      <v-col col cols="12" sx="12" sm="12" md="4">
        <v-select class="m-2" variant="underlined" name="refImmobile" label="Pesquisar o Imóvel"
          :items="state.immobilesItens" @blur="saveField($event.target)" @update:modelValue="detailsImmobile($event)"
          v-model="state.refImmobile" loading="true">
        </v-select>
      </v-col>
      <v-col col cols="12" sx="12" sm="12" md="4">
        <v-select class="m-2" variant="underlined" label="Finalidade" name="finality" @blur="saveField($event.target)"
          :items="['Comercial', 'Residencial', 'Temporada']" v-model="state.finality"></v-select>
      </v-col>
      <v-col col cols="12" sx="12" sm="12" md="4">
        <v-select class="m-2" variant="underlined" label="Atendente responsável" name=""
          :items="['Ana', 'Paulo', 'Maria']"></v-select>
      </v-col>
    </v-row>
    <v-row no-gutters>

      <v-col col cols="12" sx="12" sm="12" md="4">
        <v-text-field class="mt-1" label="Prazo Desejado" @blur="saveField($event.target)" name="term" model-value="30"
          suffix="meses" v-model="state.term"></v-text-field>
      </v-col>
      <v-col col cols="12" sx="12" sm="12" md="4">
        <v-select class="m-2" variant="underlined" label="Tipo de garantia" @update:modelValue="guarantor($event)"
          @blur="saveField($event.target)" name="warrantyType" :items="['Carta Fiança', 'Caução', 'Crédito', 'Fiador']"
          v-model="state.warrantyType">
        </v-select>
      </v-col>
      <v-col col cols="12" sx="12" sm="12" md="4">
        <v-text-field class="m-1" label="Aluguel Proposto" @blur="saveField($event.target)" name="proposedValue"
          prefix="R$" v-model="state.proposedValue" v-mask-decimal.br="2"></v-text-field>
      </v-col>
      <v-col col cols="12" sx="12" sm="12" md="12">
        <v-textarea class="m-1" rows="3" variant="outlined" label="Observação" @blur="saveField($event.target)" name="ps"
          v-model="state.ps" maxlength="120" single-line></v-textarea>
      </v-col>
      <DialogProposal :dialog="state.dialogGuarantor" @updateDialog="closeDialog">
        <v-row>
          <v-col cols="12">
            <div class="rounded-lg bg-white shadow-lg">
              <p class="m-2 text-gray-500 dark:text-gray-400 py-5">
                <v-icon icon="fas fa-circle-info"></v-icon>
                Você escolheu um fiador como garantia, agora precisa de algumas informações para enviar um
                e-mail para ele convidando a preencher um cadastro relacionado a essa sua proposta.
              </p>
            </div>
            <form @submit.prevent="submit">
              <v-card>
                <v-card-text>
                  <v-text-field class="m-1" label="Nome do Fiador" variant="underlined" name="proposedValue"
                    v-model="form.name"></v-text-field>
                  <v-text-field class="m-1" label="E-mail do Fiador" variant="underlined" name="proposedValue"
                    v-model="form.email"></v-text-field>
                </v-card-text>
                <v-card-actions>

                  <v-btn color="" :block="true" class="bg-primary mb-2" type="submit">
                    Confirmar convite
                    <v-icon icon="fas fa-paper-plane" class="mb-1 ml-1" size="small"></v-icon>
                  </v-btn>
                </v-card-actions>
              </v-card>
            </form>
          </v-col>

        </v-row>
      </DialogProposal>
    </v-row>
  </div>
</template>

<style lang="scss" scoped></style>
