<template>
    <div class="mobile-search">
        <img :src="'/img/search.png'" alt="Suche" class="mobile-search-icon">
        <input type="text" placeholder="Bücher suchen.." v-model="query" @keyup.enter="$emit('search', query)" class="mobile-search-input">
    </div>
</template>

<script>
    export default {
        data() {
            return {
                query: '',
            }
        },
        mounted() {
            console.log('Component ready');
        },
    }
</script>

<style lang="scss" scoped>
    @import '~@/app.scss';

    .mobile-search {
        margin-top: 10px;
        padding-right: 1.25rem;
        @include custom-min(1024px){
            display: none;
        }

        @include custom-max(400px){
            margin-top: 6px;
        }

        .mobile-search-icon {
            width: 25px;
            height: 25px;
            display: inline-block;

            &:hover{
                width: 27px;
                height: auto;
            }

            @include custom-max(400px){
                height: 20px;
                width: 20px;
            }
        }

        .mobile-search-input {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            display: block;
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