<script setup>
import { reactive, onMounted, ref } from 'vue';

const props = defineProps({
  dialog: Boolean
});

const emit = defineEmits(['updateDialog']);

const dialog = ref(props.dialog)

//Enviando false para componente que chamou esse componente
const closedDialog = () => {
  emit('updateDialog', false)
}
</script>

<template>
  <div>
    <v-dialog v-model="props.dialog" activator="parent" transition="fade-transition">
      <v-card>
        <v-card-text>
          <v-row>
            <slot />
          </v-row>
        </v-card-text>
        <v-card-actions  class="flex justify-between bg-blue-grey-lighten-4">
          <v-btn class="bg-blue-grey-lighten-5 ml-5 mb-2"  @click="closedDialog">
              Sair
          </v-btn>
        </v-card-actions>
      </v-card>      
    </v-dialog>
  </div>
</template>


<style lang="scss" scoped></style>