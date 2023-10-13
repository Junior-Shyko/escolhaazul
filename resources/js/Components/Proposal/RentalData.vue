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
        userId: props.user.id,
        nameInput : val.name,
        valueInput : val.parentElement.innerText
    }
    emit('updateInput', valueInputNew);
    // this.$emit('clicked', 'someValue')
}

const state = reactive({
    type: ''
})


</script>

<template>
    <div>
        <v-row no-gutters>
            <v-badge color="default" content="Referencia do Imovel" inline></v-badge>
            {{ user }}
        </v-row>
        <v-row no-gutters>
            <v-col col cols="12" sx="12" sm="12" md="4">
                <v-autocomplete class="m-2" variant="underlined" label="Pesquisar o Imóvel"
                    :items="['Apartamento com 2 dormitórios para alugar, 58 m² por R$ 1.350/mês - Vila União - Fortaleza/CE',
                        'Casa com 4 dormitórios para alugar, 93 m² por R$ 1.250 /mês - Bela Vista - Fortaleza/CE',
                        'Galpão para alugar, 4000 m² por R$ 25.800,00 - Messejana - Fortaleza/CE',
                        'Apartamento com 4 dormitórios para alugar, 90 m² por R$ 1.500,00 /mês - José Bonifácio - Fortaleza/CE',
                        'Kitnet com 1 dormitório para alugar, 16 m² por R$ 680,00 /mês - Benfica - Fortaleza/CE',
                        'Loja para alugar, 750 m² aluguel R$ 11.500,00/mês - Centro - Fortaleza/CE']"></v-autocomplete>
            </v-col>
            <v-col col cols="12" sx="12" sm="12" md="4">
                <v-autocomplete class="m-2" variant="underlined" label="Tipo do imóvel" name="typeImmobile"
                    :items="['Apartamento', 'Casa', 'Galpão', 'Kitnet', 'Sala']"
                    @blur="saveField($event.target)"
                ></v-autocomplete>
            </v-col>
            <v-col col cols="12" sx="12" sm="12" md="4">
                <v-select class="m-2" variant="underlined" label="Atendente responsável"
                    :items="['Ana', 'Paulo', 'Maria']"></v-select>
            </v-col>
        </v-row>
        <v-row no-gutters>
            <v-col col cols="12" sx="12" sm="12" md="4">
                <v-select class="m-2" variant="underlined" label="Finalidade" :items="['Ana', 'Paulo', 'Maria']"></v-select>
            </v-col>
            <v-col col cols="12" sx="12" sm="12" md="4">
                <v-text-field class="mt-1" label="Prazo Desejado" model-value="30" suffix="meses"></v-text-field>

            </v-col>
            <v-col col cols="12" sx="12" sm="12" md="4">
                <v-select class="m-2" variant="underlined" label="Tipo de garantia"
                    :items="['Carta Fiança', 'Caução', 'Crédito']"></v-select>
            </v-col>
        </v-row>
        <v-row no-gutters>
            <v-col col cols="12" sx="12" sm="12" md="4">
                <v-text-field class="m-1" label="Aluguel Proposto" model-value="00,00" prefix="R$"></v-text-field>
            </v-col>
            <v-col col cols="12" sx="12" sm="12" md="8">
                <v-textarea class="m-1" rows="3" variant="underlined" label="Aluguel Proposto" maxlength="120"
                    single-line></v-textarea>
            </v-col>
        </v-row>
    </div>
</template>


<style lang="scss" scoped></style>