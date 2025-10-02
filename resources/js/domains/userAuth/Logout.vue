<template>
    <div v-if="getLoggedInUser">
        <b>Weet je zeker dat je uit wil loggen?</b>
        <form @submit.prevent="handleSubmit">
            <button type="submit">Logout</button>
        </form>
    </div>
    <div v-else>
        {{ returnToLogin() }}
        <!-- Het lukte me niet om via de route te checken of je ingelogd bent  -->
    </div>
</template>

<script setup>
import { getLoggedInUser } from "../auth";
import { postRequest } from "../../services/http";
import { useRouter } from "vue-router";

const router = useRouter();

const emit = defineEmits(["submit"]);

const handleSubmit = async () => {
    await postRequest("/logout");
    router.go(); //Refresh page zodat navigatie bar update en je naar user page gaat met v-if (niet mooi maar kon niets anders bedenken)
};

function returnToLogin() {
    router.push({ path: "/login" });
}
</script>

<style>
input {
    border: 1px solid black;
}

button {
    border: 1px solid black;
    border-radius: 12px;
    padding-left: 10px;
    padding-right: 10px;
    padding-top: 5px;
    padding-bottom: 5px;
    background-color: rgba(211, 211, 211, 0.5);
}

form {
    padding-left: 10px;
}
</style>
