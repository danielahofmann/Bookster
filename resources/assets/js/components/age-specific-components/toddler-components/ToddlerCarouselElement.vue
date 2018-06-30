<template>
    <div class="grid-x flex-center">
        <a :href="route('toddlers-character', characterId)">
            <div class="cell small-11 image-container flex-center">
                <img :src="img" alt="Charakter">
            </div>
        </a>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                characterId: this.character,
            }
        },
        mounted() {},
        props:['img', 'character']
    }
</script>

<style lang="scss" scoped>
    @import '~@/app.scss';

    .image-container{
        img{
            border-radius: 50%;
            height: 175px;
            width: 175px;
            object-fit: cover;

            @include custom-max(450px){
                height: 115px;
                width: 115px;
            }

            &:hover{
                -webkit-box-shadow: 0px 0px 15px -4px rgba(97,97,97,1);
                -moz-box-shadow: 0px 0px 15px -4px rgba(97,97,97,1);
                box-shadow: 0px 0px 15px -4px rgba(97,97,97,1);
            }
        }
    }
</style>