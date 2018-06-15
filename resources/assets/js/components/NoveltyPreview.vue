<template>
    <div class="grid-x flex-center">
        <div class="cell small-11 product-container grid-x">
            <div class="product-image cell small-4 medium-4 large-5">
                <img :src="img" alt="Produktbild">
            </div>
            <div class="product-details cell small-8 medium-8 large-7">
                <p class="title" v-bind:style="{ fontSize: fontSizeTitle }">{{ bookTitle }}</p>
                <p class="author" v-bind:style="{ fontSize: fontSizeAuthor }">{{ authorFirstname }} {{ authorLastname }}</p>
                <p class="price" v-bind:style="{ fontSize: fontSizePrice }">{{ price }} €</p>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                fontSizeTitle: this.sizeTitle + "rem",
                fontSizeAuthor: this.sizeAuthor + "rem",
                fontSizePrice: this.sizePrice + "rem",
            }
        },
        mounted() {
            console.log('Component ready');
        },
        props: ['bookTitle', 'price', 'authorFirstname', 'authorLastname', 'sizeTitle', 'sizeAuthor', 'sizePrice', 'img'],

    }
</script>

<style lang="scss" scoped>
    @import '~@/app.scss';
    //[TODO] add hover styling


    .product-container{
        margin-bottom: 1rem;
        .product-image{
            overflow: hidden;

            img{
                object-fit: contain;
            }
        }

        .product-details{
            padding-left: 20px;

            @include tablet{
                padding-top: 20px;
            }

            .title{
                @include text-styling($primary-font, $bold, 1rem);
                color: $dark-grey;
                hyphens: auto;
                margin: 0;

                @include tablet{
                    @include text-styling($primary-font, $bold, 1rem);

                }

            }

            .author{
                @include text-styling($secondary-font, $regular, 1rem);
                color: $dark-grey;
                hyphens: auto;


            }

            .price{
                @include text-styling($secondary-font, $semibold, 1rem);
                color: $dark-grey;

            }
        }
    }

</style>