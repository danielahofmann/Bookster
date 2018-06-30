<template>
    <div class="cart">
        <a href="/cart/" class="cart-icon" :class="{ true : cart, false : cartInverse }">
            <div :class="{ quantity : cart, noShow : cartInverse }">
                <p>{{quantity}}</p>
            </div>
        </a>
    </div>
</template>

<script>
    export default {
        data: function() {
            return{}
        },
        mounted() {
            var self = this;

            axios
                .get('/api/getCartQuantity/')
                .then(function (response) {
                    const quantity = response.data;

                    if(quantity > 0){
                        self.$store.commit('newCartItem', quantity);
                    }

                    self.$store.commit('setQuantityCart', quantity);
                })
                .catch(function (error) {
                    console.log(error);
                });
        },
        computed: {
            cart(){
                return this.$store.state.cart;
            },
            quantity(){
                return this.$store.state.cartQuantity;
            },
            cartInverse(){
                if (this.$store.state.cart === true){
                    return false;
                }else{
                    return true;
                }
            }
        }
    }
</script>

<style lang="scss" scoped>
    @import '~@/app.scss';

    .cart {
        display: inline-block;
        .false {
            @include nav-icons ('/img/cart.png');
            background-size: 28px 25px;
        }

        .true {
            @include nav-icons ('/img/cart.png');
            background-size: 28px 25px;
        }
    }

    .quantity{
        background: $blue;
        width: 25px;
        border-radius: 50%;
        margin-left: 1rem;

        p{
            color: white;
            margin-left: 50%;
            transform: translateX(-40%);
        }
    }

    .noShow{
        display: none;
    }

</style>