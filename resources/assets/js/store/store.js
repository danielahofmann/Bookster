import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

export const store = new Vuex.Store({
    state: {
        wishlist: false,
        quantity: 0,
        product: 'default-product',
        ageGroup: '',

    },

    mutations: {
        newWishlistItem(state, quantity) {
            state.wishlist = true;
            state.quantity = quantity;
        },
        setQuantity(state, quantity) {
            state.quantity = quantity;
        },
        setProductRoute(state, ageGroup){
            state.product = ageGroup + '-product';
        },
        setAgeGroup(state, ageGroup){
            state.ageGroup = ageGroup;
        }
    }
});