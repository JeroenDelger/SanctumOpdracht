<template>
    <navigation></navigation>
    <RouterView></RouterView>
</template>
<script setup>
import navigation from "./Navigation.vue";

// TODO: onderstaande regel lijkt overbodig en kan weg?
const user = window.user;
</script>
