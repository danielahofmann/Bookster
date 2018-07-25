<template>
    <mail-icon></mail-icon>
</template>

<script>
    import { Mail } from 'vue-feather-icon'

    export default {
        data() {
            return {}
        },
        mounted() {
            console.log('Component ready');
        },
        components: {
            MailIcon: Mail
        }
    }
</script>

<style lang="scss" scoped>
    @import '~@/app.scss';

    svg{
        stroke: $white;
    }

</style>