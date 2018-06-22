<template>
    <div class="toddler-wishlist">
        <a href="/wishlist/" class="toddler-wishlist-icon"></a>
    </div>
</template>

<script>
    export default {
        data() {
            return {}
        },
        mounted() {},
    }
</script>

<style lang="scss" scoped>
    @import '~@/app.scss';

    .toddler-wishlist {
        display: inline-block;
        .toddler-wishlist-icon {
            display: block;
            background: url(/img/toddler-wishlist.svg) no-repeat;
            background-size: 40px 40px;
            height: 40px;
            width: 40px;
            padding-right: 5rem;
            margin-bottom: 15px;

            &:hover{
                background: url(/img/wishlist-add-kids.svg) no-repeat;
                background-size: 40px 40px;
            }

            @include custom-max(640px){
                margin-bottom: 0;
            }
        }
    }
</style>