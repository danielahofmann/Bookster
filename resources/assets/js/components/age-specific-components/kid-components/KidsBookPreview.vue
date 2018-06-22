<template>
    <div class="grid-x flex-center kid-preview">
        <div class="cell small-11">
            <img :src="img" alt="Produktbild" class="kid-image">
            <button class="wish-button"></button>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {

            }
        },
        mounted() {
            console.log('Component ready');
        },
        props: ['bookId', 'img'],
    }
</script>

<style lang="scss" scoped>
    @import '~@/app.scss';

    .kid-preview{
        margin-bottom: 2rem;
        position: relative;

        .wish-button{
            display: block;
            background: url(/img/wishlist-add-kids.svg) no-repeat;
            background-size: 40px 40px;
            height: 40px;
            width: 40px;
            cursor: pointer;
            position: absolute;
            top: 5%;
            right: 10%;
            z-index: 1;
            transition: background 0.2s ease-in;

            &:hover{
                background: url(/img/wishlist-add-kids-hover.svg) no-repeat;
                background-size: 40px 40px;
                height: 40px;
                width: 40px;
            }
        }

        .kid-image{
            &:hover{
                -webkit-box-shadow: 0px 0px 15px -4px rgba(97,97,97,1);
                -moz-box-shadow: 0px 0px 15px -4px rgba(97,97,97,1);
                box-shadow: 0px 0px 15px -4px rgba(97,97,97,1);
            }
        }
    }

</style>