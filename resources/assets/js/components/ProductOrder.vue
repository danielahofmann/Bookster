<template>
    <div class="order-product grid-x">
        <img :src="this.img" :alt="this.title" class="cell small-4 image">
        <div class="cell small-8 text">
            <p class="title" :style="{ fontSize: fontSize }">{{ this.title }}</p>
            <p class="author" :style="{ fontSize: fontSizeSmall }">{{ this.author }}</p>
            <p class="price" :style="{ fontSize: fontSizeSmall }">{{ this.price }} €</p>
            <p class="quantity" :style="{ fontSize: fontSizeSmall }">Anzahl: {{ this.quantity }}</p>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                bookId: this.id,
                fontSize: this.size + "rem",
                fontSizeSmall: this.size - 0.2 + "rem",
            }
        },
        mounted() {
        },
        methods: {},
        props: ['title', 'author', 'price', 'quantity', 'img', 'id', 'size']
    }
</script>

<style lang="scss" scoped>
    @import '~@/app.scss';

    .order-product{
        margin: 1rem;
        padding: 1rem 0;
        border-bottom: thin solid $beige;

        .image{
            height: 125px;
            object-fit: contain;
        }

        .title{
            @include text-styling($primary-font, $bold, 1rem);
            color: $dark-grey;
        }

        .author{
            @include text-styling($primary-font, $regular, 1rem);
            color: $dark-grey;
        }

        .price{
            @include text-styling($secondary-font, $bold, 1rem);
            color: $dark-grey;
        }

        .quantity-control{
            margin-top: 1.5rem;
            .control{
                @include text-styling($primary-font, $bold, 1.2rem);
                color: $light-grey;
            }

            .quantity{
                @include text-styling($primary-font, $bold, 1rem);
                color: $dark-grey;
                margin-bottom: 0.45rem;
                padding-left: 0.4rem;

            }
        }

        .text{
            padding: 0 1rem;
        }

        .delete{
            text-align: center;
            @include text-styling($primary-font, $light, 0.75rem);
            color: $light-grey;
            margin: 1rem 0 0 0;

            &:hover{
                color: $dark-grey;
            }
        }
    }

</style>