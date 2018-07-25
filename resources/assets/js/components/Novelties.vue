<template>
    <div class="grid-x">
        <h2 class="display-desktop-none cell small-12 text-center">Neuheiten</h2>
        <novelty-preview v-for="novelty in novelties" :key="novelty.id"
                         class="cell small-12 medium-6 large-4 novelties"
                         :bookTitle="novelty.name"
                         :authorFirstname="novelty.author.firstname"
                         :authorLastname="novelty.author.lastname"
                         :price="novelty.price"
                         :img="novelty.image[0].img"
                         :sizeTitle="1"
                         :sizeAuthor="1"
                         :sizePrice="1"
                         :id="novelty.id"
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
        padding:0 0 40px 0
    }

    .novelties:nth-child(even){
        @include custom-max(1023px){
            padding-left:40px;
        }

        @include custom-max(640px){
            padding: 10px 80px;
        }

        @include custom-max(520px){
            padding: 10px 40px;
        }

        @include custom-max(400px){
            padding: 0 20px;
        }
    }

    .novelties:nth-child(odd){
        @include custom-max(1023px){
            padding-right:40px;
        }

        @include custom-max(640px){
            padding: 10px 80px;
        }

        @include custom-max(520px){
            padding: 10px 40px;
        }

        @include custom-max(400px){
            padding: 0 20px;
        }
    }

</style>