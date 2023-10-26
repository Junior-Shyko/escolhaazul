<script setup>
import { reactive, onMounted } from 'vue';
import functions from "@/Util/functions";
import endpoint from '@/Services/endpoints'

const props = defineProps({
  user: Object,
  object_type: String
});
const emit = defineEmits(['updateInput']);
const saveField = (val) => {
    console.log(val)

    //enviando informação para o componente pai
//   emit('updateInput', valueInputNew);
}

const state = reactive({
  dialogRealState: false,
  name: '',
  creci: '',
  email: '',
  object_id: '',
  object_type: '',
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
                    <v-row>
                      <v-col cold="12" xs="12" sm="12" md="4">
                        <v-text-field label="Nome" variant="underlined" @blur="saveField($event.target)"
                        name="name_bank" v-model="state.name">
                      </v-text-field>
                      </v-col>
                    </v-row>
                  </v-card-text>
                  <v-card-actions  class="flex justify-between bg-blue-grey-lighten-4">
                  <v-btn class="bg-blue-grey-lighten-5 ml-5 mb-2"  @click="state.dialogRealState = false">
                      Sair
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