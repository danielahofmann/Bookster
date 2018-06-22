<template>
    <div class="kids-novelties">
        <p v-for="novelty in novelties" :key="novelty.id">{{ novelty.name }}</p>
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
        created() {
            axios
                .get('/api/getKidsNovelties')
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

    .kids-novelties{

    }

</style>