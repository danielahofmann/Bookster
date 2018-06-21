<template>
    <div class="logo cell small-12">
        <a href="/" class="mobile-logo-image"></a>
    </div>
</template>

<script>
    export default {
        data() {
            return {}
        },
        mounted() {
            console.log('mobile logo for elderly and senior ready');
        },
    }
</script>

<style lang="scss" scoped>
    @import '~@/app.scss';

    .mobile-logo-image {
        display: none;

       @include custom-max(639px) {
           display: block;
           background: url("/img/logo.png") no-repeat;
           -webkit-background-size: 170px 30px;
           background-size: 170px 30px;
           height: 30px;
           width: 170px;
           margin-left: 50%;
           transform: translateX(-50%);
           margin-bottom: 0.5rem;
       }
    }
</style>