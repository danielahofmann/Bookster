<template>
    <div class="footer">
        <footer-icons v-if="show"></footer-icons>
        <footer-navigation v-if="show"></footer-navigation>
        <toddler-opt-out v-if="toddler"></toddler-opt-out>
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
        mounted() {},
        props: ['isToddler']
    }
</script>

<style lang="scss" scoped>
    @import '~@/app.scss';

    .footer{
       // margin-top: 60px;
    }

</style>