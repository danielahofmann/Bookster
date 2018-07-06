<template>
    <x-icon></x-icon>
</template>

<script>
    import { X } from 'vue-feather-icon'

    export default {
        data() {
            return {}
        },
        mounted() {},
        components: {
            XIcon: X
        }
    }
</script>

<style lang="scss" scoped>
    @import '~@/app.scss';

    svg{
        width: 20px;
        stroke: $light-grey;

        &:hover{
            stroke: $dark-grey;
        }
    }
</style>