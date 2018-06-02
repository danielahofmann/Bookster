<template>
    <div class="grid-x carousel-container flex-center">
        <carousel :navigationEnabled="true" :perPage="3" class="carousel cell small-11">
            <slide>
                <book-carousel-product></book-carousel-product>
            </slide>
            <slide>
                <book-carousel-product></book-carousel-product>
            </slide>
            <slide>
                <book-carousel-product></book-carousel-product>
            </slide>
            <slide>
                <book-carousel-product></book-carousel-product>
            </slide>
        </carousel>

    </div>
</template>

<script>
    export default {
        data() {
            return {}
        },
        mounted () {
            document.getElementsByClassName("VueCarousel-navigation-next")[0].innerHTML = "";

            document.getElementsByClassName("VueCarousel-navigation-prev")[0].innerHTML = "";
            },
        methods: {
            emptyButtonsForCustomization(){
                document.getElementsByClassName("VueCarousel-navigation-next")[0].innerHTML = "";

                document.getElementsByClassName("VueCarousel-navigation-prev")[0].innerHTML = "";
            }
        },

    }

</script>

<style lang="scss">
    @import '~@/app.scss';

    .VueCarousel-navigation-button {
        &.VueCarousel-navigation-prev {
            &:before {
                content: url('/img/arrow-left.svg');
                position: absolute;
                top: 0;
                right: 0;
                width: 54px;
                height: 54px;
            }
            &:hover {
                &:before {
                    content: url('/img/arrow-left.svg');
                }
            }
        }
        &.VueCarousel-navigation-next {
            content: '';
            &:before {
                content: url('/img/arrow-right.svg');
                position: absolute;
                top: 0;
                right: 0;
                width: 54px;
                height: 54px;
            }
            &:hover {
                &:before {
                    content: url('/img/arrow-right.svg');
                }
            }
        }
    }

</style>

