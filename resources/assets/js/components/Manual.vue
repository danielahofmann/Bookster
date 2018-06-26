<template>
    <div class="manual clearfix">
        <h2>So geht's</h2>
        <div class="grid-x flex-center">
            <div class="cell small-12 medium-3">
                <img src="/img/cake.png" alt="">
                <h3 :style="{ fontSize: fontSizeHeadline }">Alter angeben</h3>
                <p :style="{ fontSize: fontSizeText }">Beim Öffnen der Website einfach Ihr Alter angeben.</p>
            </div>
            <div class="cell small-12 medium-3">
                <img src="/img/books.png" alt="">
                <h3 :style="{ fontSize: fontSizeHeadline }">Bücher aussuchen</h3>
                <p :style="{ fontSize: fontSizeText }">Die altersgerechte Darstellung des Shops hilft Ihnen dabei besonders</p>
            </div>
            <div class="cell small-12 medium-3">
                <img src="/img/package.png" alt="">
                <h3 :style="{ fontSize: fontSizeHeadline }">Freuen und genießen</h3>
                <p :style="{ fontSize: fontSizeText }">Ihre Bücher werden direkt zu Ihnen nach Hause geliefert</p>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                fontSizeHeadline: this.sizeHeadline + "rem",
                fontSizeText: this.sizeText + "rem",
            }
        },
        mounted() {},
        props: ['sizeHeadline', 'sizeText'],
    }
</script>

<style lang="scss" scoped>
    @import '~@/app.scss';

    .manual {
        background-color: $beige;
        padding-bottom: 75px;
        img {
            height: 60px;
            width: auto;
            @include margin-left;
            margin-top: 40px;
        }

        p {
            padding: 0 1rem;
            @include text-styling($secondary-font, $regular, 1rem);
            color: $dark-grey;
            text-align: center;
        }
    }
</style>