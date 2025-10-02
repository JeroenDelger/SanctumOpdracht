<template>
    <nav :key="navigationKey">
        <div v-if="getLoggedInUser">
            <router-link :to="{ name: 'user' }">User Page</router-link> |
            <router-link :to="{ name: 'logout' }">Logout</router-link> |
            <br /><br />
        </div>
        <div v-else>
            <router-link :to="{ name: 'login' }">Login</router-link> |
            <router-link :to="{ name: 'register' }">Register</router-link> |
            <br /><br />
        </div>
    </nav>
    <div></div>
</template>
<script setup>
import { ref } from "vue";
import { getLoggedInUser } from "./domains/auth/index";

const navigationKey = ref(0);
</script>
