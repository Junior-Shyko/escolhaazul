<script setup>
import { reactive, onMounted } from 'vue';
import functions from '@/Util/functions';
import api from '@/Services/server.js';
import TitleAndSubtitle from './TitleAndSubtitle.vue';
import DialogProposal from './DialogProposal.vue';

const props = defineProps({
  user: Object,
  object_type: String
});

const state = reactive({
  dialogPhone: false,
  number: ''
})

const closeDialog = (value) => {
  state.dialogPhone = value
}

const saveContact = () => {
  let contact = {}
  contact.number       = functions.formatPhone(state.number)
  contact.object_id    = props.user.proposal_id
  contact.object_type  = props.object_type
  contact.user_id      = props.user.id
  console.log({contact})
  api.post('form/phone', contact)
  .then(res => {
    console.log({res})
  })
  .catch(err => {
    console.log({err})
  })
}

</script>

<template>
  <div>
    <v-row>
      <v-col cols="12">

        <v-btn elevation="2" color="primary m-1" @click="state.dialogPhone = true">
          <v-icon icon="fas fa-plus-circle" class="mb-1 mr-1"></v-icon>
          contato telefone
        </v-btn>
        <v-row>
          <v-col cols="12">

            <DialogProposal :dialog="state.dialogPhone" @updateDialog="closeDialog">
              <v-col cols="12">
                <TitleAndSubtitle title="Telefone" sub="Informe seu(s) número(s) de contato" />
              </v-col>
              <v-col cols="9" xs="9" sm="9" md="9">
                <v-text-field label="Telefone" variant="underlined" name="number"
                  v-model="state.number" v-mask-phone.br>
                </v-text-field>

              </v-col>
              <v-col cols="3" xs="3" sm="3" md="3">
                <!-- <small class="text-xs">Salvar</small> -->
                <v-btn class="mt-3" color="primary">

                  <v-icon icon="fas fa-save" class="mb-1 mr-1" @click="saveContact()"></v-icon>
                </v-btn>

              </v-col>
              <!-- <div class="w-full m-auto">
                <p class="mt-2 text-center text-xs mb-4 text-gray-500">Seus contatos cadastrados</p>
                <ul class="border border-gray-200 rounded overflow-hidden shadow-md  mb-4 ">
                  <li
                    class="px-4 py-2 bg-white hover:bg-sky-100 hover:text-sky-900 border-b last:border-none border-gray-200 transition-all duration-300 ease-in-out">
                    First Item</li>
                  <li
                    class="px-4 py-2 bg-white hover:bg-sky-100 hover:text-sky-900 border-b last:border-none border-gray-200 transition-all duration-300 ease-in-out">
                    Second Item</li>
                  <li
                    class="px-4 py-2 bg-white hover:bg-sky-100 hover:text-sky-900 border-b last:border-none border-gray-200 transition-all duration-300 ease-in-out">
                    Third Item</li>
                  <li
                    class="px-4 py-2 bg-white hover:bg-sky-100 hover:text-sky-900 border-b last:border-none border-gray-200 transition-all duration-300 ease-in-out">
                    Another Item</li>
                  <li
                    class="px-4 py-2 bg-white hover:bg-sky-100 hover:text-sky-900 border-b last:border-none border-gray-200 transition-all duration-300 ease-in-out">
                    Item for the Nth time</li>
                </ul>
              </div> -->
            </DialogProposal>
          </v-col>
        </v-row>
      </v-col>
    </v-row>
  </div>
</template>



<style lang="scss" scoped></style>