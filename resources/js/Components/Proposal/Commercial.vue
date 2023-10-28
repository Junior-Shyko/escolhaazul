<script setup>
import { reactive, onMounted } from 'vue';
import TextField from './TextField.vue';

const props = defineProps({
    user: Object,
    object_type: String
});

const emit = defineEmits(['updateInput']);

const saveField = (val) => {
    console.log({val})
    // var valueInputNew = {
    //   user_id: props.user.id,
    //   nameInput: val.name,
    //   proposal_id: props.user.proposal_id,
    //   route: 'real-state',
    //   object_type: props.object_type,
    //   valueInput : val.value
    // }
    //enviando informação para o componente pai
    // emit('updateInput', val);
}

const state = reactive({
    dialogCommercial: false,
    name: '',
    creci: '',
    email: '',
    phone_fixed: '',
    phone_mobile: '',
    object_id: '',
    object_type: '',
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
                        <v-dialog v-model="state.dialogCommercial" activator="parent" width="auto">
                            <v-card>
                                <v-card-text>
                                    <v-row>
                                        <v-col cold="12" xs="12" sm="12" md="6">
<TextField 
label="Nome"
variant="underlined"
:valueInput="state.name"
@updateInputChildren="saveField"
/>
                                        </v-col>
                                    </v-row>
                                </v-card-text>
                                <v-card-actions>
                                    <v-btn color="primary" block @click="state.dialogCommercial = false">Close Dialog</v-btn>
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