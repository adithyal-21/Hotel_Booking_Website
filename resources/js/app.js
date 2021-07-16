require("./bootstrap");
window.Vue = require("vue");
import Vuetify from "vuetify";
import vuetify from "../plugins/vuetify";
import loading from "vuejs-loading-screen";
import App from "./App.vue";
import VueRouter from "vue-router";
import VueAxios from "vue-axios";
import axios from "axios";
import { routes } from "./routes";
import store from "./store";
import Vue from "vue";
Vue.use(Vuetify);
Vue.use(VueRouter);
Vue.use(VueAxios, axios);
Vue.use(loading, {
    bg: "#9FA8DAad",
    icon: "spinner",
    size: 3,
    icon_color: "white"
});

const router = new VueRouter({
    mode: "history",
    routes: routes
});

const app = new Vue({
    vuetify: vuetify,
    store,
    el: "#app",
    router: router,
    render: h => h(App)
});
