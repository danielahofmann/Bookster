<template>
    <div class="hamburger display-none-tablet cell small-3">
        <button class="hamburger-icon" @click="toggleOffcanvas()"></button>
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
        }
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

        @include desktop{
            display: none;
        }
    }

    button:focus{
        outline:0;
    }

</style>