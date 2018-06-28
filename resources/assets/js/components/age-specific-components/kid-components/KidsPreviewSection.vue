<template>
    <div class="grid-container book-preview-section">
        <div class="grid-x grid-padding-x grid-padding-y" v-if="products">
            <kids-book-preview v-for="product in products" :key="product.id"
                               class="cell small-6 medium-3 large-3"
                               :bookId="product.id"
                               :img="product.image[0].img"
            ></kids-book-preview>
        </div>

        <div class="grid-x grid-padding-x grid-padding-y" v-else>
            <kids-book-preview v-for="product in allProductsOfCategory" :key="product.id"
                               class="cell small-6 medium-3 large-3"
                               :bookId="product.id"
                               :img="product.image[0].img"
            ></kids-book-preview>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                category: this.categoryId,
                allProductsOfCategory: null,
                fontSize: this.fontsize,
            }
        },
        created(){
            var self = this;

            axios
                .get('/api/getProductsOfCategory/' + this.category)
                .then(function (response) {
                    self.allProductsOfCategory = response.data;
                })
                .catch(function (error) {
                    console.log(error);
                });
        },
        mounted() {
        },
        computed: {
            products: function() {
                return this.parentProducts;
            },
        },
        watch: {
            products: function (id) {
                this.$emit('update', this.products);
            },
            parentProducts: function(){

            }
        },
        props: ['category-id', 'fontsize', 'parentProducts']
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