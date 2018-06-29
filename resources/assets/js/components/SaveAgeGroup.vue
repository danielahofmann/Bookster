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
            }
        },
        props:['group']
    }
</script>

<style lang="scss" scoped></style>