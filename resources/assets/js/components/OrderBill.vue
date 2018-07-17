<template>
    <div class="cell small-12 grid-x">
        <p class="cell small-8 interim-result">Zwischensumme:</p>
        <p class="cell small-4 price interim-result">{{ this.subTotal }} €</p>
        <p class="cell small-8 interim-result">Versand:</p>
        <p class="cell small-4 price interim-result">{{deliveryPrice}} €</p>

        <p class="cell small-8 bold">GESAMT:</p>
        <p class="cell small-4 price bold">{{ totalPrice }} €</p>

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

    .bold{
        font-weight: $bold !important;
    }

    .interim-result{
        font-family: $secondary-font !important;
        font-size: 0.9rem !important;
    }
</style>