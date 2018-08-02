<template>
    <div>
        <transition name="slide-fade">
            <p v-if="show" class="alert-popup alert-success">{{this.status}}</p>
        </transition>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                show: true,
            }
        },
        mounted() {
            this.timeout();
        },
        methods: {
          timeout: function () {
              self = this;
              setTimeout(function(){self.show = false;}, 3000);
          }
        },
        props: ['status']
    }
</script>

<style lang="scss" scoped>
    @import '~@/app.scss';
    .slide-fade-enter-active {
        transition: all 0.5s ease;
    }
    .slide-fade-leave-active {
        transition: all 1s cubic-bezier(1.0, 0.5, 0.8, 1.0);
    }
    .slide-fade-enter, .slide-fade-leave-to {
        transform: translateX(-10px);
        opacity: 0;
    }

    .alert-popup{
        z-index: 10;
        bottom: 25px;
        right: 15px;
        position: fixed;
        padding: 1rem;
        background-color: rgba(188, 196, 244, 0.5);
        border-radius: 5px;
        border: thin solid $light-blue;
    }

    .alert-success{
        @include text-styling($primary-font, $bold, 1rem);
        color: $blue;
        margin: 0;
    }
</style>