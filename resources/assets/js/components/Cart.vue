<template>
    <div class="cart">
        <a href="/cart/" class="cart-icon"></a>
    </div>
</template>

<script>
    export default {
        data() {
            return {}
        },
        mounted() {
            console.log('cart ready');
        },
    }
</script>

<style lang="scss" scoped>
    @import '~@/app.scss';

    .cart {
        display: inline-block;
        .cart-icon {
            @include nav-icons ('/img/cart.png');
        }
    }

</style>