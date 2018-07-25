<template>
    <up-icon></up-icon>
</template>

<script>
    import { ChevronUp } from 'vue-feather-icon'

    export default {
        data() {
            return {}
        },
        mounted() {
            console.log('Component ready');
        },
        components: {
            UpIcon: ChevronUp
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