<template>
    <div class="cell small-12 medium-8 grid-x order-box">
        <div class="cell small-12">
            <h4>Versandoptionen</h4>
            <div class="delivery-option grid-x">
                <p class="cell small-2 delivery-price">5,00 €</p>
                <div class="cell small-8 delivery-information">
                    <p class="title">Standardversand</p>
                    <p class="information">Lieferung innerhalb von 3-4 Werktagen</p>
                </div>
                <div class="cell small-2 delivery-radio">
                    <input type="radio" name="delivery" id="delivery" value="standard" @change="setDelivery(5)" required>
                </div>
            </div>

            <div class="delivery-option grid-x">
                <p class="cell small-2 delivery-price">8,00 €</p>
                <div class="cell small-8 delivery-information">
                    <p class="title">Expressversand</p>
                    <p class="information">Lieferung innerhalb von 1-2 Werktagen</p>
                </div>
                <div class="cell small-2 delivery-radio">
                    <input type="radio" name="delivery" id="delivery" value="express" @change="setDelivery(8)" required>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {}
        },
        mounted() {},
        methods: {
            setDelivery: function (deliveryPrice){
                this.$store.commit('setDeliveryPrice', deliveryPrice);
                this.$store.commit('addDeliveryPriceToTotalPrice', deliveryPrice);


            }
        }
    }
</script>

<style lang="scss" scoped>
    @import '~@/app.scss';


</style>