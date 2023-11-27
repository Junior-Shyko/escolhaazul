<script setup>
   
</script>

<template>
    <v-row no-gutters>
            <v-badge color="default" content="Dados Profissionais" inline></v-badge>
        </v-row>
        <div class="m-2 flex w-full flex text-center justify-center">
            <h6>Agora você vai adicionar algumas referências importante sobre o seu lado profissional.
            </h6>
        </div>
    <div>
        <v-container>
            <v-row>
                <v-col cols="12" xs="12" sm="12" md="4">
            <v-text-field label="Profissão" variant="underlined"></v-text-field>
        <v-text-field label="Atividade" variant="underlined"></v-text-field>
        <v-text-field label="Nome da Empresa" variant="underlined"></v-text-field>
            </v-col>
            </v-row>
        </v-container>
    </div>
    <!-- <v-row>
        <v-col cols="12" xs="12" sm="12" md="6">
            <v-text-field label="CNPJ" variant="underlined"></v-text-field>
        <v-select
            label="Vinculo Empregatício"
            :items="['Aposentado/pensionista', 'Autônomo', 'Empresário', 'Funcionário público',
             'Registro CLT', 'Profisional liberal', 'Outros']"
            variant="underlined"
        ></v-select>
        <v-text-field label="Data Admissão" variant="underlined"></v-text-field>
        </v-col>
    </v-row> -->

   

</template>

<style lang="scss" scoped>

</style>