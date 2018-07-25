<template>
    <plus-icon></plus-icon>
</template>

<script>
    import { PlusCircle } from 'vue-feather-icon'

    export default {
        data() {
            return {}
        },
        mounted() {
            console.log('Component ready');
        },
        components: {
            PlusIcon: PlusCircle
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