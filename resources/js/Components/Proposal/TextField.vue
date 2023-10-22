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
    id: String
});

const emit = defineEmits(['updateInput', 'update:modelValue']);

const input = ref(null);

const saveField = (val) => {
    emit('updateInput', val);
}

const value = computed({
  get() {
    return props.modelValue;
  },
  set(value) {
    emit("update:modelValue", value);
  },
});

</script>
<template>
    <v-col cols="12" sx="12" sm="12" md="4">
        <v-text-field
            :label="props.label" 
            :variant="props.variant"
            v-model="value"
            @blur="saveField($event.target)"
            ref="input"
        >
        </v-text-field>
        
    </v-col>
</template>