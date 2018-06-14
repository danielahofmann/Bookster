<template>
    <div class="footer-bottom grid-x">
        <p class="copyright cell small-9">© 2018 bookster</p>
        <ul>
            <li>
                <a href="#">Datenschutz</a>
            </li>
            <li>|</li>
            <li>
                <a href="#">Impressum</a>
            </li>
            <li>|</li>
            <li>
                <a href="#">AGB</a>
            </li>
        </ul>
    </div>
</template>

<script>
    export default {
        data() {
            return {}
        },
        mounted() {
            console.log('Component ready');
        },
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
        }

        ul{
            list-style-type: none;
            margin: 0;

            li{
                float: left;
                @include text-styling($primary-font, $regular, 1rem);
                color: $light-grey;
                padding: 0 0.5rem;

                a{
                    @include text-styling($primary-font, $regular, 1rem);
                    color: $light-grey;
                }

            }
        }
    }

</style>