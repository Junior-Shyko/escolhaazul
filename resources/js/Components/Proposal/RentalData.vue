<script setup>
import api from '@/Services/server'
import { reactive } from 'vue';
const props = defineProps({
    user: Object
});

const emit = defineEmits(['update:modelValue']);

const saveField = (val) => {
    console.log({val})
    var valueInputNew = {
        user_id: props.user.id,
        nameInput : val.name,
        // valueInput : val.value,
        proposal_id : props.user.proposal_id
    }

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
    console.log({ valueInputNew })
    emit('updateInput', valueInputNew);
}

const state = reactive({
    type: '',
    proposedValue : 0
})
props.user.name = 'Osama'
props.user.id = 91;
props.user.proposal_id = 5;
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
                ></v-autocomplete>
            </v-col>
            <v-col col cols="12" sx="12" sm="12" md="4">
                <v-select class="m-2" variant="underlined" 
                label="Finalidade" name="finality"
                @blur="saveField($event.target)"
                :items="['Comercial', 'Residencial', 'Temporada']"></v-select>
            </v-col>
            <v-col col cols="12" sx="12" sm="12" md="4">
                <v-select class="m-2" variant="underlined" label="Atendente responsável" name=""
                    :items="['Ana', 'Paulo', 'Maria']"></v-select>
            </v-col>
            <!-- <v-col col cols="12" sx="12" sm="12" md="4">
                <v-autocomplete class="m-2" variant="underlined" label="Tipo do imóvel" name="typeImmobile"
                    :items="['Apartamento', 'Casa', 'Galpão', 'Kitnet', 'Sala']"
                    @blur="saveField($event.target)"
                ></v-autocomplete>
            </v-col> -->
            <!-- <v-col col cols="12" sx="12" sm="12" md="4">
                <v-select class="m-2" variant="underlined" label="Atendente responsável" name=""
                    :items="['Ana', 'Paulo', 'Maria']"></v-select>
            </v-col> -->
        </v-row>
        <v-row no-gutters>
           
            <v-col col cols="12" sx="12" sm="12" md="4">
                <v-text-field class="mt-1" label="Prazo Desejado" 
                @blur="saveField($event.target)" name="term"
                model-value="30" suffix="meses"></v-text-field>

            </v-col>
            <v-col col cols="12" sx="12" sm="12" md="4">
                <v-select class="m-2" variant="underlined" label="Tipo de garantia"
                @blur="saveField($event.target)" name="warrantyType"
                    :items="['Carta Fiança', 'Caução', 'Crédito']"></v-select>
            </v-col>
            <v-col col cols="12" sx="12" sm="12" md="4">
                <v-text-field class="m-1" label="Aluguel Proposto" 
                @blur="saveField($event.target)" name="proposedValue"
                prefix="R$" v-model="state.proposedValue" v-mask-decimal.br="2"
                ></v-text-field>
            </v-col>
            <v-col col cols="12" sx="12" sm="12" md="8">
                <v-textarea class="m-1" rows="3" variant="underlined" label="Observação" 
                @blur="saveField($event.target)" name="ps"
                maxlength="120" single-line></v-textarea>
            </v-col>
        </v-row>
        <v-row no-gutters>
           
           
        </v-row>
    </div>
</template>


<style lang="scss" scoped></style>