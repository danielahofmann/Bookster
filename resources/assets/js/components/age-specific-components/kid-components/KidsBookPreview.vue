<template>
    <div class="grid-x flex-center kid-preview">
        <div class="cell small-11">
            <a class="nav-link" :href="route(product, id)">
                <img :src="productImage + img" alt="Produktbild" class="kid-image">
            </a>
            <button class="wish-button" @click="saveToWishlist(id)"></button>
            <button class="delete-button" v-if="this.show" @click="deleteFromWishlist(bookId)">x entfernen</button>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                id: this.bookId,
                saved: this.wishlistSaved,
                show: this.showButton || false,
            }
        },
        mounted() {},
        computed: {
            product() {
                return this.$store.state.product;
            },
            productImage() {
                return this.$store.state.productImage;
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
                            console.log(response.data);
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
                        console.log(response.data);
                        location.reload();
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            }
        },
        props: ['bookId', 'img', 'wishlistSaved', 'showButton'],
    }
</script>

<style lang="scss" scoped>
    @import '~@/app.scss';

    .kid-preview{
        margin-bottom: 2rem;
        position: relative;

        .wish-button{
            display: block;
            background: url(/img/wishlist-add-kids.svg) no-repeat;
            background-size: 40px 40px;
            height: 40px;
            width: 40px;
            cursor: pointer;
            position: absolute;
            top: 5%;
            right: 10%;
            z-index: 1;
            transition: background 0.2s ease-in;

            &:hover{
                background: url(/img/wishlist-add-kids-hover.svg) no-repeat;
                background-size: 40px 40px;
                height: 40px;
                width: 40px;
            }

            &:focus{
                outline: none;
            }
        }

        .kid-image{
            &:hover{
                -webkit-box-shadow: 0px 0px 15px -4px rgba(97,97,97,1);
                -moz-box-shadow: 0px 0px 15px -4px rgba(97,97,97,1);
                box-shadow: 0px 0px 15px -4px rgba(97,97,97,1);
            }
        }
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