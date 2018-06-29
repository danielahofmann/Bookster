<template>
    <div class="kids-novelties grid-container">
        <div class="grid-x">
            <kids-book-preview v-for="novelty in novelties" :key="novelty.id"
                               class="cell small-6 medium-3 large-3"
                               :bookId="novelty.id"
                               :img="novelty.image[0].img"
            ></kids-book-preview>
        </div>
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