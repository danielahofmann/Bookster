<template>
    <div class="grid-container book-preview-section">
        <div class="grid-x" v-if="products">
            <book-preview v-for="product in products" :key="product.id"
                          :title="product.name"
                          :price="product.price"
                          :img="product.image[0].img"
                          :id="product.id"
                          :size="fontSize"
            ></book-preview>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                category: this.categoryId,
                fontSize: this.fontsize,
            }
        },
        created(){
            var self = this;

            axios.get('/api/getProductsOfCategory/' + this.category)
                .then(function (response) {
                    self.$store.commit('updateProducts', response.data);
                })
                .catch(function (error) {
                    console.log(error);
                });
        },
        computed: {
            products: function() {
                return this.$store.state.products;
            },
            wishlist(){
                return this.$store.state.wishlist;
            },
        },
        props: ['category-id', 'fontsize']
    }
</script>

<style lang="scss" scoped>
    @import '~@/app.scss';

    .book-preview-section{
        margin-top: 40px;

        @include custom-max(639px){
            margin-top: 20px;
        }
    }

</style>