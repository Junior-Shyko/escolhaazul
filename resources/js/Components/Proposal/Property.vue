<script setup>
import { reactive } from 'vue';
import DialogProposal from './DialogProposal.vue';
import Address from '@/Components/Address.vue';

const state = reactive({
  dialogProperty: false,
})

const closeDialog = (value) => {
  state.dialogProperty = value
}


</script>

<template>
  <div>
    <v-row>
      <v-col cols="12" @click="state.dialogProperty = true">
        <v-btn color="white" @click="state.dialogPersonal = true" elevation="2" icon="fas fa-home-user">
        </v-btn>
        <v-row>
          <v-col cols="12">
            <div class="flex justify-center">
              <small class="font-semibold">Imóveis</small>
            </div>
            <DialogProposal :dialog="state.dialogProperty" @updateDialog="closeDialog">
              <v-col cols="12" xs="12" sm="12" md="12">
                <small>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Beatae officia sunt laborum quod, magnam distinctio repudiandae dolores voluptatibus unde itaque doloremque ducimus 
                  tempore consequuntur illo temporibus quos id facere hic!</small>
              </v-col>
            </DialogProposal>
          </v-col>
        </v-row>
      </v-col>
    </v-row>
  </div>
</template>

<style lang="scss" scoped></style>