<template>
    <div class="grid-x carousel-container flex-center">
        <carousel :navigationEnabled="true" :perPage="perPage" :paginationEnabled="paginationEnabled" :autoplay="true" :loop="true" :navigateTo="1" :autoplayTimeout="5000" class="carousel cell small-11">
            <slide v-for="bestseller in bestsellers" :key="bestseller.id">
                <book-carousel-product
                        :bookTitle="bestseller.name"
                        :authorFirstname="bestseller.author.firstname"
                        :authorLastname="bestseller.author.lastname"
                        :price="bestseller.price"
                        :img="bestseller.image[0].img"
                        :desktopTitle="1.2"
                        :tabletTitle="1.25"
                        :mobileTitle="1.25"
                        :desktopAuthor="1"
                        :tabletAuthor="1"
                        :mobileAuthor="1"
                        :desktopPrice="1"
                        :tabletPrice="1"
                        :mobilePrice="1"
                        :id="bestseller.id"
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
                perPage: 3,
                windowWidth: null,
                paginationEnabled: true,
                kids: this.booksForKids,
            }
        },
        mounted () {
            document.getElementsByClassName("VueCarousel-navigation-next")[0].innerHTML = "";
            document.getElementsByClassName("VueCarousel-navigation-prev")[0].innerHTML = "";

            window.addEventListener('resize', this.setFontSizes);

            this.setFontSizes();
        },
        methods: {
            setFontSizes: function() {
                this.windowWidth = document.documentElement.clientWidth;

                if (this.windowWidth > 1024){
                    this.perPage = 3;
                }

                if (this.windowWidth < 1024){
                    this.perPage = 2;
                }

                if (this.windowWidth < 700){
                    this.perPage = 1;
                    this.paginationEnabled = false;
                }

                if (this.windowWidth > 700){
                    this.paginationEnabled = true;
                }
            },
        },
        created(){
            if(this.kids == true){
                axios
                    .get('/api/getNewBestsellersForKids')
                    .then(response => (
                        this.bestsellers = response.data))
                    .catch(function (error) {
                        console.log(error);
                    });
            }else{
                axios
                    .get('/api/getNewBestsellers')
                    .then(response => (
                        this.bestsellers = response.data))
                    .catch(function (error) {
                        console.log(error);
                    });
            }
        },
        beforeDestroy() {
            window.removeEventListener('resize', this.setFontSizes);
        },
        props: ['booksForKids']

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

                @include custom-max(410px){
                    top: -10%;
                }
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

                @include custom-max(410px){
                    top: -10%;
                }
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

</style>

