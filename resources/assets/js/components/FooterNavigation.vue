<template>
    <div class="footer-nav grid-x flex-center">
        <div class="cell small-8 grid-x">
            <ul class="cell small-4 footer-list" v-if="notKids">
                <li class="footer-headline">
                    Informationen
                </li>
                <li>
                    <a :href="route(help)">Hilfe</a>
                </li>
                <li>
                    <a :href="route(delivery)">Lieferung</a>
                </li>
                <li>
                    <a :href="route(retoure)">Rücksendung</a>
                </li>
                <li>
                    <a :href="route(order)">Bestellung</a>
                </li>
                <li>
                    <a :href="route(payment)">Zahlung</a>
                </li>
            </ul>

            <ul class="cell small-4 footer-list" v-if="notKids">
                <li class="footer-headline">
                    Mehr über bookster
                </li>
                <li>
                    <a :href="route(about)">Über uns</a>
                </li>
                <li>
                    <a :href="route(contact)">Kontakt</a>
                </li>
            </ul>

            <ul class="cell small-4 footer-list">
                <li class="footer-headline">
                    Kategorien
                </li>
                <li v-for="category in categories">
                    <a :href="route(categoryRoute, category.id)">{{category.name}}</a>
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
                help: this.age + '-help',
                order: this.age + '-help-order',
                delivery: this.age + '-help-delivery',
                payment: this.age + '-help-payment',
                retoure: this.age + '-help-retoure',
                about: this.age + '-about',
                contact: this.age + '-contact',
                categoryRoute: this.age + '-category',
                notKids: this.show,
            }
        },
        mounted() {},
        created(){
            axios
                .get('/api/getCategories')
                .then(response => (
                    this.categories = response.data))
                .catch(function (error) {
                    console.log(error);
                });
        },

        props: ['age', 'show']
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
        padding: 2rem 1rem;

        @include phone{
            display: none;
        }
    }


</style>