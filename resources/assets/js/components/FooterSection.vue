<template>
    <div class="footer">
        <footer-icons></footer-icons>
        <footer-navigation></footer-navigation>
        <footer-bottom></footer-bottom>
    </div>
</template>

<script>
    export default {
        data() {
            return {}
        },
        mounted() {
            console.log('Component ready');
        },
    }
</script>

<style lang="scss" scoped>
    @import '~@/app.scss';

    .footer{
        margin-top: 80px;
    }

</style>