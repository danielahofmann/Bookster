<template>
    <div class="cart">
        <a :href="route(this.path)" class="cart-icon" :class="{ true : cart, false : cartInverse }">
            <div v-if="cart" :class="{ quantity : cart, 'under-twenty' : overTen, 'under-ten' : underTen, twenty : twenty }">
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
            let self = this;

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
                if (this.$store.state.cartQuantity === true){
                    return false;
                }else{
                    return true;
                }
            },
            overTen(){
                if (this.$store.state.cartQuantity > 9 && this.$store.state.cartQuantity < 20){
                    return true;
                }else{
                    return false;
                }
            },
            underTen(){
                if (this.$store.state.cartQuantity < 10){
                    return true;
                }else{
                    return false;
                }
            },
            twenty(){
                if(this.$store.state.cartQuantity > 19){
                    return true;
                }else{
                    return false;
                }
            }
        },
        props:['path']
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
            @include nav-icons ('/img/filled-cart.svg');
            background-size: 28px 25px;
        }
    }

    .quantity{
        width: 25px;

        p{
            @include text-styling($primary-font, $bold, 0.75rem);
            color: $white;
            margin-left: 50%;
            padding-top: 0.4rem;
        }
    }

    .under-ten{
        p{
            margin-left: 61% !important;
            @include custom-max(400px){
                padding-top: 0.16rem;
                margin-left: 40% !important;
            }
        }
    }

    .under-twenty{
        p{
            margin-left: 55% !important;
            @include custom-max(400px){
                padding-top: 0.16rem;
                margin-left: 40% !important;
            }
        }
    }

    .twenty{
        p {
            margin-left: 50%;
            transform: translateX(-40%);

            @include custom-max(400px) {
                padding-top: 0.16rem;
                margin-left: 40% !important;
            }
        }
    }
</style>