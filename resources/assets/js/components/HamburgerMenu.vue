<template>
    <div class="hamburger display-none-tablet cell small-3" :class="{ 'show-text' : isOld, 'medium-4' : isOld, 'small-6' : isOld}">
        <button class="hamburger-icon" :class="{ 'margin-left-small' : isOld }" @click="toggleOffcanvas()"></button>
        <p>MENU</p>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                isOld: this.oldTemplate,
            }
        },
        mounted() {},
        methods:{
            toggleButton: function(){
                document.getElementById('offcanvas-close').classList.toggle('button-show');
            },

            toggleOffcanvas: function(){
                document.getElementById('offCanvas').classList.toggle('is-open');
                document.getElementById('offcanvas-background').classList.toggle('open');
                document.getElementById('app').classList.toggle('no-scroll');
                setTimeout(this.toggleButton, 400);
            }
        },
        props: ['oldTemplate'],

    }
</script>

<style lang="scss" scoped>
    @import '~@/app.scss';

    .hamburger {
        display: inline-block;

        .hamburger-icon {
            @include nav-icons ('/img/menu.png');
            margin-left: 4rem;
            margin-top: 5px;
            cursor: pointer;

            @include custom-max(400px){
                margin-left: 3rem;
                margin-top: 8px;
            }
        }

        p{
            display: none;
        }

        .margin-left-small{
            @include custom-max(410px){
                margin-left: 2rem !important;
            }
        }

        @include desktop{
            display: none;
        }
    }

    button:focus{
        outline:0;
    }

    .show-text{
        .hamburger-icon{
            display: inline-block;
            margin-left: 0;
            -webkit-transform: translateX(-50%);
            transform: translateX(-50%);
            margin-top: 10px;
            padding-right: 0;
            margin-left: 4rem;
        }

        p{
            @include text-styling($primary-font, $regular, 1.5rem);
            display: inline-block;
            margin: 0;
        }
    }
</style>