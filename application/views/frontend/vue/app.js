window.makeFormData = (object) => {
    var formdata = new FormData();
    if (typeof object == 'object') {
        for (const key in object) {
            if (typeof object[key] == 'object') {
                formdata.append(key, JSON.stringify(object[key]));
            } else {
                formdata.append(key, object[key]);
            }
        }
    }
    return formdata;
}

import Vue from "./module/vue.js";
//import Axios from "./module/axios.min.js";
import store from "./store.js";

// Modules
import ForgotPassword from './components/ForgotPassword.js';
Vue.component('forgot-password', ForgotPassword);

const app = new Vue({
    el: '#app',
    store: store,
    data: {
        userFile: "",
    },
    methods: {

        // user-panel/profile 
        uploadFile: function() {
            this.userFile = this.$refs.userFile.files[0];
            let formData = new FormData();
            formData.append('file', this.userFile);
            axios.post('https://korjo.masikbazarkhulna.com/user-panel/user_image_set', formData, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                })
                .then(function(response) {

                    if (!response) {
                        alert('File not uploaded.');
                    } else {
                        location.reload();
                    }
                })
                .catch(function(error) {
                    console.log(error);
                });
        },

    }
});


(() => {

})()