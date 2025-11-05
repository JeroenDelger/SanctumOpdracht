import { User } from "../users/type";
import { computed, ref } from "vue";
import { getRequest } from "../../services/http/index";

const loggedInUser = ref<User | null>(null);
export const isLoggedIn = computed(() => loggedInUser.value !== null);
export const getLoggedInUser = computed(() => loggedInUser.value);


// TODO: deze functie hoeft niet opnieuw de request te doen, het volstaat om alleen de user uit de state te returnen
export const checkIfLoggedIn = async () => {
    const { data } = await getRequest("me");
    loggedInUser.value = data.name;
};

export const me = async () => {
    const { data } = await getRequest("me");
    if (!data) return;
    loggedInUser.value = data;
};
