<template>
    <add-icon></add-icon>
</template>

<script>
    import { Plus } from 'vue-feather-icon'

    export default {
        data() {
            return {}
        },
        mounted() {
        },
        components: {
            AddIcon: Plus
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