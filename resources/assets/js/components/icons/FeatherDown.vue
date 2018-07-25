<template>
    <down-icon></down-icon>
</template>

<script>
    import { ChevronDown } from 'vue-feather-icon'

    export default {
        data() {
            return {}
        },
        mounted() {
            console.log('Component ready');
        },
        components: {
            DownIcon: ChevronDown
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