<template>
    <div class="cart-product grid-x">
        <img :src="productImage + this.img" :alt="this.title" class="cell small-4 image">
        <div class="cell small-7 text">
            <p class="title" :style="{ fontSize: fontSize }">{{ this.title }}</p>
            <p class="author" :style="{ fontSize: fontSize }">{{ this.author }}</p>
            <p class="price" :style="{ fontSize: fontSize }">{{ this.price }} €</p>
        </div>
        <div class="cell small-1 quantity-control">
            <div  @click="increaseProduct(bookId)">
                <feather-up></feather-up>
            </div>
            <p class="quantity" :style="{ fontSize: fontSize }">{{ this.quantity }}</p>
            <div @click="decreaseProduct(bookId)">
                <feather-down></feather-down>
            </div>
        </div>
        <button class="cell small-12 delete" @click="deleteProduct(bookId)">Artikel entfernen</button>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                bookId: this.id,
                fontSize: this.size + "rem",
            }
        },
        computed: {
            productImage() {
                return this.$store.state.productImage;
            },
        },
        methods: {
            deleteProduct: function (id) {
                let self = this;

                axios.get('/api/deleteProductFromCart/' + id)
                    .then(function (response) {
                        console.log(response.data);
                        location.reload();
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },
            increaseProduct: function (id) {
                let self = this;

                axios.get('/api/saveProductToCart/' + id)
                    .then(function (response) {
                        console.log(response.data);
                        location.reload();
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },
            decreaseProduct: function (id) {
                let self = this;

                axios.get('/api/decreaseProductQuantityInCart/' + id)
                    .then(function (response) {
                        console.log(response.data);
                        location.reload();
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            }
        },
        props: ['title', 'author', 'price', 'quantity', 'img', 'id', 'size']
    }
</script>

<style lang="scss" scoped>
    @import '~@/app.scss';

    .cart-product{
        margin: 1rem;
        padding: 1rem 0;
        border-bottom: thin solid $beige;

        .image{
            height: 125px;
            object-fit: contain;
        }

        .title{
            @include text-styling($primary-font, $bold, 1rem);
            color: $dark-grey;
        }

        .author{
            @include text-styling($primary-font, $regular, 1rem);
            color: $dark-grey;
        }

        .price{
            @include text-styling($secondary-font, $bold, 1rem);
            color: $dark-grey;
        }

        .quantity-control{
            margin-top: 1.5rem;
            .control{
                @include text-styling($primary-font, $bold, 1.2rem);
                color: $light-grey;
            }

            .quantity{
                @include text-styling($primary-font, $bold, 1rem);
                color: $dark-grey;
                margin-bottom: 0.45rem;
                padding-left: 0.4rem;

            }
        }

        .text{
            padding: 0 1rem;
        }

        .delete{
            text-align: center;
            @include text-styling($primary-font, $light, 0.75rem);
            color: $light-grey;
            margin: 1rem 0 0 0;

            &:hover{
                color: $dark-grey;
            }
        }
    }

</style>