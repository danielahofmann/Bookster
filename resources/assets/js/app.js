
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
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// TODO organize this massive chunk!
Vue.component('age-circle', require('./components/AgeCircle.vue'));
Vue.component('search', require('./components/Search.vue'));
Vue.component('mobile-search', require('./components/MobileSearch.vue'));
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
Vue.component('author-list-entry', require('./components/AuthorListEntry.vue'));
Vue.component('footer-section', require('./components/FooterSection.vue'));
Vue.component('footer-icons', require('./components/FooterIcons.vue'));
Vue.component('footer-navigation', require('./components/FooterNavigation.vue'));
Vue.component('footer-bottom', require('./components/FooterBottom.vue'));
Vue.component('hamburger-menu', require('./components/HamburgerMenu.vue'));
Vue.component('offcanvas', require('./components/OffCanvas.vue'));
Vue.component('offcanvas-close', require('./components/OffCanvasClose.vue'));
Vue.component('filter-category', require('./components/FilterCategory.vue'));
Vue.component('book-preview', require('./components/BookPreview.vue'));
Vue.component('book-preview-section', require('./components/BookPreviewSection.vue'));


Vue.component('mobile-logo', require('./components/age-specific-components/elderly-components/MobileLogo.vue'));
Vue.component('kids-book-preview', require('./components/age-specific-components/kid-components/KidsBookPreview.vue'));
Vue.component('kids-preview', require('./components/age-specific-components/kid-components/KidsPreviewSection.vue'));
Vue.component('kids-novelties', require('./components/age-specific-components/kid-components/KidsNovelties.vue'));
Vue.component('toddler-carousel', require('./components/age-specific-components/toddler-components/ToddlerCarousel.vue'));
Vue.component('toddler-character', require('./components/age-specific-components/toddler-components/ToddlerCharacter.vue'));
Vue.component('toddler-character-books', require('./components/age-specific-components/toddler-components/ToddlerCharacterBooks.vue'));
Vue.component('toddler-opt-out', require('./components/age-specific-components/toddler-components/ToddlerFooterOptOut.vue'));
Vue.component('toddler-wishlist', require('./components/age-specific-components/toddler-components/ToddlerWishlist.vue'));
Vue.component('toddler-redirect', require('./components/age-specific-components/toddler-components/ToddlerRedirectBack.vue'));
Vue.component('toddler-carousel-element', require('./components/age-specific-components/toddler-components/ToddlerCarouselElement.vue'));

const app = new Vue({
    el: '#app',

    store,

    data: {
        age: null,
        products: null,
        productsAvailable: false,
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

            axios.get('/api/saveAgeToSession', {
                params: {
                    age: this.age
                }
            })
                .then(function (response) {
                    console.log(response.data.ageGroup);

                    const url = response.data.ageGroup + "/";

                    window.location.href = url;
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
