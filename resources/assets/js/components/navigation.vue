<template>
    <div class="cell">
        <nav class="navigation">
            <ul class="navigation-list">
                <li v-for="tab in tabs" class="tab" v-bind:style="{ fontSize: fontSize }" @click="categoryActive = !categoryActive">
                    {{ tab.tab }}
                </li>
            </ul>
        </nav>

        <category-nav
            :size="categoryFontSize"
            :is-active="categoryActive"
        ></category-nav>

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
                fontSize: this.size + "rem",
                categoryFontSize: this.size,
            }
        },
        mounted() {
            console.log('Navigation ready');
        },
        props: ['isActive', 'size'],
        // props: {
        //     isActive: {
        //         type: Boolean
        //     }
        // }
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