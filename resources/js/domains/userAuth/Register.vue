<template>
    <div v-if="isLoggedIn">
        {{ returnToUser() }}
        <!-- Het lukte me niet om via de route te checken of je ingelogd bent  -->
    </div>
    <form @submit.prevent="handleSubmit">
        <div><b>Register:</b></div>
        <label>Naam: </label>
        <br />
        <input v-model="form.name" type="text" required />
        <br /><br />

        <label>Wachtwoord: </label>
        <br />
        <input v-model="form.password" type="password" required />
        <br /><br />

        <label>Email: </label>
        <br />
        <input v-model="form.email" type="email" required />
        <br /><br />

        <button type="submit">Aanmelden</button>
    </form>
</template>

<script setup>
import { ref } from "vue";
import { postRequest } from "../../services/http";
import { useRouter } from "vue-router";
import { isLoggedIn } from "../auth";

const router = useRouter();

function returnToUser() {
    router.push({ path: "/user" });
}

const emit = defineEmits(["submit"]);

const form = ref({
    name: "",
    password: "",
    email: "",
});

const handleSubmit = async () => {
    await postRequest("/register", form.value);
    router.push({ path: "/login" });
};
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
