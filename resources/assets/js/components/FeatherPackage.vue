<template>
    <package-icon></package-icon>
</template>

<script>
    import { Package } from 'vue-feather-icon'

    export default {
        data() {
            return {}
        },
        mounted() {},
        components: {
            PackageIcon: Package
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