<template>
    <div class="search cell small-2 large-4">
        <img :src="'/img/search.png'" alt="Suche" class="search-icon">
        <input type="text" placeholder="Bücher suchen.." v-model="query" @keyup.enter="$emit('search', query)" class="search-input">
    </div>
</template>

<script>
    export default {
        name: "age-circle",
        data(){
            return {
                query: '',
            }
        },
        mounted() {},
        methods: {

        }
    }
</script>

<style lang="scss" scoped>
    @import '~@/app.scss';

    .search {
        padding-left: 2rem;

        .search-icon {
            width: 25px;
            height: 25px;
            display: inline-block;

            &:hover{
                width: 27px;
                height: auto;
            }
        }

        .search-input {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            display: inline-block;
            border: none;
            box-shadow: none;
            width: 200px;
            @include text-styling($primary-font, $regular, 1rem);
            color: $dark-grey;

            &::-webkit-input-placeholder { /* Chrome/Opera/Safari */
                color: $light-grey;
            }
            &::-moz-placeholder { /* Firefox 19+ */
                color: $light-grey;
            }
            &::-ms-input-placeholder { /* IE 10+ */
                color: $light-grey;
            }
            &::-moz-placeholder { /* Firefox 18- */
                color: $light-grey;
            }

            &:focus{
                border-bottom: 1px solid $light-grey;
            }

            @include custom-max(1024px){
                display: none;
            }
        }
    }

</style>