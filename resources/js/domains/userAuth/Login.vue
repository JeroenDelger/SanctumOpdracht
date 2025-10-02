<template>
    <div v-if="getLoggedInUser">
        {{ redirectToUser() }}
        <!-- Het lukte me niet om via de route te checken of je ingelogd bent  -->
    </div>
    <div v-else>
        <form @submit.prevent="handleSubmit">
            <div><b>Login:</b></div>
            <label>Email: </label>
            <br />
            <input type="email" v-model="form.email" />
            <br /><br />

            <label>Wachtwoord: </label>
            <br />
            <input type="password" v-model="form.password" />
            <br /><br />

            <button type="submit">Login</button>
        </form>
    </div>
</template>

<script setup>
import { getLoggedInUser } from "../auth";
import { ref } from "vue";
import { postRequest } from "../../services/http";
import axios from "axios";
import { useRouter } from "vue-router";

const router = useRouter();

const emit = defineEmits(["submit"]);

const form = ref({
    email: "",
    password: "",
});

const handleSubmit = async () => {
    await axios.get("/sanctum/csrf-cookie");
    await postRequest("/login", form.value);
    router.go(); //Refresh page zodat navigatie bar update en je naar user page gaat met v-if (niet mooi maar kon niets anders bedenken)
};

function redirectToUser() {
    router.push({ path: "/user" });
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
