<template>
    <div class="grid-x carousel-container flex-center">
        <carousel :navigationEnabled="true" :perPage="3" :autoplay="true" :loop="true" :navigateTo="1" :autoplayTimeout="5000" class="carousel cell small-11">
            <slide v-for="bestseller in bestsellers" :key="bestseller.id">
                <book-carousel-product
                        :bookTitle="bestseller.name"
                        :authorFirstname="bestseller.author.firstname"
                        :authorLastname="bestseller.author.lastname"
                        :price="bestseller.price"
                        :img="bestseller.image[0].img"
                        :sizeTitle="1.5"
                        :sizeAuthor="1"
                        :sizePrice="1"
                ></book-carousel-product>
            </slide>
        </carousel>

    </div>
</template>

<script>
    export default {
        data() {
            return {
                bestsellers: null,

            }
        },
        mounted () {
            document.getElementsByClassName("VueCarousel-navigation-next")[0].innerHTML = "";
            document.getElementsByClassName("VueCarousel-navigation-prev")[0].innerHTML = "";
            },
        methods: {

        },
        created(){
            axios
                .get('/api/getNewBestsellers')
                .then(response => (
                    this.bestsellers = response.data))
                .catch(function (error) {
                    console.log(error);
                });
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

    .carousel{
        margin: 40px auto;
    }

    // [TODO] fix navigation arrow alignment

</style>

