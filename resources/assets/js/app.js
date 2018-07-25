
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
        products: null,
        productsAvailable: false,
        ageGroup: null,
    },
    watch: {
        products: function (id) {
            if (this.products === null || this.products.length == 0) {
                this.productsAvailable = false;
            } else {
                this.productsAvailable = true;
            }
        },
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

        updateProducts: function(products){
            this.products = products;
        },

        noFilter: function(id){
            var self = this;
            axios.get('/api/getProductsOfCategory/' + id)
                .then(function (response) {
                    console.log(response.data);
                    self.products = response.data;
                })
                .catch(function (error) {
                    console.log(error);
                });
        },

        filterGenre: function (id) {
            var genreId = id[0];
            var authorId = id[1];
            var self = this;

            //when both aren't null, filter for both
            if(genreId != 0 && authorId != 0){
                axios.get('/api/filterProducts?genreId=' + genreId + '&authorId=' + authorId)
                    .then(function (response) {
                        self.products = response.data;
                    })
                    .catch(function (error) {
                        console.log(error);
                    });

            } else {
                //filter for genre only
                if (genreId != 0) {
                    axios.get('/api/getProductsOfGenre/' + genreId)
                        .then(function (response) {
                            self.products = response.data;
                        })
                        .catch(function (error) {
                            console.log(error);
                        });
                }

                //filter for author only
                if (authorId != 0) {
                    axios.get('/api/getProductsOfAuthor/' + authorId)
                        .then(function (response) {
                            self.products = response.data;
                        })
                        .catch(function (error) {
                            console.log(error);
                        });
                }
            }
        }
    }
});
