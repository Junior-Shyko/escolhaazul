<script setup>
import { reactive, onMounted } from 'vue';
import functions from "@/Util/functions";
import endpoint from '@/Services/endpoints'
import TitleAndSubtitle from './TitleAndSubtitle.vue';

const props = defineProps({
  user: Object,
  object_type: String
});

const emit = defineEmits(['updateInput']);

const saveField = (val) => {
  //  console.log({val})
  //Propriedade do valor é preenchido apos um tratamento de campo e valor
  var valueInputNew = {
    user_id: props.user.id,
    nameInput: val.name,
    proposal_id: props.user.proposal_id,
    route: 'bank-personal',
    object_type: props.object_type
  }
  var newValue = '';
  //Formatando numero de telefone
  if(val.name == 'phone_manager' ) {
    newValue = functions.formatPhone(val.value)
    console.log({newValue})
    valueInputNew.valueInput = newValue
  }

  /**
   * Refatorar para um função externa
   */
  switch (val.name) {
    case 'limit_credit_card1':
      newValue = functions.valurMoneyUSA(val.value)
      valueInputNew.valueInput = newValue
      break;
    case 'credit_approved':
      newValue = functions.valurMoneyUSA(val.value)
      valueInputNew.valueInput = newValue
      break;
    case 'limit_credit_card2':
      newValue = functions.valurMoneyUSA(val.value)
      valueInputNew.valueInput = newValue
      break;
    case 'client_since':
      newValue = functions.brDatetoUsa(val.value)
      valueInputNew.valueInput = newValue
      break;

    default:
      valueInputNew.valueInput = val.value
      break;
  }

  //enviando informação para o componente pai
  emit('updateInput', valueInputNew);
}

const state = reactive({
  dialogBank: false,
  name_bank: '',
  name_manager: '',
  name_agency: '',
  phone_manager: '',
  number_acoount: '',
  email_manager: '',
  client_since: '',
  name_credit_card1: '',
  credit_approved: '',
  name_credit_card2: '',
  limit_credit_card1: '',
  limit_credit_card2: ''
})

//endpoint para buscar dados
const getData = () => {
  endpoint.getData('banks', props.user.proposal_id, props.user.id, 'personal')
    .then(res => {
      //Preenchendo os dados
      state.name_bank      = res.name_bank
      state.name_manager = res.name_manager
      state.name_agency            = res.name_agency
      state.phone_manager   = res.phone_manager
      state.number_acoount= res.number_acoount
      state.email_manager  = res.email_manager
      state.client_since      = functions.usaDatetoBr(res.client_since);
      state.name_credit_card1  = res.email_manager
      state.credit_approved  = res.credit_approved
      state.limit_credit_card1  = res.limit_credit_card1
      state.name_credit_card2  = res.name_credit_card2
      state.limit_credit_card2  = res.limit_credit_card2
    })
    .catch(err => {
      console.log({ err })
    })

}

onMounted(() => {
  getData()
})

</script>

<template>
  <div>
    <v-row>
      <v-col cols="12" @click="state.dialogBank = true">
        <v-btn color="white" @click="state.dialogBank = true" elevation="2" icon="fas fa-building-columns">


        </v-btn>
        <v-row>
          <v-col cols="12">
            <div class="flex justify-center">
              <small class="font-semibold">Bancária</small>
            </div>
            <v-dialog v-model="state.dialogBank" activator="parent">
              <v-card>
                <v-card-text>
                  <TitleAndSubtitle title="Referência Bancária" sub="Seus dados são salvos automaticamente." />
                  <v-row>
                    <v-col cols="12" xs="12" sm="12" md="4">
                        <v-combobox
                            label="Nome do Banco" name="name_bank"
                            variant="underlined" @blur="saveField($event.target)"
                            :items="functions.banks"
                        ></v-combobox>
                      <v-text-field label="Nome do Gerente" variant="underlined" @blur="saveField($event.target)"
                        v-model="state.name_manager" name="name_manager">
                      </v-text-field>
                    </v-col>
                    <v-col cols="12" xs="12" sm="12" md="4">
                <v-text-field label="Agência" variant="underlined"
                  @blur="saveField($event.target)"
                  name="name_agency" v-model="state.name_agency">
                </v-text-field>
                <v-text-field label="Telefone" variant="underlined"
                  @blur="saveField($event.target)" v-mask-phone.br v-model="state.phone_manager"
                  name="phone_manager"
                ></v-text-field>
              </v-col>
              <v-col cols="12" xs="12" sm="12" md="4">
                <v-text-field label="Nº Conta" variant="underlined"
                  @blur="saveField($event.target)" v-model="state.number_acoount"
                  name="number_acoount"
                ></v-text-field>
                <v-text-field label="E-mail" variant="underlined"
                  @blur="saveField($event.target)"  v-model="state.email_manager"
                  name="email_manager"
                ></v-text-field>
              </v-col>
              <v-col cols="12" xs="12" sm="12" md="4">
                <v-text-field label="Cliente Desde" variant="underlined"
                  @blur="saveField($event.target)" v-mask-date.br v-model="state.client_since"
                  name="client_since"
                ></v-text-field>
                <v-text-field label="Limite 01" variant="underlined"
                  @blur="saveField($event.target)" v-mask-decimal.br="2" v-model="state.limit_credit_card1"
                  name="limit_credit_card1"
                ></v-text-field>
              </v-col>
              <v-col cols="12" xs="12" sm="12" md="4">
                <v-text-field label="Crédito Pré-Aprovado" variant="underlined"
                  @blur="saveField($event.target)" v-mask-decimal.br="2" v-model="state.credit_approved"
                  name="credit_approved"
                ></v-text-field>
                <v-text-field label="Cartão de Crédito 02" variant="underlined"
                  @blur="saveField($event.target)"
                  name="name_credit_card2" v-model="state.name_credit_card2"
                ></v-text-field>
              </v-col>
              <v-col cols="12" xs="12" sm="12" md="4">
                <v-text-field label="Cartão de Crédito 01" variant="underlined"
                  @blur="saveField($event.target)" v-model="state.name_credit_card1"
                  name="name_credit_card1"
                ></v-text-field>
                <v-text-field label="Limite 02" variant="underlined"
                  @blur="saveField($event.target)" v-mask-decimal.br="2" v-model="state.limit_credit_card2"
                  name="limit_credit_card2"
                ></v-text-field>
              </v-col>
                  </v-row>

                </v-card-text>
                <v-card-actions  class="flex justify-between bg-blue-grey-lighten-4">
                  <v-btn class="bg-blue-grey-lighten-5 ml-5 mb-2"  @click="state.dialogBank = false">
                      Continuar
                  </v-btn>
                </v-card-actions>
              </v-card>
            </v-dialog>
          </v-col>
        </v-row>
      </v-col>
    </v-row>
  </div>
</template>

<style lang="scss" scoped></style>
