import "./bootstrap";

import { createApp } from "vue";
import App from "./App.vue";
import "../assets/css/app.css";

import "bootstrap/dist/css/bootstrap-grid.min.css";
import "bootstrap/dist/css/bootstrap-utilities.css";

import {
    Card,
    Menu,
    List,
    Drawer,
    Button,
    message,
    Table,
    Avatar,
    Select,
    Input,
    Checkbox,
} from "ant-design-vue";

import "ant-design-vue/dist/reset.css";

import router from "../routers/index";
import axios from "axios";
import { createPinia } from "pinia";
import { registerGlobalComponent } from "../views/utils/import.js";


/* import font awesome icon component */
import { FontAwesomeIcon } from "@fortawesome/vue-fontawesome";
import { library } from "@fortawesome/fontawesome-svg-core";
import { faUser, faBars } from "@fortawesome/free-solid-svg-icons";

const app = createApp(App);
const pinia = createPinia();

window.axios = axios;

library.add(faUser, faBars);
app.component("font-awesome-icon", FontAwesomeIcon);

// Ant design
app.use(Button);
app.use(Drawer);
app.use(List);
app.use(Card);
app.use(Menu);
app.use(Table);
app.use(Avatar);
app.use(Select);
app.use(Input);
app.use(Checkbox);


app.use(router);
app.use(pinia);
registerGlobalComponent(app);

app.mount("#app");

// Ant design
app.config.globalProperties.$message = message;
