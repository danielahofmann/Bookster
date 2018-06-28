<template>
    <div class="grid-container">
        <div class="grid-x grid-padding-x grid-padding-y">
            <kids-book-preview v-for="product in products" :key="product.id"
                               class="cell small-6 medium-3 large-3"
                               :bookId="product.id"
                               :img="product.image[0].img"
                               :href="url"
            ></kids-book-preview>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                products: this.characterProducts,
            }
        },
        mounted() {},
        props: ['characterProducts', 'url']
    }
</script>

<style lang="scss" scoped>
    @import '~@/app.scss';


</style>