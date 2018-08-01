<template>
    <div>
        <vue-slider ref="slider" v-model="value"
                    v-bind="options"
        ></vue-slider>
    </div>
</template>
<script>
    import vueSlider from 'vue-slider-component'

    export default {
        components: {
            vueSlider
        },
        name: 'slider',
        data() {
            return {
                value: 0,
                options: {
                    width: 4,
                    height: 300,
                    dotSize: 22,
                    eventType: "auto",
                    min: 0,
                    max: 100,
                    interval: 1,
                    disabled: false,
                    show: true,
                    tooltip: "always",
                    piecewise: false,
                    style: {
                        "display": "inline-block",
                        "marginLeft": "30px"
                    },
                    class: "star-slider",
                    direction: "vertical",
                    speed: 0.5,
                    processStyle: {
                        "backgroundColor": "#999"
                    }
                }
            }
        },
    }
</script>