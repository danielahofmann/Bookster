<template>
    <div class="book grid-container">
        <div class="grid-x grid-padding-x">
            <div class="cell small-12 medium-6 flex-center">
                <img :src="product.image[0].img" :alt="product.name" class="book-image">
            </div>
            <div class="cell small-12 medium-6">
                <p class="author">{{ product.author.firstname }} {{product.author.lastname }}</p>
                <p class="title">{{ product.name }}</p>
                <p class="price">{{ product.price }} € <span class="mwst">inkl. Mwst.</span></p>
                <p class="description">{{ product.description }}</p>
                <button class="wish-button" @click="saveToWishlist(id)"></button>
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
        mounted() {
            console.log('Component ready');
        },
        methods:{
            saveToWishlist: function (id) {
                var self = this;

                axios.get('/api/saveProductToSessionWishlist/' + id)
                    .then(function (response) {
                        self.$store.commit('newWishlistItem', quantity);
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
        .book-image{
            max-height: 100%;
            width: auto;
            object-fit: contain;
        }

        .author{
            @include text-styling($primary-font, $light, 1rem);
            color: $dark-grey;
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
        background: url(/img/wishlist-true-kids.svg) no-repeat;
        background-size: 80px 80px;
        height: 80px;
        width: 80px;
        cursor: pointer;
        z-index: 1;
        @include margin-left;
        margin-top: 40px;

        &:hover{
            background: url(/img/wishlist-hover-kids-product.svg) no-repeat;
            background-size: 80px 80px;
            height: 80px;
            width: 80px;
        }

        &:focus{
            outline: none;
        }
    }
</style>