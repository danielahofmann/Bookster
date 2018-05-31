<template>
    <div class="opening">
        <h2 :style="{ fontSizeHeadline: fontSizeHeadline }">Willkommen bei Bookster</h2>
        <p :style="{ fontSizeText: fontSizeText }">
            Wir legen nicht nur Wert auf hochwertige Literatur, sondern auch darauf, dass wir unseren Nutzern das bestmögliche Erlebnis bieten.
        </p>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                fontSizeHeadline: this.size + "rem",
                fontSizeText: this.sizeText + "rem",
            }
        },
        mounted() {
            console.log('Component ready');
        },
        props: ['size', 'sizeText'],
    }
</script>

<style lang="scss" scoped>
    @import '~@/app.scss';

    h2{
        @include text-styling($primary-font, $bold, 1.5rem);
        text-align: center;
        margin-top: 40px;
        color: $dark-grey;
    }

    p{
        @include text-styling($secondary-font, $regular, 1rem);
        @include margin-left;
        text-align: center;
        margin-bottom: 40px;
        color: $dark-grey;
        width: 700px;
    }
</style>