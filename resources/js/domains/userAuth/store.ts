import { storeModuleFactory } from "../../services/store";

export const registerStore = storeModuleFactory("users");
registerStore.actions.getAll();
