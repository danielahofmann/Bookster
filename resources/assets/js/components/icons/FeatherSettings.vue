<template>
    <settings-icon></settings-icon>
</template>

<script>
    import { Settings } from 'vue-feather-icon'

    export default {
        data() {
            return {}
        },
        mounted() {},
        components: {
            SettingsIcon: Settings
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