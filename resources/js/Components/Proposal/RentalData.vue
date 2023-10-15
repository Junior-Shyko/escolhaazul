<script setup>
import endpoint from '@/Services/endpoints'

import { onMounted } from 'vue';
import { reactive } from 'vue';



const props = defineProps({
    user: Object
});

const emit = defineEmits(['updateInput']);

const saveField = (val) => {
    //Propriedade do valor é preenchido apos um tratamento de campo e valor
    var valueInputNew = {
        user_id: props.user.id,
        nameInput : val.name,
        proposal_id : props.user.proposal_id
    }
/**
 * Refatorar para um função externa
 */
    switch (val.name) {
        case 'proposedValue':
            var newValue = 0;
            newValue = parseInt(val.value.replace(/[\D]+/g,''));
            newValue = newValue + '';
            newValue = newValue.replace(/([0-9]{2})$/g, ".$1");
            valueInputNew.valueInput = newValue
            break;
    
        default:
            valueInputNew.valueInput = val.value
            break;
    }
    //enviando informação para o componente pai
    emit('updateInput', valueInputNew);
}
//Dados da tabela
const state = reactive({
    type: '',
    proposedValue : 0,
    finality: '',
    ps : '',
    refImmobile : '',
    typeRentalUser : '',
    warrantyType : '',
    term: ''
})

props.user.name = 'Osama'
props.user.id = 91;
props.user.proposal_id = 5;
//endpoint para buscar dados
const getData = () => {
    endpoint.getData('rental_datas' , props.user.proposal_id , props.user.id)
    .then(res => {
        //Preenchendo os dados
        state.finality      = res.warrantyType
        state.proposedValue = res.proposedValue
        state.ps            = res.ps
        state.refImmobile   = res.refImmobile
        state.typeRentalUser= res.typeRentalUser
        state.warrantyType  = res.warrantyType
        state.term      = res.term
    })
    .catch(err => {
        console.log({err})
    })
        
}

onMounted(() => {
    getData()
})

</script>

<template>
    <div>
        <v-row no-gutters>
            <v-badge color="default" content="Referencia do Imovel" inline></v-badge>
        </v-row>
        <v-row no-gutters>
            <v-col col cols="12" sx="12" sm="12" md="4">
                <v-autocomplete class="m-2" variant="underlined" name="refImmobile" label="Pesquisar o Imóvel"
                    :items="['Apartamento com 2 dormitórios para alugar, 58 m² por R$ 1.350/mês - Vila União - Fortaleza/CE',
                        'Casa com 4 dormitórios para alugar, 93 m² por R$ 1.250 /mês - Bela Vista - Fortaleza/CE',
                        'Galpão para alugar, 4000 m² por R$ 25.800,00 - Messejana - Fortaleza/CE',
                        'Apartamento com 4 dormitórios para alugar, 90 m² por R$ 1.500,00 /mês - José Bonifácio - Fortaleza/CE',
                        'Kitnet com 1 dormitório para alugar, 16 m² por R$ 680,00 /mês - Benfica - Fortaleza/CE',
                        'Loja para alugar, 750 m² aluguel R$ 11.500,00/mês - Centro - Fortaleza/CE']"
                        @blur="saveField($event.target)"
                    v-model="state.refImmobile"    
                ></v-autocomplete>
            </v-col>
            <v-col col cols="12" sx="12" sm="12" md="4">
                <v-select class="m-2" variant="underlined" 
                label="Finalidade" name="finality"
                @blur="saveField($event.target)"
                :items="['Comercial', 'Residencial', 'Temporada']"
                v-model="state.finality"></v-select>
            </v-col>
            <v-col col cols="12" sx="12" sm="12" md="4">
                <v-select class="m-2" variant="underlined" label="Atendente responsável" name=""
                    :items="['Ana', 'Paulo', 'Maria']"></v-select>
            </v-col>
        </v-row>
        <v-row no-gutters>
           
            <v-col col cols="12" sx="12" sm="12" md="4">
                <v-text-field class="mt-1" label="Prazo Desejado" 
                @blur="saveField($event.target)" name="term"
                model-value="30" suffix="meses"
                v-model="state.term"></v-text-field>
            </v-col>
            <v-col col cols="12" sx="12" sm="12" md="4">
                <v-select class="m-2" variant="underlined" label="Tipo de garantia"
                @blur="saveField($event.target)" name="warrantyType"
                    :items="['Carta Fiança', 'Caução', 'Crédito']"
                v-model="state.warrantyType"></v-select>
            </v-col>
            <v-col col cols="12" sx="12" sm="12" md="4">
                <v-text-field class="m-1" label="Aluguel Proposto" 
                @blur="saveField($event.target)" name="proposedValue"
                prefix="R$" v-model="state.proposedValue" v-mask-decimal.br="2"
                ></v-text-field>
            </v-col>
            <v-col col cols="12" sx="12" sm="12" md="8">
                <v-textarea class="m-1" rows="3" variant="outlined" label="Observação" 
                @blur="saveField($event.target)" name="ps" v-model="state.ps"
                maxlength="120" single-line></v-textarea>
            </v-col>
        </v-row>
    </div>
</template>


<style lang="scss" scoped></style>