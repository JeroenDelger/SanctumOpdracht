import Login from "./Login.vue";
import Register from "./Register.vue";
import User from "./User.vue";
import Logout from "./Logout.vue";
import { isLoggedIn } from "../auth";

export const userRoutes = [
    { path: "/login", component: Login, name: "login" },
    { path: "/register", component: Register, name: "register" },
    { path: "/user", component: User, name: "user" },
    { path: "/logout", component: Logout, name: "logout" },
    { path: "/", component: User, name: "me" },
];
