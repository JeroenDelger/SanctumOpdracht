<template>
    <div v-if="getLoggedInUser">
        <b>Welkom {{ getLoggedInUser }}</b>
    </div>

    <div v-else>
        {{ returnToLogin() }}
        <!-- Het lukte me niet om via de route te checken of je ingelogd bent  -->
    </div>
</template>

<script setup>
import { getLoggedInUser } from "../auth";
import { useRouter } from "vue-router";

const router = useRouter();

function returnToLogin() {
    router.push({ path: "/login" });
}
</script>
<style></style>
