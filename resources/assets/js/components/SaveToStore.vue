<template>
    <div class=""></div>
</template>

<script>
    export default {
        data() {
            return {
                ageGroup: this.group
            }
        },
        mounted() {
            const path = window.location.pathname;
            var search = path.search(this.ageGroup);

            if(search === 1){
                this.$store.commit('setProductRoute', this.ageGroup);
                this.$store.commit('setAgeGroup', this.ageGroup);
                this.$store.commit('setCharacterImageAsset', this.assetCharacter);
                this.$store.commit('setAuthorImageAsset', this.assetAuthor);
                this.$store.commit('setProductImageAsset', this.assetProduct);
            }
        },
        props:['group', 'assetCharacter', 'assetAuthor', 'assetProduct']
    }
</script>

<style lang="scss" scoped></style>