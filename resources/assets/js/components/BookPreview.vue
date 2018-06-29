<template>
    <div class="book-preview grid-x grid-padding-x cell small-6 medium-3 large-2">
        <a class="nav-link cell small-12" :href="route(product, id)">
            <div class="">
                <img :src="img" alt="Produktbild" class="book-image">
                <button class="book-wish-button" @click="saveToWishlist(bookId)"></button>
            </div>
            <div class="cell small-12 book-info">
                <p class="text-center book-text" :style="{ fontSize: fontSize }">{{title}}</p>
                <p class="text-center book-text" :style="{ fontSize: fontSize }">{{price}}€</p>
            </div>
        </a>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                fontSize: this.size + "rem",
                bookId: this.id
            }
        },
        mounted() {
        },
        computed: {
            product() {
                return this.$store.state.product;
            },
        },
        methods: {
            saveToWishlist: function (bookId) {
                var self = this;

                axios.get('/api/saveProductToSessionWishlist/' + bookId)
                    .then(function (response) {
                        var quantity = response.data.wishlist.totalQuantity;
                        self.$store.commit('newWishlistItem', quantity);
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            }
        },
        props: ['title', 'price', 'id', 'img', 'size']
    }
</script>

<style lang="scss" scoped>
    @import '~@/app.scss';

    .book-preview{
        margin-bottom: 2rem;
        position: relative;

        .book-wish-button{
            display: block;
            background: url(/img/wishbutton.svg) no-repeat;
            background-size: 40px 40px;
            height: 40px;
            width: 40px;
            cursor: pointer;
            position: absolute;
            top: 5%;
            right: 15%;
            z-index: 1;
            transition: background 0.1s ease-in;

            &:hover{
                background: url(/img/wishbutton-hover.svg) no-repeat;
                background-size: 40px 40px;
                height: 40px;
                width: 40px;
            }

            &:focus{
                outline: none;
                background: url(/img/wishbutton-focus.svg) no-repeat;
                background-size: 40px 40px;
                height: 40px;
                width: 40px;
            }
        }

        &:hover{
            background: $beige;
        }
    }

    .book-text{
        @include text-styling($secondary-font, $regular, 1rem);
        margin: 0;
        color: $dark-grey;

        &:hover{
            font-weight: $bold;
        }
    }

    .book-image{
        padding-top: 10px;

        &:hover{
            border: thin solid $beige;
        }
    }

    .book-info{
        padding: 5px 0 10px 0;
    }


</style>