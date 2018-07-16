<template>
    <div class="cell small-12 medium-3 large-2  flex-center" @click="saveCheckoutToSession()">
        <feather-user></feather-user>
        <p>Jetzt einloggen</p>
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
            saveCheckoutToSession: function(){
                axios
                    .get('/api/saveCheckoutToSession')
                    .then(response => (
                       window.location = '/' +response.data + '/login'))
                    .catch(function (error) {
                        console.log(error);
                    });
            }
        }
    }
</script>

<style lang="scss" scoped>
    @import '~@/app.scss';

    div{
        background-color: $white;
        padding: 1.5rem;
        margin-right: 2rem;
        margin-bottom: 10rem;

        @include custom-max(639px){
            margin: 0;
            margin-bottom: 1rem;
        }

        p{
            @include text-styling($primary-font, $regular, 1rem);
            color: $dark-grey;
            text-align: center;
            margin: 0;
            display: inline-block;
            padding-left: 1.5rem;
        }

        svg{
            display: inline-block;
        }
    }
</style>