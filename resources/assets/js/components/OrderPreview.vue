<template>
    <div class="order-preview grid-x">
        <p class="cell small-12 medium-12 large-4 status">{{this.state}}</p>
        <div class="cell small-6 medium-6 large-4 ">
            <p class="text-lightgrey">Best.-Nr.:</p>
            <p>{{this.id}}</p>
        </div>
        <div class="cell small-6 medium-6 large-4">
            <p class="text-lightgrey">Bestelldatum:</p>
            <p>{{this.date}}</p>
        </div>
        <div class="cell small-12 flex-center">
            <a class="button button-outline" href="">Details anzeigen</a>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {}
        },
        mounted() {},
        props: ['state', 'date', 'id']
    }
</script>

<style lang="scss" scoped>
    @import '~@/app.scss';

    .order-preview{
        padding: 1rem 3rem;
        background: $white;
        margin-bottom: 1rem;
    }

    .status{
        @include text-styling($primary-font, $bold, 1rem);
        color: $dark-grey;
    }

    .text-lightgrey{
        @include text-styling($primary-font, $regular, 0.9rem);
        color: $light-grey;
        margin: 0;
    }

    .button-outline{
        background-color: $white;
        border: thin solid $blue;
        color: $blue;
        font-weight: $bold;
        font-size: 0.9rem;
        margin-top: 1rem;

        &:hover{
            background-color: $blue;
            color: $white;
            font-weight: $bold;
        }
    }

</style>