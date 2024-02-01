<script setup>
import { reactive, onMounted  } from 'vue';
import functions from '@/Util/functions';
import DialogProposal from './DialogProposal.vue';
import endpoint from '@/Services/endpoints'
import TitleAndSubtitle from './TitleAndSubtitle.vue';

const props = defineProps({
  user: Object,
  object_type: String
});

const emit = defineEmits(['updateInput']);

const saveField = (val) => {

  let newstr = val.value
  if(val.name == 'phone_fixed' || val.name == 'phone_mobile') {
    newstr = functions.formatPhone(val.value)    
  }

  var valueInputNew = {
    user_id: props.user.id,
    nameInput: val.name,
    proposal_id: props.user.proposal_id,
    route: 'commercial',
    object_type: props.object_type,
    valueInput : newstr
  }
  // //enviando informação para o componente pai
  emit('updateInput', valueInputNew);
}

const state = reactive({
  dialogCommercial: false,
  name: '',
  cnpj: '',
  email: '',
  phone_fixed: '',
  phone_mobile: '',
  object_id: '',
  object_type: '',
})

const closeDialog = (value) =>{
  state.dialogCommercial = value
}

const getData = () => {
  endpoint.getData('commercials', props.user.proposal_id, props.user.id, 'personal')
    .then(res => {
      //Preenchendo os dados
      state.name      = res.name
      state.cnpj = res.cnpj
      state.email            = res.email
      state.phone_fixed   = res.phone_fixed
      state.phone_mobile= res.phone_mobile
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
        <v-btn color="white" @click="state.dialogCommercial = true" elevation="2" icon="fas fa-dumpster">
        </v-btn>
        <v-row>
          <v-col cols="12">
            <div class="flex justify-center">
              <small class="font-semibold">Comercial</small>
            </div>
              <DialogProposal :dialog="state.dialogPersonal" @updateDialog="closeDialog">

              </DialogProposal>
            <v-dialog v-model="state.dialogCommercial" 
              activator="parent"
              transition="fade-transition">
              <v-card>
                <v-card-text>
                  <TitleAndSubtitle title="Referência Comercial" sub="Seus dados são salvos automaticamente." />
                  <v-row>
                    <v-col cold="12" xs="12" sm="12" md="6">
                      <v-text-field label="Nome" variant="underlined" 
                        @blur="saveField($event.target)" name="name"
                        v-model="state.name">
                      </v-text-field>
                      <v-text-field label="Telefone Fixo" variant="underlined" 
                        @blur="saveField($event.target)" name="phone_fixed"
                        v-model="state.phone_fixed" v-mask-phone.br>
                      </v-text-field>
                    </v-col>
                    <v-col cold="12" xs="12" sm="12" md="6">
                      <v-text-field label="CNPJ" variant="underlined" 
                        @blur="saveField($event.target)"
                        name="cnpj" v-model="state.cnpj" v-mask-cnpj>
                      </v-text-field>
                      <v-text-field label="Telefone Celular" variant="underlined" 
                        @blur="saveField($event.target)"
                        name="phone_mobile" v-model="state.phone_mobile" v-mask-phone.br>
                      </v-text-field>
                    </v-col>                    
                  </v-row>
                  <v-row>
                    <v-col cold="12" xs="12" sm="12" md="12">
                      <v-text-field label="E-mail" variant="underlined" 
                        @blur="saveField($event.target)"
                        name="email" v-model="state.email">
                      </v-text-field>
                    </v-col>
                  </v-row>
                </v-card-text>
                <v-card-actions  class="flex justify-between bg-blue-grey-lighten-4">
                  <v-btn class="bg-blue-grey-lighten-5 ml-5 mb-2" @click="state.dialogCommercial = false">
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