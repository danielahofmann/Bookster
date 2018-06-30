<template>
    <div class="book grid-container">
        <div class="grid-x grid-padding-x">
            <div class="cell small-12 medium-6 flex-center image-div">
                <img :src="product.image[0].img" :alt="product.name" class="book-image">
            </div>
            <div class="cell small-12 medium-6 info">
                <p class="author">{{ product.author.firstname }} {{product.author.lastname }}</p>
                <p class="title">{{ product.name }}</p>
                <p class="price">{{ product.price }} € <span class="mwst">inkl. Mwst.</span></p>

                <div class="grid-x mobile-buttons">
                    <div class="cell small-9 medium-6">
                        <button class="button" @click="saveToCart(id)">In meine Tasche</button>
                    </div>
                    <button class="cell small-3 medium-6 wish-button" @click="saveToWishlist(id)"></button>
                </div>

                <p class="description">{{ product.description }}</p>

                <div class="grid-x margin buttons">
                    <div class="cell small-9 medium-6 flex-center">
                        <button class="button" @click="saveToCart(id)">In meine Tasche</button>
                    </div>
                    <button class="cell small-3 medium-6 wish-button" @click="saveToWishlist(id)"></button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                product: this.data,
                id: this.bookId
            }
        },
        mounted() {},
        methods:{
            saveToWishlist: function (id) {
                var self = this;

                axios.get('/api/saveProductToSessionWishlist/' + id)
                    .then(function (response) {
                        var quantity = response.data.wishlist.totalQuantity;
                        self.$store.commit('newWishlistItem', quantity);
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },
            saveToCart: function (id) {
                var self = this;

                axios.get('/api/saveProductToCart/' + id)
                    .then(function (response) {
                        console.log(response.data)
                        var quantity = response.data.cart.totalQuantity;
                        self.$store.commit('newCartItem', quantity);
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            }
        },
        props:['data', 'bookId']
    }
</script>

<style lang="scss" scoped>
    @import '~@/app.scss';

    .book{
        .image-div {
            @include custom-max(639px) {
                padding: 0 !important;
            }
            .book-image {
                max-height: 100%;
                width: auto;
                object-fit: contain;

                @include custom-max(639px) {
                    height: auto;
                    width: 100%;
                    object-fit: contain;
                }
            }
        }

        .author{
            @include text-styling($primary-font, $light, 1rem);
            color: $dark-grey;

            @include custom-max(639px) {
                margin-top: 2rem;
            }
        }

        .title{
            @include text-styling($primary-font, $bold, 1.5rem);
            color: $dark-grey;
        }

        .price{
            @include text-styling($secondary-font, $bold, 1.5rem);
            color: $dark-grey;
        }

        .mwst{
            @include text-styling($secondary-font, $regular, 1rem);
            color: $light-grey;
        }

        .description{
            @include text-styling($secondary-font, $regular, 1rem);
            color: $dark-grey;
        }
    }

    .wish-button{
        display: block;
        background: url(/img/wishlist-add-book.svg) no-repeat;
        background-size: 40px 40px;
        height: 40px;
        width: 40px;
        cursor: pointer;
        z-index: 1;

        &:hover{
            background: url(/img/wishlist-add-book-hover.svg) no-repeat;
            background-size: 40px 40px;
            height: 40px;
            width: 40px;
        }

        &:focus{
            outline: none;
        }
    }

    .mobile-buttons{
        display: flex;
        margin-bottom: 1.5rem;

        @include custom-min(640px) {
            display: none;
        }
    }

    .buttons{
        display: flex;

        @include custom-max(639px) {
            display: none;
        }
    }

    .button{
        background-color: $magenta;
        @include text-styling($primary-font, $regular, 1rem);
        color: $white;
        text-transform: uppercase;
        padding: 0.75rem 1.5rem;

        &:hover{
            background-color: $blue;
        }

        &:focus{
            background-color: $blue;
            outline: none;
        }
    }

    .margin{
        margin-top: 40px;
    }

    .info{
        @include custom-max(639px) {
            padding: 0 1rem !important;
        }
    }
</style>