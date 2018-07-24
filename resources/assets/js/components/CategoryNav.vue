<template>
    <div class="cell" v-show="isActive">
        <nav class="category-navigation grid-x align-center">
            <ul class="category-navigation-list">
                <li v-for="category in categories" class="category">
                    <a :href="route(path, category.id)" :style="{ fontSize: fontSize }" >{{ category.name }}</a>
                </li>
            </ul>
        </nav>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                active: this.isActive,
                categories: null,
                fontSize: this.size + "rem",
                path: this.href,
            }
        },
        created(){
            axios
                .get('/api/getCategories')
                .then(response => (
                    this.categories = response.data))
                .catch(function (error) {
                     console.log(error);
                });
        },
        mounted() {},
        props: ['size', 'isActive', 'href'],

    }
</script>

<style lang="scss" scoped>
    @import '~@/app.scss';

    .category-navigation {
        background: $beige;
        border-bottom: 2px solid white;

        .category-navigation-list {
            margin-bottom: 0;
            .category {
                list-style-type: none;
                display: inline-block;
                padding: 1rem;
                @include text-styling($primary-font, $regular, 1rem)
                color: $dark-grey;

                &:hover {
                    font-weight: $bold;
                    cursor: pointer;
                }

                a {
                    color: $dark-grey;
                }
            }
        }
    }
</style>