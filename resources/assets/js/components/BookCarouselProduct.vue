<template>
    <div class="grid-x flex-center">
        <div class="cell small-11 product-container grid-x">
            <div class="product-image cell small-5">
                <img src="/img/cover.png" alt="Produktbild">
            </div>
            <div class="product-details cell small-7">
                <p class="title">Das rote Kleid</p>
                <p class="author">Guido Maria Kretschmar</p>
                <p class="price">10,99 €</p>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {}
        },
        mounted() {
            console.log('product ready');
        },
    }
</script>

<style lang="scss" scoped>
    @import '~@/app.scss';

    .product-container{
        background-color: $beige;
        border-radius: 15px;
        padding: 40px 25px;

        .product-image{
            //height: 230px;
            //width: 150px;
            overflow: hidden;

            img{
                object-fit: contain;
            }
        }

        .product-details{
            padding-left: 20px;

            .title{
                @include text-styling($primary-font, $bold, 1.5rem)
            }

            .author{
                @include text-styling($secondary-font, $regular, 1rem)
            }

            .price{
                @include text-styling($secondary-font, $semibold, 1rem)
            }
        }
    }

</style>