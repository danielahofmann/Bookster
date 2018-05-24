<template>
    <div class="cell">
        <nav class="navigation">
            <ul class="navigation-list">
                <li v-for="tab in tabs"
                    class="tab"
                    :class="{ active : tab.id == tabId }"
                    v-bind:style="{ fontSize: fontSize }"
                    @click="toggleActive(tab.id)">
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
                    {
                        tab: 'Bücher',
                        id: 1
                    },
                    {
                        tab: 'ebooks',
                        id: 2
                    }
                ],
                categoryActive: this.isActive,
                fontSize: this.size + "rem",
                categoryFontSize: this.size,
                tabId: null,
            }
        },
        mounted() {
            console.log('Navigation ready');
        },
        props: ['isActive', 'size'],
        methods: {
            toggleActive: function(id){
                this.tabId = id;
                this.categoryActive = !this.categoryActive;
            }
        }
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

            .active{
                font-weight: $bold;
            }
        }
    }

</style>