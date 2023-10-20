<script setup>
import { ref, reactive, onMounted } from "vue";
import { useForm } from '@inertiajs/vue3';

const props = defineProps({
    user: Object
});

const state = reactive({
    dialogDataAddress: false,
    loadingBtn: false
})

const form = useForm({
    cep: '',
    address: '',
    number: '',
    complement: '',
    district: '',
    city: '',
    state: '',

});

const searchCep = (cep) => {
    axios.get(import.meta.env.VITE_API_CEP + cep)
        .then(function (response) {
            // handle success
            console.log(response.data);
            form.cep = response.data.cep
            form.address = response.data.street
            form.district = response.data.neighborhood
            form.city = response.data.city
            form.state = response.data.state
        })
        .catch(function (error) {
            // handle error
            console.log(error);
        })
        .finally(function () {
            // always executed
        });

    const updatePassword = () => {
        form.patch('/user/update-user/' + props.parent.id, {
            preserveScroll: true,
            onSuccess: (e) => {
                //alert('Alterado com sucesso')
                toast('Sucesso', 'Seus dados foram atualizados');
            },
            onError: (e) => {
                console.log({ e })
            },
        });
    };
}
</script>

<template>
    <div>
        <v-row no-gutters>
            <v-col cols="12" sx="12" sm="12" md="12" class="flex justify-center">
                <v-btn elevation="2" color="primary m-1" @click="state.dialogDataAddress = true">
                    <v-icon icon="fas fa-plus-circle" class="mb-1 mr-1"></v-icon>
                    Adicionar Endereço
                    <v-row no-gutters>
                        <v-col cols="12" sx="12" sm="12" md="4">                          
                            <v-dialog class="block w-full " v-model="state.dialogDataAddress">
                                <v-card>
                                    <v-card-text>
                                        <v-row>
                                            <v-col cols="12" xs="12" sm="12" md="3">
                                                <v-text-field label="CEP" class="m-1" v-model="form.cep"
                                                    v-mask-cep @blur="searchCep(form.cep)"
                                                    variant="underlined">
                                                </v-text-field>
                                            </v-col>
                                            <v-col cols="12" xs="12" sm="12" md="3">
                                                <v-text-field label="Endereço" class="m-1" v-model="form.address"
                                                    variant="underlined"></v-text-field>
                                            </v-col>
                                            <v-col cols="6" xs="6" sm="6" md="3">
                                                <v-text-field label="Número" class="m-1" v-model="form.number"
                                                    variant="underlined"></v-text-field>
                                            </v-col>
                                            <v-col cols="6" xs="6" sm="6" md="3">
                                                <v-text-field label="Complemento" class="m-1" v-model="form.complement"
                                                    variant="underlined"></v-text-field>
                                            </v-col>
                                            <v-col cols="12" xs="6" sm="6" md="3">
                                                <v-text-field label="Bairro" class="m-1" v-model="form.district"
                                                    variant="underlined"></v-text-field>
                                            </v-col>
                                            <v-col cols="12" xs="6" sm="6" md="3">
                                                <v-text-field label="Cidade" class="m-1" v-model="form.city"
                                                    variant="underlined"></v-text-field>
                                            </v-col>
                                            <v-col cols="6" xs="6" sm="6" md="3">
                                                <v-text-field label="Estado" class="m-1" v-model="form.state"
                                                    variant="underlined"></v-text-field>
                                            </v-col>
                                        </v-row>
                                    </v-card-text>
                                    <v-card-actions class="flex justify-between">
                                        <v-btn class="bg-blue-grey-lighten-4 ml-5 mb-2" @click="state.dialogDataAddress = false">
                                            Sair
                                        </v-btn>
                                        <v-btn color="" class="bg-primary ml-5 mb-2" @click="state.dialogDataAddress = false">
                                            <v-icon icon="fas fa-save"></v-icon>
                                            Confirmar
                                        </v-btn>
                                      
                                    </v-card-actions>
                                </v-card>
                            </v-dialog>
                        </v-col>
                        <!-- FIM COLUNAS DO CAMPO -->
                    </v-row>
                </v-btn>
            </v-col>
        </v-row>
    </div>
</template>


<style></style>