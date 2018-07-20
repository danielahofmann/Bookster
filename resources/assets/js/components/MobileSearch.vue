<template>
    <form class="mobile-search" method="POST" :action="route('search')">
        <input type="hidden" name="_token" :value="csrf">

        <img :src="'/img/search.png'" alt="Suche" class="mobile-search-icon" @click="show = !show">
        <transition name="slide-fade">
            <input type="text" placeholder="Bücher suchen.." name="query" class="mobile-search-input display" v-if="show">
        </transition>
    </form>
</template>

<script>
    export default {
        data() {
            return {
                csrf: this.token,
                show: false,
            }
        },
        props: ['token']
    }
</script>

<style lang="scss" scoped>
    @import '~@/app.scss';
    .slide-fade-enter-active {
        transition: all 0.25s ease;
    }
    .slide-fade-leave-active {
        transition: all 0.25s cubic-bezier(1.0, 0.5, 0.8, 1.0);
    }
    .slide-fade-enter, .slide-fade-leave-to {
        transform: translateY(-10px);
        opacity: 0;
    }

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

        .display{
            display: block;
            position: absolute;
            width: 100% !important;
            background-color: $beige;
            left: 0;
            top: 65px;
            padding: 2rem;
            z-index: 10;
        }
    }

</style>