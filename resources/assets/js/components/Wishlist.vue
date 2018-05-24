<template>
    <div class="wishlist">
        <a href="/wishlist/" class="wishlist-icon"></a>
    </div>
</template>

<script>
    export default {
        data() {
            return {}
        },
        mounted() {
            console.log('wishlist ready');
        },
    }
</script>

<style lang="scss" scoped>
    @import '~@/app.scss';

    .wishlist {
        display: inline-block;
        .wishlist-icon {
            @include nav-icons ('/img/wishlist.png');
        }
    }

</style>