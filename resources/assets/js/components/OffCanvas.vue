<template>
    <div class="off-canvas position-left" id="offCanvas" data-off-canvas>
        <nav class="navigation">
            <ul class="navigation-list grid-x">
                <li v-for="tab in tabs"
                    class="tab small-6"
                    :class="{ active : tab.id == tabId }"
                    v-bind:style="{ fontSize: fontSize }"
                    @click="toggleActive(tab.id)">
                    {{ tab.tab }}
                </li>
            </ul>
        </nav>

        <nav class="category-navigation grid-x">
            <ul class="category-navigation-list small-12">
                <li v-for="category in categories" class="category">
                    <a :href="path + category.url" v-bind:style="{ fontSize: fontSize }">{{ category.name }}</a>
                </li>
            </ul>
        </nav>

        <nav>
            <ul>
                <li class="sub-nav-tab">
                    <a :href="path + '#'" v-bind:style="{ fontSize: fontSize }">Mein Konto</a>
                </li>
                <li class="sub-nav-tab">
                    <a :href="path + '#'" v-bind:style="{ fontSize: fontSize }">Hilfe & Informationen</a>
                </li>
                <li class="sub-nav-tab">
                    <a :href="path + '#'" v-bind:style="{ fontSize: fontSize }">Mehr über bookster</a>
                </li>
            </ul>
        </nav>

        <div class="footer">
            <ul class="offcanvas-footer">
                <li>
                    <a :href="path + '#'">Datenschutz</a>
                </li>
                <li>
                    |
                </li>
                <li>
                    <a :href="path + '#'">AGB</a>
                </li>
                <li>
                    |
                </li>
                <li>
                    <a :href="path + '#'">Impressum</a>
                </li>
            </ul>

            <p>© 2018 bookster</p>
        </div>
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
                tabId: null,
                categories: null,
                path: window.location.pathname,
            }
        },
        mounted() {
            console.log('offc ready');
            axios
                .get('/api/getCategories')
                .then(response => (
                    this.categories = response.data))
                .catch(function (error) {
                    console.log(error);
                });
        },
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

    .off-canvas{
        background-color: $white;
        border: thin solid $beige;
        z-index: 200;
        width: 350px;

        @include custom-max(400px){
            width: 250px;
        }

        @include custom(1024px){
            display: none;
        }
    }

    .position-left {
        width: 350px;
        -webkit-transform: translateX(-350px);
        transform: translateX(-350px);

        @include custom-max(400px){
            width: 250px;
            -webkit-transform: translateX(-250px);
            transform: translateX(-250px);
        }
    }

    .navigation{

        .navigation-list{

            .tab {
                text-align: center;
            }
        }
    }

    ul{
        list-style-type: none;
        margin: 0;

        li{
            @include text-styling($primary-font, $regular, 1rem);
            color: $dark-grey;
            padding: 15px 0;
            border: thin solid $beige;
            a{
                @include text-styling($primary-font, $regular, 1rem);
                color: $dark-grey;
                padding-left: 1rem;

                &:hover{
                    font-weight: $bold;
                }
            }
        }
    }

    .sub-nav-tab{
        background: $beige;
        border-bottom: thin solid $white;

    }

    .footer {
        background-color: $dark-beige;

        .offcanvas-footer {
            background-color: $dark-beige;
            padding-top: 1rem;

            li {
                display: inline-block;
                border: none;
                @include text-styling($primary-font, $bold, 0.75rem);
                color: $light-grey;

                padding: 0 5px;

                &:first-child{
                    padding-left: 1rem;
                }

                a {
                    @include text-styling($primary-font, $bold, 0.75rem);
                    color: $light-grey;
                    padding: 0;
                }

            }
        }

        p{
            @include text-styling($primary-font, $regular, 0.75rem);
            color: $light-grey;
            text-align: center;
            margin-bottom: 0;
            padding-bottom: 1rem;
        }
    }


</style>