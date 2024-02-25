<template>
    <div>

    </div>
</template>

<script setup>
import {onMounted} from 'vue';

onMounted(() => {
    alert('Você será redirecionado para página inicial');
    setTimeout(() => {
        window.location.href=EscolhaApp.baseURL
   }, 500)
})
</script>

<style lang="scss" scoped>

</style>