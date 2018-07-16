import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

export const store = new Vuex.Store({
    state: {
        wishlist: false,
        wishlistQuantity: 0,
        product: 'default-product',
        ageGroup: '',
        cart: false,
        cartQuantity: 0,
        totalPrice: 0,
        deliveryPrice: 0,
    },

    mutations: {
        newWishlistItem(state, quantity) {
            state.wishlist = true;
            state.wishlistQuantity = quantity;
        },
        newCartItem(state, quantity) {
            state.cart = true;
            state.cartQuantity = quantity;
        },
        setQuantityWishlist(state, quantity) {
            state.wishlistQuantity = quantity;
        },
        setQuantityCart(state, quantity) {
            state.cartQuantity = quantity;
        },
        setProductRoute(state, ageGroup){
            state.product = ageGroup + '-product';
        },
        setAgeGroup(state, ageGroup){
            state.ageGroup = ageGroup;
        },
        setTotalPrice(state, totalPrice){
            state.totalPrice = totalPrice;
        },
        setDeliveryPrice(state, deliveryPrice){
            state.deliveryPrice = deliveryPrice;
        },
    }
});