<template>
    <div class="footer-bottom grid-x">
        <p class="copyright cell small-4 medium-6 large-8">© 2018 bookster</p>
        <ul>
            <li>
                <a :href="route(age + '-privacy')">Datenschutz</a>
            </li>
            <li>|</li>
            <li>
                <a :href="route(age + '-imprint')">Impressum</a>
            </li>
            <li>|</li>
            <li>
                <a :href="route(age + '-agb')">AGB</a>
            </li>
        </ul>
    </div>
</template>

<script>
    export default {
        data() {
            return {}
        },
        props: ['age']
    }

    // [TODO] HREFS
</script>

<style lang="scss" scoped>
    @import '~@/app.scss';

    .footer-bottom{
        background: $dark-beige;
        padding: 0.75rem 0;

        .copyright{
            @include text-styling($primary-font, $light, 1rem);
            color: $light-grey;
            margin-bottom: 0;
            padding-left: 2.5rem;

            @include phone {
                @include text-styling($primary-font, $regular, 0.75rem);
                padding-left: 1rem;
            }
        }

        ul{
            list-style-type: none;
            margin: 0;

            li{
                float: left;
                @include text-styling($primary-font, $regular, 1rem);
                color: $light-grey;
                padding: 0 0.5rem;

                @include phone {
                    @include text-styling($primary-font, $regular, 0.75rem);
                    padding: 0 0.25rem;
                }

                a{
                    @include text-styling($primary-font, $regular, 1rem);
                    color: $light-grey;

                    @include phone {
                        @include text-styling($primary-font, $regular, 0.75rem);
                    }
                }

            }
        }
    }

</style>