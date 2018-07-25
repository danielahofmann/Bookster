<template>
    <logout-icon></logout-icon>
</template>

<script>
    import { LogOut } from 'vue-feather-icon'

    export default {
        data() {
            return {}
        },
        mounted() {},
        components: {
            LogoutIcon: LogOut
        }
    }
</script>

<style lang="scss" scoped>
    @import '~@/app.scss';

    svg{
        width: 20px;
        stroke: $dark-grey;

        &:hover{
            stroke: $dark-grey;
        }
    }
</style>