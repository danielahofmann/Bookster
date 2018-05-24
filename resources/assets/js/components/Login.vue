<template>
    <div class="login">
        <a href="/login/" class="login-icon"></a>
    </div>
</template>

<script>
    export default {
        data() {
            return {}
        },
        mounted() {
            console.log('Login ready');
        },
    }
</script>

<style lang="scss" scoped>
    @import '~@/app.scss';

    .login-icon {
        @include nav-icons ('/img/user.png');
    }

</style>