<script setup>
import { onMounted, ref, computed } from 'vue';

const props = defineProps({
    modelValue: {
        type: String,
        required: true,
    },
    label: String,
    variant: String,
    nameInput: String,
    id: String,
    valueInput: String
});

const emit = defineEmits(['updateInputChildren', 'update:modelValue']);

const input = ref(null);

const saveField = (val) => {
    emit('updateInputChildren', val);
}

const value = computed({
  get() {
    return props.valueInput;
  },
  set(value) {
    emit("update:modelValue", value);
  },
});

</script>
<template>
  <v-text-field
      :label="props.label" 
      :variant="props.variant"
      v-model="value"
      @blur="saveField($event.target)"
      ref="input"
  >
  </v-text-field>
</template>