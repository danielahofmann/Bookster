<template>
    <div class="grid-x flex-center">
        <button type="submit" class="button" id="submit">Jetzt versenden</button>
    </div>
</template>

<script>
    export default {
        data() {
            return{}
        },
        mounted() {
            console.log('Component ready');
        },
        methods: {
            sendMail: function () {
                e.preventDefault();

                let self = this;

                axios.get('/api/sendWishlist/')
                    .then(function (response) {
                        console.log(response.data)
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


</style>