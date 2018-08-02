<template>
    <div class="dot" @click="$emit('choose', chosenAge)">
        <p>
            {{age}} Jahre
        </p>
    </div>
</template>

<script>
    export default {
        name: "age-circle",
        data(){
            return {
                chosenAge: this.age,
            }

        },
        props: ['age'],

    }
</script>

<style lang="scss" scoped>
    @import "../../sass/app.scss";

    .dot {
        height: 150px;
        width: 150px;
        background-color: $blue;
        border-radius: 50%;
        position: relative;
        display: inline-block;

        &:hover{
            background-color: $magenta;
        }

        p{
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            color: white;
            font-size: 1.5rem;
        }
    }
</style>