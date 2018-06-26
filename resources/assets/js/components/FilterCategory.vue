<template>
    <div class="filter grid-x">
        <div class="small-6">
            <select v-model="selectedGenre">
                <option disabled value="">Genre</option>
                <option v-for="genre in genres" :value="genre.id">{{genre.genre}}</option>
            </select>
        </div>

        <div class="small-6">
            <select v-model="selectedAuthor">
                <option disabled value="">Autor</option>
                <option v-for="author in authors" :value="author.id">{{author.firstname}} {{author.lastname}}</option>
            </select>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                genres: this.categoryGenres,
                authors: this.categoryAuthors,
                selectedGenre: null,
                selectedAuthor: null,
            }
        },
        mounted() {},
        watch: {
            selectedGenre: function (id) {
                this.$emit('filter', [this.selectedGenre, this.selectedAuthor]);
            },

            selectedAuthor: function (id) {
                this.$emit('filter', [this.selectedGenre, this.selectedAuthor]);
            }
        },
        methods: {

        },
        props: ['categoryGenres', 'categoryAuthors']
    }
</script>

<style lang="scss" scoped>
    @import '~@/app.scss';

    .filter{
        background: $beige;
        padding: 10px 0;
        margin-top: 20px;
    }

</style>