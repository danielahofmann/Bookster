<template>
    <div class="author-list-entry">
        <img :src="img" alt="Bild des Autoren" class="author-image">
        <p v-bind:style="{ fontSize: fontSize }" class="author-name">{{firstname}} {{lastname}}</p>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                fontSize: this.size + "rem"
            }
        },
        mounted() {},
        props: ['firstname', 'lastname', 'size', 'img'],

    }
</script>

<style lang="scss" scoped>
    @import '~@/app.scss';

    //[TODO] add hover styling

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
            hyphens: auto;
        }
    }

</style>