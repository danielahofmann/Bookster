<template>
    <div class="grid-x flex-center character-image">
        <img :src="characterImage + character.character_image.img" :alt="character.name" class="small-4 medium-3 large-2">
    </div>
</template>

<script>
    export default {
        data() {
            return {
                character: this.thisCharacter,
            }
        },
        computed: {
            characterImage() {
                return this.$store.state.characterImage;
            },
        },
        props:['thisCharacter']
    }
</script>

<style lang="scss" scoped>
    @import '~@/app.scss';

    .character-image{
        img{
            border-radius: 50%;
            margin-bottom: 50px;

            @include custom-max(1023px){
                margin-top: 50px;
            }
        }
    }

</style>