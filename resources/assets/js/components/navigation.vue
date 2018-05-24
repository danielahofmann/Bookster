<template>
    <div class="cell">
        <nav class="navigation">
            <ul class="navigation-list">
                <li v-for="tab in tabs" class="tab" v-bind:style="{ fontSize: fontSize }">
                    {{ tab.tab }}
                </li>
            </ul>
        </nav>


    </div>
</template>

<script>
    export default {
        data() {
            return {
                tabs: [
                    { tab: 'Bücher' },
                    { tab: 'ebooks'}
                ],
                categoryActive: this.isActive,
                fontSize: this.size,
            }
        },
        mounted() {
            console.log('Navigation ready');
        },
        props: ['isActive', 'size'],
    }
</script>

<style lang="scss" scoped>
    @import '~@/app.scss';

    .navigation{
        .navigation-list{
            .tab{
                list-style-type: none;
                display: inline-block;
                padding: 0 1rem;
                @include text-styling($primary-font, $regular, 1rem)

                &:hover{
                    font-weight: $bold;
                    cursor: pointer;
                }
            }
        }
    }


</style>