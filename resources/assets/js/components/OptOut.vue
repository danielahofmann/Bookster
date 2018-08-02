<template>
    <div class="opt-out cell small-12 flex-center">
        <a href="" @click="optout">Zur Standard-Website</a>
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
            optout: function(){
                event.preventDefault();

                axios.get('/api/saveAgeToSession', {
                    params: {
                        age: '19-50'
                    }
                })
                    .then(function (response) {
                        window.location = route(response.data.ageGroup + '-home');
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            }
        }
    }
</script>

<style lang="scss" scoped>
    @import '~@/app.scss';

    .opt-out{
        a{
            @include text-styling($primary-font, $regular, 0.8rem);
            color: $dark-gray;
            padding-bottom: 1.5rem;
            padding-top: 2.5rem;

            &:hover{
                text-decoration: underline;
            }
        }
    }

</style>