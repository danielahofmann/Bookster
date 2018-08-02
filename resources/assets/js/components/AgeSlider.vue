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
                    width: 10,
                    height: 300,
                    dotSize: 22,
                    eventType: "auto",
                    min: 0,
                    max: 99,
                    interval: 1,
                    disabled: false,
                    show: true,
                    tooltip: "always",
                    tooltipDir: "top",
                    piecewise: true,
                    data: [
                        "Bitte wählen",
                        "0-7",
                        "8-12",
                        "13-18",
                        "19-50",
                        "51-65",
                        "66-99",
                    ],
                    style: {
                        "display": "inline-block",
                    },
                    class: "star-slider",
                    direction: "vertical",
                    speed: 0.5,
                    processStyle: {
                        "backgroundColor": "#5886F4"
                    },
                    bgStyle: {
                        "backgroundColor": "#EAE7E5",
                    },
                    tooltipStyle:
                    {
                        "backgroundColor": "#5886F4",
                        "borderColor": "#5886F4"
                    },
                    lazy: true
                }
            }
        },
        watch: {
            value: function (value) {
                if(value != "Bitte wählen") {
                    axios.get('/api/saveAgeToSession', {
                        params: {
                            age: value
                        }
                    })
                        .then(function (response) {
                            console.log(response.data)
                            window.location = route(response.data.ageGroup + '-home');
                        })
                        .catch(function (error) {
                            console.log(error);
                        });
                }
            },
        }
    }
</script>