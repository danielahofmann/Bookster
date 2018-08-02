<template>
    <form class="search cell small-2 large-4" method="POST" :action="route('search')">
        <input type="hidden" name="_token" :value="csrf">

        <img :src="'/img/search.png'" alt="Suche" class="search-icon">
        <input type="text" placeholder="Bücher suchen.." name="query" class="search-input">
    </form>
</template>

<script>
    export default {
        data(){
            return {
                csrf: this.token
            }
        },
        props: ['token']
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

            @include custom-max(1023px){
                display: none;
            }
        }
    }

</style>