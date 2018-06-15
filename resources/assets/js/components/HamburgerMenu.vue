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
            toggleOffcanvas: function(){
                document.getElementById('offCanvas').classList.toggle('is-open');
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