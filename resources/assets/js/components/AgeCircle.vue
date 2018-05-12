<template>
    <div>
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

<style scoped>
    div{
        background-color: #0c3d5d;
        height:200px;
        width: 200px;
    }
</style>