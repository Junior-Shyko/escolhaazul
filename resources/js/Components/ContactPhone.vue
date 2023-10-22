<script setup>
import { ref, reactive, onMounted } from "vue";
import { useForm } from '@inertiajs/vue3';

const state = reactive({
    dialogDataAddress: false,
    headers: [
       
        { title: 'Número', key: 'protein' },
        { title: 'Actions', key: 'actions', sortable: false },
      ],
      desserts: [
          {
            name: 'Frozen Yogurt',
            calories: 159,
            fat: 6.0,
            carbs: 24,
            protein: 4.0,
          },
          {
            name: 'Ice cream sandwich',
            calories: 237,
            fat: 9.0,
            carbs: 37,
            protein: 4.3,
          }
        ],
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

</script>

<template>
    <div>
        <v-row no-gutters>
            <v-col cols="12" sx="12" sm="12" md="12" class="flex justify-center">
                <v-btn elevation="2" color="primary m-1" @click="state.dialogDataAddress = true">
                    <v-icon icon="fas fa-plus-circle" class="mb-1 mr-1"></v-icon>
                    Adicionar Contato
                    <v-row no-gutters>
                        <v-col cols="12" sx="12" sm="12" md="4">
                            <v-dialog class="block w-full " v-model="state.dialogDataAddress">
                                <v-card>
                                    <v-card-text>
                                        <v-row>
                                            <v-col cols="12" xs="4" sm="4" md="3">
                                                <div class="d-flex">
                                                    <v-text-field label="Número" class="m-1" v-model="form.cep"
                                                    variant="underlined"></v-text-field>
                                                    <v-btn color="primary mt-5">
                                                        <v-icon icon="fas fa-check"></v-icon>
                                                    </v-btn>
                                                </div>
                                            </v-col>                            
                                        </v-row>
                                        <v-row>
                                            <v-data-table
                                                :headers="state.headers"
                                                :items="state.desserts"
                                                :sort-by="[{ key: 'calories', order: 'asc' }]"
                                                class="elevation-1"
                                            >
                                            <template v-slot:item.actions="{ item }">
          <v-btn size="small" variant="text">
            <v-icon icon="fas fa-edit" title="Editar Usuario"></v-icon>
          </v-btn>
          <v-btn size="small" color="error" variant="text">
            <v-icon icon="fas fa-trash" title="Excluir Usuario"></v-icon>
          </v-btn>

          
        </template>
                                            </v-data-table>
                                        </v-row>
                                    </v-card-text>
                                    <v-card-actions class="flex justify-center">
                                       
                                        <v-btn class="bg-blue-grey-lighten-4" @click="state.dialogDataAddress = false">
                                            Sair
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