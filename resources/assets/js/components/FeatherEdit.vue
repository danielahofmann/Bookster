<template>
    <edit-icon></edit-icon>
</template>

<script>
    import { Edit } from 'vue-feather-icon'

    export default {
        data() {
            return {}
        },
        mounted() {
            console.log('Component ready');
        },
        components: {
            EditIcon: Edit
        }
    }
</script>

<style lang="scss" scoped>
    @import '~@/app.scss';

    svg {
        width: 20px;
        height: 20px;
        stroke: $white;
    }
</style>