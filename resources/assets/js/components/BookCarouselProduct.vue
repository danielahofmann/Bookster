<template>
    <div class="grid-x flex-center">
        <div class="cell small-11 product-container grid-x">
            <div class="product-image cell small-5">
                <img :src="img" alt="Produktbild">
            </div>
            <div class="product-details cell small-7">
                <p class="title" v-bind:style="{ fontSize: fontSizeTitle }">{{ bookTitle }}</p>
                <p class="author" v-bind:style="{ fontSize: fontSizeAuthor }">{{ authorFirstname }} {{ authorLastname }}</p>
                <p class="price" v-bind:style="{ fontSize: fontSizePrice }">{{ price }} €</p>
            </div>
        </div>
    </div>
</template>

<script>
    // [TODO] implement click logic for opening product site
    export default {
        data() {
            return {
                fontSizeTitle: this.sizeTitle + "rem",
                fontSizeAuthor: this.sizeAuthor + "rem",
                fontSizePrice: this.sizePrice + "rem",
            }
        },
        mounted() {

        },
        props: ['bookTitle', 'price', 'authorFirstname', 'authorLastname', 'sizeTitle', 'sizeAuthor', 'sizePrice', 'img'],
    }
</script>

<style lang="scss" scoped>
    @import '~@/app.scss';

    .product-container{
        background-color: $beige;
        border-radius: 15px;
        padding: 40px 25px;

        .product-image{
            overflow: hidden;

            img{
                object-fit: contain;
            }
        }

        .product-details{
            padding-left: 20px;

            .title{
                @include text-styling($primary-font, $bold, 1.5rem);
                @include custom(1300px){
                    margin-top: 2rem;

                }
                color: $dark-grey;
            }

            .author{
                @include text-styling($secondary-font, $regular, 1rem);
                color: $dark-grey;

            }

            .price{
                @include text-styling($secondary-font, $semibold, 1rem);
                @include custom(1300px){
                    margin-top: 2rem;

                }
                color: $dark-grey;

            }
        }
    }

</style>