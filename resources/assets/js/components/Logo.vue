<template>
    <div class="logo cell small-4 large-4">
        <a href="/" class="logo-image"></a>
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

            @include custom-max(1024px){
                margin-left: 0;
                transform: translateX(0);
            }

            @include custom-max(430px){
                -webkit-background-size: 120px 20px;
                background-size: 120px 20px;
                height: 20px;
                width: 120px;
                margin-top: 10px;
            }

            @include custom-max(340px){
                -webkit-background-size: 100px 17px;
                background-size: 100px 17px;
                height: 17px;
                width: 100px;
            }
        }

    }
</style>