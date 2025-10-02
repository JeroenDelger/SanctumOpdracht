import { createApp } from "vue";
import "../css/app.css";
import App from "./App.vue";
import { router } from "./router/index";
import { checkIfLoggedIn } from "./domains/auth/index";

const app = createApp(App);

try {
    await checkIfLoggedIn();
} catch (_) {
} finally {
    app.use(router);
    app.mount("#app");
}
