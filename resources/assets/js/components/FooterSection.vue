<template>
    <div class="footer">
        <footer-icons v-if="show"></footer-icons>
        <footer-navigation v-if="show"
            :age="this.ageGroup"
        ></footer-navigation>
        <toddler-opt-out v-if="toddler"></toddler-opt-out>
        <footer-bottom></footer-bottom>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                toddler: this.isToddler,
                show: !this.isToddler,
            }
        },
        props: ['isToddler', 'ageGroup']
    }
</script>

<style lang="scss" scoped></style>