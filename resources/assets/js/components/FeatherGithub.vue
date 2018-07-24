<template>
    <github></github>
</template>

<script>
    import { Github } from 'vue-feather-icon'

    export default {
        data() {
            return {}
        },
        mounted() {},
        components: {
            Github: Github
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