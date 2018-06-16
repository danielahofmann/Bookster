<template>
    <div class="button" id="offcanvas-close">
        <button @click="closeOffCanvas()">X</button>
    </div>
</template>

<script>
    export default {
        data() {
            return {}
        },
        mounted() {
            console.log('Component ready');
        },
        methods: {
            closeOffCanvas: function(){
                document.getElementById('offCanvas').classList.toggle('is-open');
                document.getElementById('offcanvas-background').classList.toggle('open');
                document.getElementById('app').classList.toggle('no-scroll');
                document.getElementById('offcanvas-close').classList.toggle('button-show');
            }
        }
    }
</script>

<style lang="scss" scoped>
    @import '~@/app.scss';

    .button{
        display: none;
        left: 0;

        &:hover{
            background-color: $dark-beige;
        }
    }

    .button-show{
        -webkit-transition: display 5s;
        transition: display 5s;
        position: absolute;
        left: 350px;
        z-index: 105;
        background: $beige;
        padding: 15px 20px;
        display: block;
        @include text-styling($primary-font, $bold, 1.7rem);
        color: $dark-grey;

        @include custom-max(400px) {
            left: 250px;
        }

        button{
            color: $dark-grey;

            &:hover{
                background-color: $dark-beige;
            }
        }
    }

    button:focus{
        outline:0;
        background-color: $beige;
    }
</style>