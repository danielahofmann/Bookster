<template>
    <div class="dot">
        <p>
            {{age}}
        </p>
    </div>
</template>

<script>
    export default {
        name: "age-circle",
        data(){
            return {

            }

        },
        props: ['age']
    }
</script>

<style lang="scss" scoped>
    .dot {
        height: 150px;
        width: 150px;
        background-color: maroon;
        border-radius: 50%;
        position: relative;

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