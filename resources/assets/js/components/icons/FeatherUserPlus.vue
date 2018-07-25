<template>
    <user-plus-icon></user-plus-icon>
</template>

<script>
    import { UserPlus } from 'vue-feather-icon'

    export default {
        data() {
            return {}
        },
        mounted() {
        },
        components: {
            UserPlusIcon: UserPlus
        }
    }
</script>

<style lang="scss" scoped>
    @import '~@/app.scss';

    svg {
        width: 35px;
        height: 35px;
        stroke: $blue;
    }
</style>