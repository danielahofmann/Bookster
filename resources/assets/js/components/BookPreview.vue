<template>
    <div class="book-preview grid-x grid-padding-x cell small-6 medium-3 large-2">
        <a class="nav-link cell small-12" :href="route(product, bookId)">
            <div class="">
                <img :src="img" alt="Produktbild" class="book-image">
            </div>
            <div class="cell small-12 book-info">
                <p class="text-center book-text" :style="{ fontSize: fontSize }">{{title}}</p>
                <p class="text-center book-text" :style="{ fontSize: fontSize }">{{price}}€</p>
            </div>
        </a>
        <button class="book-wish-button" :class="{'saved-to-wishlist' : saved}" @click="saveToWishlist(bookId)"></button>
        <button class="delete-button" v-if="this.show" @click="deleteFromWishlist(bookId)">x entfernen</button>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                fontSize: this.size + "rem",
                bookId: this.id,
                saved: this.wishlistSaved,
                show: this.showButton || false,
            }
        },

        computed: {
            product() {
                return this.$store.state.product;
            },
            wishlist(){
                return this.$store.state.wishlist;
            },
        },
        methods: {
            saveToWishlist: function (bookId) {
                let self = this;
                if(!this.saved) {
                    this.saved = true;

                    axios.get('/api/saveProductToSessionWishlist/' + bookId)
                        .then(function (response) {
                            let quantity = response.data.wishlist.totalQuantity;
                            self.$store.commit('newWishlistItem', quantity);
                        })
                        .catch(function (error) {
                            console.log(error);
                        });
                }else{
                    this.saved = false;

                    axios.get('/api/deleteProductFromSessionWishlist/' + bookId)
                        .then(function (response) {
                            let quantity = response.data.wishlist.totalQuantity;
                            self.$store.commit('deleteWishlistItem', quantity);

                            if(self.show) {
                                location.reload();
                            }
                        })
                        .catch(function (error) {
                            console.log(error);
                        });
                }
            },
            deleteFromWishlist: function(bookId){
                let self = this;
                this.saved = false;

                axios.get('/api/deleteProductFromSessionWishlist/' + bookId)
                    .then(function (response) {
                        let quantity = response.data.wishlist.totalQuantity;
                        self.$store.commit('deleteWishlistItem', quantity);
                        location.reload();
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            }
        },
        props: ['title', 'price', 'id', 'img', 'size', 'showButton', 'wishlistSaved']
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

        .saved-to-wishlist{
            background: url(/img/wishbutton-focus.svg) no-repeat;
            background-size: 40px 40px;
            height: 40px;
            width: 40px;
        }

        &:hover{
            background: $beige;

            .book-text{
                &:first-child {
                    font-weight: $bold;
                }
            }

            .book-image{
                border: thin solid $beige;
            }
        }
    }

    .book-text{
        @include text-styling($secondary-font, $regular, 1rem);
        margin: 0;
        color: $dark-grey;
    }

    .book-image{
        padding-top: 10px;
    }

    .book-info{
        padding: 5px 0 10px 0;
    }

    .delete-button{
        @include text-styling($primary-font, $regular, 0.75rem);
        @include margin-left;
        color: $light-grey;
        padding-bottom: 0.5rem;


        &:hover{
            font-weight: $bold;
            color: $dark-grey;
            cursor: pointer;
        }
    }

</style>