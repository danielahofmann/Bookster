<template>
    <div class="off-canvas position-left" id="offCanvas" data-off-canvas>
        <div v-if="showCategories">
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
                        <a :href="path + category.url" v-bind:style="{ fontSize: fontSize }" @click="clickCategory(category)">{{ category.name }}</a>
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
        </div>

        <div v-if="showGenre">
            <nav class="navigation">
                <ul class="navigation-list grid-x">
                    <li class="small-2 genre-tab">
                        <button class="back-arrow" @click="switchBackCategory"></button>
                    </li>
                    <li class="genre-tab small-10" v-bind:style="{ fontSize: fontSize }">{{clickedCategory}}</li>
                </ul>
            </nav>

            <nav class="category-navigation grid-x">
                <ul class="category-navigation-list small-12">
                    <li v-for="genre in genres" class="category">
                        <a :href="path + genre.url" v-bind:style="{ fontSize: fontSize }" @click="">{{genre.genre}}</a>
                    </li>
                </ul>
            </nav>
        </div>

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
                tabId: 1,
                categories: null,
                path: window.location.pathname,
                showCategories: true,
                showGenre: false,
                clickedCategory: null,
                genres: null,
                fontSize: this.size + "rem",
            }
        },
        mounted() {
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
            },
            clickCategory: function(category){
                event.preventDefault();

                axios
                    .get('/api/getGenres/' + category.id)
                    .then(response => (
                        this.genres = response.data))
                    .catch(function (error) {
                        console.log(error);
                    });

                this.showCategories = false;
                this.showGenre = true;
                this.clickedCategory = category.name;
            },
            switchBackCategory: function(){
                this.showCategories = true;
                this.showGenre = false;
                this.clickedCategory = null;
            }
        },
        props: ['size'],
    }
</script>

<style lang="scss" scoped>
    @import '~@/app.scss';

    .off-canvas {
        background-color: $white;
        border: thin solid $beige;
        z-index: 200;
        width: 350px;

        @include custom-max(400px) {
            width: 250px;
        }

        @include custom-min(1024px) {
            display: none;
        }
    }

    .position-left {
        width: 350px;
        -webkit-transform: translateX(-350px);
        transform: translateX(-350px);

        @include custom-max(400px) {
            width: 250px;
            -webkit-transform: translateX(-250px);
            transform: translateX(-250px);
        }
    }

    .tab {
        text-align: center;
        padding-left: 0;
    }

    ul {
        list-style-type: none;
        margin: 0;

        li {
            @include text-styling($primary-font, $regular, 1rem);
            color: $dark-grey;
            padding: 15px 0;
            border: thin solid $beige;
            padding-left: 1rem;

            a {
                @include text-styling($primary-font, $regular, 1rem);
                color: $dark-grey;

                &:hover {
                    font-weight: $regular;
                    color: $dark-grey;
                }
            }
        }
    }

    .sub-nav-tab {
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

                &:first-child {
                    padding-left: 1rem;
                }

                a {
                    @include text-styling($primary-font, $bold, 0.75rem);
                    color: $light-grey;
                    padding: 0;
                }
            }
        }

        p {
            @include text-styling($primary-font, $regular, 0.75rem);
            color: $light-grey;
            text-align: center;
            margin-bottom: 0;
            padding-bottom: 1rem;
        }
    }

    .active {
        font-weight: $bold;
    }

    .footer-bottom {
        position: absolute;
        bottom: 0;
        width: 100%;
    }

    .genre-tab {
        border: none;
        border-bottom: thin solid $beige;
        font-size: 1.2rem;
        font-weight: $bold;
        padding-left: 1.5rem;
    }

    .back-arrow {
        @include nav-icons ('/img/arrow-back.svg');
        margin-top: 5px;
        cursor: pointer;
    }

    button:focus {
        outline: 0;
    }
</style>