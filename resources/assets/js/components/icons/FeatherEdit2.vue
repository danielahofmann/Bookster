<template>
    <edit></edit>
</template>

<script>
    import { Edit2 } from 'vue-feather-icon'

    export default {
        data() {
            return {}
        },
        mounted() {},
        components: {
            Edit: Edit2
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