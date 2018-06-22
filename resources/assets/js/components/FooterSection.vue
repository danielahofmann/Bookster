<template>
    <div class="footer">
        <footer-icons v-if="show"></footer-icons>
        <footer-navigation v-if="show"></footer-navigation>
        <footer-bottom></footer-bottom>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                toddler: this.isToddler,
                show: !this.isToddler,
            }
        },
        mounted() {
            console.log('Component ready');
        },
        props: ['isToddler']
    }
</script>

<style lang="scss" scoped>
    @import '~@/app.scss';

    .footer{
        margin-top: 80px;
    }

</style>