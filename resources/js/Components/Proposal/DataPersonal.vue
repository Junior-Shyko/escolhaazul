<script setup>
import { reactive, onMounted } from 'vue';
import endpoint from '@/Services/endpoints'
import functions from "@/Util/functions";

const props = defineProps({
    user: Object
});

const emit = defineEmits(['updateInput']);

const state = reactive({
    dialogDataPersonal: false,
    birthDate: '',
    identity: '',
    organ: '',
    nationality: '',
    naturality: '',
    maritalStatus: '',
    dependents: '',
    degreeEducation: '',
    sex: '',
    cpf: ''
})

const saveField = (value) => {

    var valueInputNew = {
        user_id: props.user.id,
        nameInput: value.name,

        route: 'data-personal'
    }
   
    switch (value.name) {
        case 'birthDate':
            let day = new Date(value.value)
            
            let verDay = 0;
            //formatando adicionar 0 na frente
            if(day.getMonth() + 1 < 10) {
                verDay = '0'+ (day.getMonth() + 1)
            }else{
                verDay = (day.getMonth() + 1)
            }
            let dataFormatada = (day.getFullYear() + "-" + ((day.getDate())) + "-" + (verDay));
            valueInputNew.valueInput = dataFormatada;
            break;

        default:
            valueInputNew.valueInput = value.value;
            break;
    }
    emit('updateInput', valueInputNew);
}

const getData = () => {
    endpoint.getData('data_personals', 0, props.user.id)
        .then(res => {
            //Preenchendo os dados
            state.sex = res.sex
            state.birthDate = res.birthDate
            state.organ = res.organConsignor
            state.cpf = res.cpf
            state.nationality = res.nationality
            state.degreeEducation = res.EducationLevel
            state.identity = res.proposedValue
            state.naturality = res.typeRentalUser
            state.maritalStatus = res.term
            state.dependents = res.number_dependents
        })
        .catch(err => {
            console.log({ err })
            functions.toast('Ops!', 'Ocorreu um erro. Tente depois', 'error')
        })

}

onMounted(() => {
    getData()
})
</script>

<template>
    <div>
        <v-row>
            <v-col cols="12" sx="12" sm="12" md="12" class="flex justify-center">
                <v-btn elevation="2" color="primary m-1" @click="state.dialogDataPersonal = true">
                    <v-icon icon="fas fa-plus-circle" class="mb-1 mr-1"></v-icon>
                    Adicionar Dados pessoais
                    <v-row>
                        <v-col cols="12">
                            <v-dialog v-model="state.dialogDataPersonal" persistent class="block w-full ">
                                <v-card>
                                    <v-card-text>
                                        <v-container>
                                            <v-row class="flex justify-center">
                                                <small class="text-blue-darken-4 text-h6">Agora, informe um pouco dos seus
                                                    dados pessoais</small>
                                            </v-row>
                                            <v-row>
                                                <!-- 987.098.098-88 -->
                                                <v-col cols="6" sx="6" sm="6" md="3">
                                                    <v-text-field label="CPF" variant="underlined"
                                                        class="mt-1 block w-full border-gray-500 text-xs md:text-base"
                                                        v-model="state.cpf" name="cpf" @blur="saveField($event.target)"
                                                        autofocus v-mask-cpf></v-text-field>
                                                </v-col>
                                                <v-col cols="6" sx="6" sm="6" md="3">
                                                    <v-text-field label="Data de Nasc." variant="underlined"
                                                        class="mt-1 block w-full border-gray-500 text-xs md:text-base"
                                                        v-model="state.birthDate" name="birthDate"
                                                        @blur="saveField($event.target)"
                                                        v-mask="'00/00/0000'"></v-text-field>
                                                </v-col>
                                                <v-col cols="6" sx="6" sm="6" md="3">
                                                    <v-text-field label="Identidade" variant="underlined"
                                                        class="mt-1 block w-full border-gray-500 text-xs md:text-base"
                                                        v-model="state.identity" name="identity"
                                                        @blur="saveField($event.target)"></v-text-field>
                                                </v-col>
                                                <v-col cols="6" sx="6" sm="6" md="3">
                                                    <v-text-field label="Orgão Emissor" variant="underlined"
                                                        class="mt-1 block w-full border-gray-500 text-xs md:text-base"
                                                        v-model="state.organ" name="organConsignor"
                                                        @blur="saveField($event.target)"></v-text-field>
                                                </v-col>
                                                <v-col cols="6" sx="6" sm="6" md="3">
                                                    <v-text-field label="Nacionalidade" variant="underlined"
                                                        class="mt-1 block w-full border-gray-500 text-xs md:text-base"
                                                        v-model="state.nationality" name="nationality"
                                                        @blur="saveField($event.target)"></v-text-field>
                                                </v-col>
                                                <v-col cols="6" sx="6" sm="6" md="3">
                                                    <v-text-field label="Naturalidade" variant="underlined"
                                                        class="mt-1 block w-full border-gray-500 text-xs md:text-base"
                                                        v-model="state.naturality" name="naturality"
                                                        @blur="saveField($event.target)"></v-text-field>
                                                </v-col>
                                                <v-col cols="6" sx="6" sm="6" md="3">
                                                    <v-select class="m-1" variant="underlined" label="Estado Civil"
                                                        v-model="state.maritalStatus"
                                                        :items="['Casado', 'Solteiro', 'Viúvo']" name="maritalStatus"
                                                        @blur="saveField($event.target)">
                                                    </v-select>
                                                </v-col>
                                                <v-col cols="6" sx="6" sm="6" md="3">
                                                    <v-select class="m-1" variant="underlined" label="Nº de Dependentes"
                                                        v-model="state.dependents" :items="['0', '1', '2', '3', '4+']"
                                                        name="dependents" @blur="saveField($event.target)">
                                                    </v-select>
                                                </v-col>
                                                <v-col cols="12" sx="12" sm="12" md="4">
                                                    <v-select class="m-2" variant="underlined" label="Grau de Instrução"
                                                        v-model="state.degreeEducation" :items="[
                                                            'Ensino fundamental imcompleto',
                                                            'Ensino fundamental completo',
                                                            'Ensino médio incompleto',
                                                            'Ensino médio completo',
                                                            'Superior completo (ou graduação)',
                                                            'Pós-graduação',
                                                            'Mestrado',
                                                            'Doutorado']" name="EducationLevel"
                                                        @blur="saveField($event.target)">
                                                    </v-select>
                                                </v-col>
                                                <v-col cols="12" sx="12" sm="12" md="4">
                                                    <v-select class="m-2" variant="underlined" label="Sexo"
                                                        v-model="state.sex" :items="[
                                                            'Masculino',
                                                            'Feminino']" name="sex" @blur="saveField($event.target)">
                                                    </v-select>
                                                </v-col>
                                            </v-row>
                                        </v-container>
                                    </v-card-text>
                                    <v-card-actions  class="flex justify-between bg-blue-grey-lighten-4">
                                        <v-btn class="bg-blue-grey-lighten-5 ml-5 mb-2"  @click="state.dialogDataPersonal = false">
                                            Sair
                                        </v-btn>
                                    </v-card-actions>
                                </v-card>
                            </v-dialog>
                        </v-col>
                    </v-row>
                </v-btn>
            </v-col>
        </v-row>
    </div>
</template>

<style lang="scss" scoped></style>