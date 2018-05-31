<template>
    <div class="image-slider clearfix">
        <a @click="prev" class="prev"></a>
        <a @click="next" class="next"></a>
        <transition-group name='slide' tag='div' class="relative">
            <div v-for="number in [currentNumber]" :key='number'>
                <img :src="currentImage"
                     v-on:mouseover="stopRotation"
                     v-on:mouseout="startRotation"
                />
                <section class="slider-text">
                    <p class="subline">{{ currentSubline }}</p>
                    <p class="headline">{{ currentHeadline }}</p>
                </section>
            </div>
        </transition-group>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                images: ['/img/slide_1.png', '/img/slide_2.png'],
                currentNumber: 0,
                timer: null,
                headlines: ['Der Skandal der Skandale', 'Garden Flowers in Colour'],
                sublines: ['Manfred Lütz', 'Blandford']
            }
        },
        mounted() {
            this.startRotation();
        },
        methods: {
            startRotation: function() {
                this.timer = setInterval(this.next, 5000);
            },

            stopRotation: function() {
                clearTimeout(this.timer);
                this.timer = null;
            },

            next: function() {
                this.currentNumber += 1
            },

            prev: function() {
                this.currentNumber -= 1
            }
        },
        computed: {
            currentImage: function () {
                return this.images[Math.abs(this.currentNumber) % this.images.length];
            },
            currentHeadline: function () {
                return this.headlines[Math.abs(this.currentNumber) % this.headlines.length];
            },
            currentSubline: function () {
                return this.sublines[Math.abs(this.currentNumber) % this.sublines.length];
            }
        }
    }
</script>

<style lang="scss" scoped>
    @import '~@/app.scss';
    .relative{
        position: relative;
        width: 100%;
        min-height: 100%;
    }

    .slide-leave-active,
    .slide-enter-active {
        transition: 1s;
    }
    .slide-enter {
        transform: translate(100%, 0);
    }
    .slide-leave-to {
        transform: translate(-100%, 0);
    }

    .image-slider{
        width: 100%;
        height: 70vh;
        overflow: hidden;
        position: relative;
        img{
            position: absolute;
            min-height: 100%;
            width: 100%;
            object-fit: cover;
            object-position: 50% 50%;
        }

        a{
            position: absolute;
            z-index: 1;
        }

        .prev{
            @include background-image('/img/arrow-left.svg', 35px, 35px);
            @include top-center;
        }

        .next{
            @include background-image('/img/arrow-right.svg', 35px, 35px);
            right: 0;
            @include top-center;

        }

        .slider-text {
            position: absolute;
            z-index: 1;
            top: 500px;
            left: 50px;
            .headline {
                @include text-styling($primary-font, $bold, 2rem);
                color: $dark-grey;

            }

            .subline {
                @include text-styling($primary-font, $regular, 1.5rem);
                color: $dark-grey;
                margin-bottom: 0;
            }
        }
    }

</style>