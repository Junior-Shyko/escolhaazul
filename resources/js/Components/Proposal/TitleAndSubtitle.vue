<template>
  <v-row class="flex justify-center text-center">
    <div class="bg-white p-2 mt-1 rounded-lg shadow-lg border-l-4 border-[#2587E9]">
      <h6 class="font-semibold text-[#2587E9]">{{ title }}</h6>
      <p class="text-gray-700 text-sm">{{ sub }}</p>
    </div>
  </v-row>
</template>

<script setup>

defineProps({
  title: String,
  sub: String
})


</script>

<style lang="scss" scoped></style>