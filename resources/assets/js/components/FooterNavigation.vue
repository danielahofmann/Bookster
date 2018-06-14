<template>
    <div class="footer-nav grid-x flex-center">
        <div class="cell small-8 grid-x">
            <ul class="cell small-4 footer-list">
                <li class="footer-headline">
                    Hilfe und Informationen
                </li>
                <li>
                    <a href="#">Hilfe</a>
                </li>
                <li>
                    <a href="#">Lieferung</a>
                </li>
                <li>
                    <a href="#">Rücksendung</a>
                </li>
                <li>
                    <a href="#">Bestellung</a>
                </li>
            </ul>

            <ul class="cell small-4 footer-list">
                <li class="footer-headline">
                    Mehr über bookster
                </li>
                <li>
                    <a href="#">Über uns</a>
                </li>
                <li>
                    <a href="#">Karriere bei bookster</a>
                </li>
                <li>
                    <a href="#">Kontakt</a>
                </li>
            </ul>

            <ul class="cell small-4 footer-list">
                <li class="footer-headline">
                    Kategorien
                </li>
                <li v-for="category in categories">
                    <a :href="category.url">{{category.name}}</a>
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                categories: null,
            }
        },
        mounted() {
            console.log('ready');
        },
        created(){
            axios
                .get('/api/getCategories')
                .then(response => (
                    this.categories = response.data))
                .catch(function (error) {
                    console.log(error);
                });
        }
    }
</script>

<style lang="scss" scoped>
    @import '~@/app.scss';

    .footer-list{
        margin-left: 0;

        li{
            list-style-type: none;
            a{
                @include text-styling($secondary-font, $regular, 14px);
                color: $dark-grey;
                &:hover{
                  font-weight: $bold;
                }
            }
        }

        .footer-headline{
            @include text-styling($primary-font, $bold, 15px);
            color: $dark-grey;
            margin-bottom: 0.5rem;

        }
    }

    .footer-nav{
        background: $beige;
        padding: 2rem 1rem
    }


</style>