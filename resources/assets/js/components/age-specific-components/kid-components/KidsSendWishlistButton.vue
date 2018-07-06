<template>
    <div class="grid-x flex-center">
        <button class="button" @click="doSomething">Versende deine Wunschliste</button>
    </div>
</template>

<script>
    export default {
        data() {
            return {}
        },
        mounted() {
            console.log('Component ready');
        },
        methods: {
            doSomething: function () {
                console.log('clicked')
            },

        }
    }
</script>

<style lang="scss" scoped>
    @import '~@/app.scss';


</style>