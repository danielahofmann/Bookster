<template>
    <user-icon></user-icon>
</template>

<script>
    import { User } from 'vue-feather-icon'

    export default {
        data() {
            return {}
        },
        mounted() {
        },
        components: {
            UserIcon: User
        }
    }
</script>

<style lang="scss" scoped>
    @import '~@/app.scss';

    svg{
        width: 25px;
        height: 25px;
        stroke: $blue !important;
    }
</style>