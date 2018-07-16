<template>
    <div class="cell small-12 grid-x">
        <p class="cell small-8">Zwischensumme:</p>
        <p class="cell small-4 price">{{ this.subTotal }} €</p>
        <p class="cell small-8">Versand:</p>
        <p class="cell small-4 price">{{deliveryPrice}} €</p>

        <p class="cell small-8">GESAMT:</p>
        <p class="cell small-4 price">{{ totalPrice }} €</p>

    </div>
</template>

<script>
    export default {
        data() {
            return {}
        },
        mounted() {
            this.$store.commit('setSubTotal', this.subTotal);
            this.$store.commit('setTotalPrice');

        },
        computed: {
            deliveryPrice() {
                return this.$store.state.deliveryPrice;
            },
            totalPrice() {
                return this.$store.state.totalPrice;
            },
        },
        props: ['subTotal']
    }
</script>

<style lang="scss" scoped>
    @import '~@/app.scss';

    .price{
        text-align: right;
    }
</style>