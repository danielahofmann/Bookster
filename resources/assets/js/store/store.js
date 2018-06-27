import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

export const store = new Vuex.Store({
    state: {
        wishlist: false,
        quantity: 0
    },

    mutations: {
        newWishlistItem(state, quantity) {
            state.wishlist = true;
            state.quantity = quantity;
        },
        setQuantity(state, quantity) {
            state.quantity = quantity;
        }
    }
});