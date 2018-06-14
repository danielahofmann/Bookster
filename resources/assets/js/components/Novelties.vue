<template>
    <div class="grid-x">
        <novelty-preview v-for="novelty in novelties" :key="novelty.id"
                class="cell small-4"
                :bookTitle="novelty.name"
                :authorFirstname="novelty.author.firstname"
                :authorLastname="novelty.author.lastname"
                :price="novelty.price"
                :img="novelty.image[0].img"
                :sizeTitle="1"
                :sizeAuthor="1"
                :sizePrice="1"
        ></novelty-preview>
    </div>
</template>

<script>
    // [TODO] implement click logic for opening product site

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

    h2{
        text-align: left;
        margin-bottom: 40px;
    }

</style>