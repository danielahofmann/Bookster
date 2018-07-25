<template>
    <div class="author-list grid-x flex-center">
        <h2 class="display-desktop-none cell small-12 text-center">Autoren</h2>
        <author-list-entry v-for="author in authors" :key="author.id"
                           :firstname="author.firstname"
                           :lastname="author.lastname"
                           :id="author.id"
                           :img="author.author_image.img"
                           :size="1"
                           class="cell medium-5 large-12"
        ></author-list-entry>
    </div>
</template>

<script>
    // [TODO] implement click logic for opening author with products

    export default {
        data() {
            return {
                authors: null,
            }
        },
        mounted() {
        },
        created() {
            axios
                .get('/api/getAuthors')
                .then(response => (
                    this.authors = response.data))
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

    .author-list{
        overflow: hidden;

        @include desktop{
            padding-left: 40px;
        }

        @include phone{
            display: none;
        }
    }
</style>