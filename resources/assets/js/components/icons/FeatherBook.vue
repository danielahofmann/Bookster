<template>
    <book-icon></book-icon>
</template>

<script>
    import { Book } from 'vue-feather-icon'

    export default {
        data() {
            return {}
        },
        mounted() {
            console.log('Component ready');
        },
        components: {
            BookIcon: Book
        }
    }
</script>

<style lang="scss" scoped>
    @import '~@/app.scss';

    svg{
        width: 20px;
    }
</style>