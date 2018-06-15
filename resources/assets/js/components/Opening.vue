<template>
    <div class="opening grid-x">
        <h2 :style="{ fontSize: fontSizeHeadline }" class="small-12">Willkommen bei Bookster</h2>
        <p :style="{ fontSize: fontSizeText }" class="small-12">
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

    p{
        @include text-styling($secondary-font, $regular, 1rem);
        @include margin-left;
        text-align: center;
        margin-bottom: 75px;
        color: $dark-grey;
        width: 700px;
    }
</style>