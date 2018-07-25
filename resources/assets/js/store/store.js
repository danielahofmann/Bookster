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
        subTotal: 0,
        deliveryPrice: 0,
        totalPrice: 0,
        products: null,
    },

    mutations: {
        newWishlistItem(state, quantity) {
            state.wishlist = true;
            state.wishlistQuantity = quantity;
            },
        deleteWishlistItem(state, quantity) {
            state.wishlistQuantity = quantity;

            if(state.wishlistQuantity > 0){
                state.wishlist = true;
            }else{
                state.wishlist = false;
            }
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
        setSubTotal(state, subTotal){
            state.subTotal = subTotal;
        },
        setDeliveryPrice(state, deliveryPrice){
            state.deliveryPrice = deliveryPrice;
        },
        setTotalPrice(state){
            state.totalPrice = state.subTotal;
        },
        addDeliveryPriceToTotalPrice(state, deliveryPrice){
            state.totalPrice = state.subTotal + deliveryPrice;
        },
        updateProducts(state, products){
            state.products = products;
        },

    },

    actions: {
        nofilter (context, id) {
            axios.get('/api/getProductsOfCategory/' + id)
               .then(function (response) {
                   context.commit('updateProducts', response.data);
                })
                .catch(function (error) {
                  console.log(error);
            });
        },

        filter (context, id) {
            let genreId = id[0];
            let authorId = id[1];

            //when both aren't null, filter for both
            if(genreId != 0 && authorId != 0){
                axios.get('/api/filterProducts?genreId=' + genreId + '&authorId=' + authorId)
                    .then(function (response) {
                        context.commit('updateProducts', response.data);
                    })
                    .catch(function (error) {
                        console.log(error);
                    });

            } else {
                //filter for genre only
                if (genreId != 0) {
                    axios.get('/api/getProductsOfGenre/' + genreId)
                        .then(function (response) {
                            context.commit('updateProducts', response.data);
                        })
                        .catch(function (error) {
                            console.log(error);
                        });
                }

                //filter for author only
                if (authorId != 0) {
                    axios.get('/api/getProductsOfAuthor/' + authorId)
                        .then(function (response) {
                            context.commit('updateProducts', response.data);
                        })
                        .catch(function (error) {
                            console.log(error);
                        });
                }
            }
        }
    }
});