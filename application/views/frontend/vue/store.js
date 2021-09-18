import Vue  from "./module/vue.js";

Vue.use(Vuex);

const store = new Vuex.Store({
    state: {
        url  	  : '',
        isLogin   : false,
        cart 	  : [],
        wishList  : []
    },
    getters: {

    },
    mutations: {

    }
});

export default store;
