<template>
    <div class="grid-x carousel-container flex-center">
        <carousel :navigationEnabled="true" :perPage="perPage" :paginationEnabled="false" :autoplay="true" :loop="true" :navigateTo="1" :autoplayTimeout="8000" class="carousel cell small-9 medium-10 large-11">
            <slide v-for="character in characters" :key="character.id">
                <toddler-carousel-element
                        :img="character.character_image.img"
                        :character="character.id"
                ></toddler-carousel-element>
            </slide>
        </carousel>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                perPage: 5,
                characters: null,

            }
        },
        created() {
            axios
                .get('/api/getCharacters')
                .then(response => (
                    console.log(response.data),
                    this.characters = response.data))
                .catch(function (error) {
                    console.log(error);
                });
        },
        mounted() {
            document.getElementsByClassName("VueCarousel-navigation-next")[0].innerHTML = '<img src="/img/arrow-right-toddler.svg" class="slider-navigation-image">';
            document.getElementsByClassName("VueCarousel-navigation-prev")[0].innerHTML = '<img src="/img/arrow-left-toddler.svg" class="slider-navigation-image">';

            window.addEventListener('resize', this.setPerPage);

            this.setPerPage();
        },
        methods: {
            setPerPage: function() {
                this.windowWidth = document.documentElement.clientWidth;

                if (this.windowWidth > 1024){
                    this.perPage = 5;
                }

                if (this.windowWidth < 1024){
                    this.perPage = 4;
                }

                if (this.windowWidth < 850){
                    this.perPage = 3;
                }

                if (this.windowWidth < 650){
                    this.perPage = 2;
                }
            },
        },
        beforeDestroy() {
            window.removeEventListener('resize', this.setFontSizes);
        },
    }
</script>

<style lang="scss" scoped>
    @import '~@/app.scss';

    .carousel-container{
        margin: 100px 0;
        width: 100%;
        overflow: hidden;

        @include custom-max(640px){
            margin-top: 160px;
        }
    }

</style>