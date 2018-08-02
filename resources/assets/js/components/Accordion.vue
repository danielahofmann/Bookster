<template>
    <div class="cell small-10">
        <div class="grid-x flex-center accordion" @click="show = !show">
            <p @click="show = !show" class="cell small-11 title">{{question}}</p>
            <feather-x class="cell small-1 svg" :class="{ isActive : show }" @click="show = !show"></feather-x>
        </div>
        <transition name="slide-fade">
            <p class="text" v-if="show">{{content}}</p>
        </transition>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                show: false,
                question: this.title,
                content: this.text

            }
        },
        mounted() {},
        props: ['title', 'text']
    }
</script>

<style lang="scss" scoped>
    @import '~@/app.scss';

    .slide-fade-enter-active {
        transition: all 0.5s ease;
    }
    .slide-fade-leave-active {
        transition: all 0.5s cubic-bezier(1.0, 0.5, 0.8, 1.0);
    }
    .slide-fade-enter, .slide-fade-leave-to {
        transform: translateY(-10px);
        opacity: 0;
    }

    .accordion{
        padding: 1rem 2rem;
        border: thin solid $beige;
        margin: 0;

        &:hover{
            border: thin solid $dark-beige;
            -webkit-box-shadow: 0px 0px 20px -2px rgba(150,150,150,0.15);
            -moz-box-shadow: 0px 0px 20px -2px rgba(150,150,150,0.15);
            box-shadow: 0px 0px 20px -2px rgba(150,150,150,0.15);
        }

        &:focus{
            background-color: $white;
        }
    }

    .title{
        @include text-styling($secondary-font, $bold, 0.9rem);
        color: $dark-grey;
        margin: 0;
        text-transform: uppercase;
    }

    .svg{
        -ms-transform: rotate(45deg); /* IE 9 */
        -webkit-transform: rotate(45deg); /* Safari 3-8 */
        transform: rotate(45deg);

        -webkit-transition-duration: 1s;
        -moz-transition-duration: 1s;
        -o-transition-duration: 1s;
        transition-duration: 1s;
        -webkit-transition-property: -webkit-transform;
        -moz-transition-property: -moz-transform;
        -o-transition-property: -o-transform;
        transition-property: transform;
    }

    .isActive{
        -ms-transform: rotate(90deg); /* IE 9 */
        -webkit-transform: rotate(90deg); /* Safari 3-8 */
        transform: rotate(90deg);
    }

    .text{
        @include text-styling($secondary-font, $regular, 1rem);
        color: $dark-grey;
        padding: 1rem 2rem;
        border: thin solid $dark-beige;
    }
</style>