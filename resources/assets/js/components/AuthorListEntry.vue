<template>
    <a :href="route(path, this.id)" class="author-list-entry">
        <img :src="img" alt="Bild des Autoren" class="author-image">
        <p v-bind:style="{ fontSize: fontSize }" class="author-name">{{firstname}} {{lastname}}</p>
    </a>
</template>

<script>
    export default {
        data() {
            return {
                fontSize: this.size + "rem",
            }
        },
        computed: {
            ageGroup() {
                return this.$store.state.ageGroup;
            },

            path() {
                return this.$store.state.ageGroup + '-author';
            },
        },
        mounted() {},
        props: ['firstname', 'lastname', 'size', 'img', 'id'],

    }
</script>

<style lang="scss" scoped>
    @import '~@/app.scss';

    .author-list-entry {
        margin-bottom: 1rem;
        .author-image {
            display: inline-block;
            height: 40px;
            width: 40px;
            border-radius: 100%;
        }

        .author-name {
            display: inline-block;
            margin: 0 0 0 1rem;
            @include text-styling($primary-font, $bold, 1rem);
            color: $dark-grey;
            hyphens: auto;
        }

        &:hover{
            .author-name {
                color: $black;
            }
        }
    }

</style>