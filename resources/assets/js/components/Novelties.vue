<template>
    <div>
        <p v-for="novelty in novelties">{{novelty}}</p>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                novelties: null,
            }
        },
        mounted() {
        },
        created(){
            axios
                .get('/api/getNovelties')
                .then(response => (
                    this.novelties = response.data))
                .catch(function (error) {
                    console.log(error);
                });
        },
    }
</script>

<style lang="scss" scoped>
    @import '~@/app.scss';


</style>