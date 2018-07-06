<template>
    <div class="toddler-redirect small-6 medium-4">
        <a v-if="show" class="toddler-redirect-icon" :href="route('toddlers-home')"></a>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                show: true,
                url: this.resource,
            }
        },
        mounted() {
            if ((window.location.href).split("/")[4] != '') {
                this.show = true;
            } else {
                this.show = false;
            }
        },
        props: ['resource'],
        methods: {
            redirectBack: function(){
                window.location = this.resource;
            }
        }
    }

    // TODO redirect back functionality
</script>

<style lang="scss" scoped>
    @import '~@/app.scss';

    .toddler-redirect{
        .toddler-redirect-icon{
            display: block;
            background: url(/img/redirect-toddler.svg) no-repeat;
            background-size: 40px 40px;
            height: 40px;
            width: 40px;
            margin-left: 3rem;
            margin-bottom: 15px;

            &:hover{
                background: url(/img/redirect-hover-toddler.svg) no-repeat;
                background-size: 40px 40px;
            }

            @include custom-max(640px){
                margin-bottom: 0;
            }
        }
    }
</style>