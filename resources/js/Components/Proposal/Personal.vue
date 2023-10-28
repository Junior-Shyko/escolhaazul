
<script setup>
import { reactive } from 'vue';
import DialogProposal from './DialogProposal.vue';

const state = reactive({
  dialogPersonal: false,
})

const closeDialog = (value) =>{
  state.dialogPersonal = value
}
</script>

<template>
  <div>
    <v-row>
      <v-col cols="12" @click="state.dialogBank = true">
        <v-btn color="white" @click="state.dialogPersonal = true" elevation="2" icon="fas fa-building-columns">
        </v-btn>
        <v-row>
          <v-col cols="12">
            <div class="flex justify-center">
              <small class="font-semibold">Pessoal-</small>
              <small>{{ state.dialogPersonal }}</small>
            </div>
              <DialogProposal :dialog="state.dialogPersonal" @updateDialog="closeDialog">
                <v-col cols="12" xs="12" sm="12" md="12">
                    <v-text-field label="Nome" variant="underlined"
                      @blur="saveField($event.target)"
                      name="name" v-model="state.name">
                    </v-text-field>                    
                </v-col>
                <v-col cols="12" xs="12" sm="12" md="6">
                  <v-text-field label="C.P.F" variant="underlined"
                    @blur="saveField($event.target)"
                    name="cpf" v-model="state.cpf">
                  </v-text-field>
                    <v-text-field label="Telefone" variant="underlined"
                      @blur="saveField($event.target)"
                      name="name" v-model="state.name">
                    </v-text-field>
                   
                </v-col>
                <v-col cols="12" xs="12" sm="12" md="6">
                <v-text-field label="Qual a relação?" variant="underlined"
                      @blur="saveField($event.target)"
                      name="cpf" v-model="state.cpf">
                    </v-text-field>
                    <v-text-field label="Telefone" variant="underlined"
                      @blur="saveField($event.target)"
                      name="name" v-model="state.name">
                    </v-text-field>
                    </v-col>
              </DialogProposal>
          </v-col>
        </v-row>
      </v-col>
    </v-row>
  </div>
</template>


<style lang="scss" scoped></style>