<template>
    <div class="">
        <h2 class="cell small-12">Autoren</h2>
        <p v-for="author in authors">{{author}}</p>
    </div>
</template>

<script>
    // [TODO] implement click logic for opening author with products

    export default {
        data() {
            return {
                authors: null,
            }
        },
        mounted() {
        },
        created() {
            axios
                    .get('/api/getAuthors')
                .then(response => (
                    this.authors = response.data))
                .catch(function (error) {
                    console.log(error);
                });
        },
    }
</script>

<style lang="scss" scoped>
    @import '~@/app.scss';

    h2{
        text-align: left;
        margin-bottom: 40px;
    }
</style>