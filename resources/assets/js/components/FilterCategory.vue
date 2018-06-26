<template>
    <div>
        <div class="filter grid-x flex-center">
            <div class="small-6 medium-2 select-div">
                <select v-model="selectedGenre" class="select">
                    <option disabled selected value="0">Genre</option>
                    <option v-for="genre in genres" :value="genre.id">{{genre.genre}}</option>
                </select>
            </div>

            <div class="small-6 medium-2 select-div">
                <select v-model="selectedAuthor" class="select">
                    <option disabled selected value="0">Autor</option>
                    <option v-for="author in authors" :value="author.id">{{author.firstname}}
                        {{author.lastname}}
                    </option>
                </select>
            </div>
        </div>

        <div class="grid-x flex-center">
            <div v-if="selectedGenre || selectedAuthor" class="close-div" @click="noFilter(id)">
                <p class="close text-right">X</p>
                <p class="close-text text-center">Filter entfernen</p>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                genres: this.categoryGenres,
                authors: this.categoryAuthors,
                selectedGenre: 0,
                selectedAuthor: 0,
                id: this.categoryId,
            }
        },
        mounted() {},
        watch: {
            selectedGenre: function (id) {
                this.$emit('filter', [this.selectedGenre, this.selectedAuthor]);
            },

            selectedAuthor: function (id) {
                this.$emit('filter', [this.selectedGenre, this.selectedAuthor]);
            },
        },
        methods: {
            noFilter: function(id){
                this.selectedGenre = 0;
                this.selectedAuthor = 0;
                this.$emit('nofilter', id);
            }
        },
        props: ['categoryGenres', 'categoryAuthors', 'categoryId']
    }
</script>

<style lang="scss" scoped>
    @import '~@/app.scss';

    .filter{
        background: $beige;
        padding: 0;
        margin-top: 20px;

        .select-div{
            margin: 0 10px;

            .select{
                margin: 0;
                height: 60px;
                background: none;
                border: none;
                border-top: 2px solid $dark-grey;
                border-bottom: thin solid $dark-beige;

                &:focus{
                    box-shadow: none;
                    border-top: 2px solid $blue;
                }

                .option{
                    @include text-styling($primary-font, $regular, 1rem);
                    color: $dark-grey;
                    background-color: $beige;
                }
            }
        }
    }

    .close-div{
        margin-top: 10px;

        .close{
            @include text-styling($primary-font, $bold, 0.75rem);
            color: $light-grey;
            display: inline-block;
        }
        .close-text{
            @include text-styling($primary-font, $regular, 0.75rem);
            color: $light-grey;
            display: inline-block;

        }

        &:hover{
            .close{
                color: $dark-grey;
            }
            .close-text{
                @include text-styling($primary-font, $bold, 0.75rem);
                color: $dark-grey;
            }
        }
    }
</style>