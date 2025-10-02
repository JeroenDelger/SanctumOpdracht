<template>
    <navigation></navigation>
    <RouterView></RouterView>
</template>
<script setup>
import navigation from "./Navigation.vue";

const user = window.user;
</script>
