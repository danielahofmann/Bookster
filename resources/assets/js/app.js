
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
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('age-circle', require('./components/AgeCircle.vue'));
Vue.component('search', require('./components/Search.vue'));
Vue.component('logo', require('./components/Logo.vue'));
Vue.component('login', require('./components/Login.vue'));
Vue.component('wishlist', require('./components/Wishlist.vue'));
Vue.component('cart', require('./components/Cart.vue'));
Vue.component('navigation', require('./components/Navigation.vue'));
Vue.component('category-nav', require('./components/CategoryNav.vue'));
Vue.component('slider', require('./components/Slider.vue'));
Vue.component('opening', require('./components/Opening.vue'));
Vue.component('manual', require('./components/Manual.vue'));
Vue.component('book-carousel', require('./components/BookCarousel.vue'));
Vue.component('book-carousel-product', require('./components/BookCarouselProduct.vue'));
Vue.component('novelties', require('./components/Novelties.vue'));
Vue.component('novelty-preview', require('./components/NoveltyPreview.vue'));
Vue.component('authors-list', require('./components/AuthorsList.vue'));

const app = new Vue({
    el: '#app',

    data: {
        age: null,
    },

    methods: {
        saveAgeToSession: function (choose) {
            this.age = choose;

            axios.get('/api/saveAgeToSession', {
                params: {
                    age: this.age
                }
            })
                .then(function (response) {
                    console.log(response.data.ageGroup);

                    url = response.data.ageGroup + "/"

                    window.location.href = url
                })
                .catch(function (error) {
                    console.log(error);
                });
        },

        search: function (query) {
            axios.get('/api/search?q=' + query, {
                params: {
                    query: this.query
                }
            })
                .then(function (response) {
                    console.log(response.data);
                    window.location.href = '/results';

                })
                .catch(function (error) {
                    console.log(error);
                });
        }
    }
});
