<template>
    <div class="">
        <carousel :navigationEnabled="true" :perPage="3" class="carousel">
            <slide>
                <div>
                    <a href="#">hallo</a>
                    <p>preis</p>
                </div>
            </slide>
            <slide>
                <div>

                    <a href="#">hallo</a>
                    <p>preis</p>
                </div>            </slide>
            <slide>
                <div>

                    <a href="#">hallo</a>
                    <p>preis</p>
                </div>            </slide>
            <slide>
                <div>

                    <a href="#">hallo</a>
                    <p>preis</p>
                </div>
            </slide>
        </carousel>
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
        methods: {},

    }

</script>

<style lang="scss" scoped>
    @import '~@/app.scss';

    .VueCarousel-slide {
        position: relative;
        background: #42b983;
        color: #fff;
        font-family: Arial;
        font-size: 24px;
        text-align: center;
        min-height: 100px;
    }

    .label {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    .carousel{
        width: 60%;
    }

</style>

