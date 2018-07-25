
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/**
  Requiring Vue Devtools
 */
window.Vue = require('vue');
Vue.config.devtools = true;


/**
 * Importing the VueCarousel globally
 */
import VueCarousel from 'vue-carousel';
Vue.use(VueCarousel);

/**
 * Importing Feather Icons for Vue
 */
import VueFeatherIcon from 'vue-feather-icon';
Vue.use(VueFeatherIcon);

/**
 * Importing Vuex for Vue
 */
import { store } from './store/store';

/**
 * ZIGGY
 */

Vue.mixin({
    methods: {
        route: route
    }
});

/**
 * require import file for all components
 */
require('./components');

const app = new Vue({
    el: '#app',

    store,

    data: {
        age: null,
        ageGroup: null,
    },
    methods: {
        saveAgeToSession: function (choose) {
            this.age = choose;
            var self= this;

            axios.get('/api/saveAgeToSession', {
                params: {
                    age: this.age
                }
            })
                .then(function (response) {
                    var url = response.data.ageGroup + "/";
                    window.location.href = url;
                })
                .catch(function (error) {
                    console.log(error);
                });
        },
    }
});
