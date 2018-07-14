<template>
    <div class="login display-none-tablet">
        <a :href="route(this.path)" class="login-icon"></a>
    </div>
</template>

<script>
    export default {
        data() {
            return {}
        },
        mounted() {},
        props: ['path']
    }
</script>

<style lang="scss" scoped>
    @import '~@/app.scss';

    .login {
        display: inline-block;
        .login-icon {
            @include nav-icons ('/img/user.png');
            padding-left: 1rem;
        }

        @include tablet{
            display: none;
        }

        @include phone{
            display: none;
        }
    }

</style>