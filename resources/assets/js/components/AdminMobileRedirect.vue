<template>
    <div class="display-mobile-flex dashboard-redirect grid-x">
        <div class="cell small-2 flex-center">
            <a :href="route('admin.dashboard')">
                <img src="/img/redirect-back.svg" alt="Zurück">
            </a>
        </div>

        <h2 class="cell small-10 text-left">{{this.headline}}</h2>
    </div>
</template>

<script>
    export default {
        data() {
            return {}
        },
        mounted() {},
        props: ['headline']
    }
</script>

<style lang="scss" scoped>
    @import '~@/app.scss';


</style>