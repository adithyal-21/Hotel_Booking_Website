import vue from "vue";
import vuex from "vuex";
import Adminpart from "./modules/Adminpart";

vue.use(vuex);
export default new vuex.Store({
    modules: {
        Adminpart
    }
});
