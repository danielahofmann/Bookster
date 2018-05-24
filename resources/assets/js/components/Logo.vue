<template>
    <div class="logo cell large-4">
        <a href="/" class="logo-image "></a>
    </div>
</template>

<script>
    export default {
        data() {
            return {}
        },
        mounted() {
            console.log('Logo ready');
        },
    }
</script>

<style lang="scss" scoped>
    @import '~@/app.scss';

    .logo{
        .logo-image {
            display: block;
            background: url("/img/logo.png") no-repeat;
            -webkit-background-size: 170px 30px;
            background-size: 170px 30px;
            height: 30px;
            width: 170px;
            margin-left: 50%;
            transform: translateX(-50%);
        }

    }
</style>