<script setup>
import { reactive, onMounted } from 'vue';
import TitleAndSubtitle from './TitleAndSubtitle.vue';
import endpoint from '@/Services/endpoints'
import functions from "@/Util/functions.js";

const props = defineProps({
  user: Object,
  object_type: String
});
const emit = defineEmits(['updateInput']);
const saveField = (val) => {
    console.log(val)
    var valueInputNew = {
      user_id: props.user.id,
      nameInput: val.name,
      proposal_id: props.user.proposal_id,
      route: 'real-state',
      object_type: props.object_type,
      valueInput : val.value
    }
    //enviando informação para o componente pai
  emit('updateInput', valueInputNew);
}

const state = reactive({
  dialogRealState: false,
  name: '',
  creci: '',
  email: '',
  phone_fixed: '',
  phone_mobile: '',
  object_id: '',
  object_type: '',
})

//endpoint para buscar dados
const getData = () => {
  endpoint.getData('real_states', props.user.proposal_id, props.user.id, 'personal')
    .then(res => {
      //Preenchendo os dados
      state.name          = res.name
      state.creci         = res.creci
      state.email         = res.email
      state.phone_fixed   = res.phone_fixed
      state.phone_mobile  = res.phone_mobile
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
        <v-col cols="12">
          <v-btn color="white"
            @click="state.dialogRealState = true"
            elevation="2" icon="fas fa-sign-hanging">
          </v-btn>
          <v-row>
            <v-col cols="12">
              <div class="flex justify-center">
                <small class="font-semibold">Imobiliária</small>
              </div>
              <v-dialog v-model="state.dialogRealState" activator="parent">
                <v-card>
                  <v-card-text>
                    <TitleAndSubtitle title="Referência Imobiliária" sub="Seus dados são salvos automaticamente." />
                    <v-row>
                      <v-col cols="12" xs="12" sm="12" md="6">
                          <v-combobox
                              label="Nome" name="name"
                              variant="underlined" @blur="saveField($event.target)"
                              :items="functions.listImmobiles"
                              v-model="state.name"
                              persistent-hint
                              hint="Se não achou na lista, é só digitar outro nome."
                          ></v-combobox>
                        <v-text-field label="Telefone Fixo" variant="underlined" @blur="saveField($event.target)"
                          name="phone_fixed" v-model="state.phone_fixed" v-mask-phone.br>
                        </v-text-field>

                        <v-text-field label="E-mail" variant="underlined" @blur="saveField($event.target)"
                          name="email" v-model="state.email">
                        </v-text-field>
                      </v-col>
                      <v-col cols="12" xs="12" sm="12" md="6">
                        <v-text-field label="CRECI" variant="underlined" @blur="saveField($event.target)"
                        name="creci" v-model="state.creci">
                        </v-text-field>
                        <v-text-field label="Celular" variant="underlined" @blur="saveField($event.target)"
                          name="phone_mobile" v-model="state.phone_mobile" v-mask-phone.br>
                        </v-text-field>
                      </v-col>
                    </v-row>
                  </v-card-text>
                  <v-card-actions  class="flex justify-between bg-blue-grey-lighten-4">
                  <v-btn class="bg-blue-grey-lighten-5 ml-5 mb-2" @click="state.dialogRealState = false">
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



<style lang="scss" scoped>

</style>
