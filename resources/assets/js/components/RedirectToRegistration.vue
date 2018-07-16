<template>
    <div class="cell small-12 medium-3 large-2 flex-center" @click="saveCheckoutToSession()">
        <p class="add">+</p>
        <p>Jetzt registrieren</p>
    </div>
</template>

<script>
    export default {
        data() {
            return {}
        },
        mounted() {},
        methods: {
            saveCheckoutToSession: function(){
                axios
                    .get('/api/saveCheckoutToSession')
                    .then(response => (
                        window.location = '/' +response.data + '/register'))
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
        margin-bottom: 10rem;

        @include custom-max(639px){
            margin-bottom: 3rem;
        }

        p{
            @include text-styling($primary-font, $regular, 1rem);
            color: $dark-grey;
            text-align: center;
            margin: 0;
            display: inline-block;
        }

        .add{
            display: inline-block;
            padding-right: 1.5rem;
            font-size: 1.5rem;
            font-weight: $bold;
        }
    }
</style>