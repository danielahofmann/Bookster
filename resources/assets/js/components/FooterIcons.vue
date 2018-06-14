<template>
    <div class="footer-icons grid-x">
        <ul>
            <li>
                <a href="http://www.facebook.de" class="facebook"></a>
            </li>
            <li>
                <a href="http://www.google.de" class="google"></a>
            </li>
            <li>
                <a href="http://www.twitter.de" class="twitter"></a>
            </li>
            <li>
                <a href="http://www.instagram.com" class="instagram"></a>
            </li>

            <li>|</li>

            <li>
                <a href="http://www.klarna.de" class="klarna"></a>
            </li>
            <li>
                <a href="http://www.paypal.com" class="paypal"></a>
            </li>
            <li>
                <a href="http://www.google.de" class="visa"></a>
            </li>
            <li>
                <a href="http://www.google.de" class="amex"></a>
            </li>
            <li>
                <a href="http://www.google.de" class="mastercard"></a>
            </li>
        </ul>
    </div>
</template>

<script>
    // TODO: links

    export default {
        data() {
            return {}
        },
        mounted() {
            console.log('Component ready');
        },
    }
</script>

<style lang="scss" scoped>
    @import '~@/app.scss';

    .footer-icons{
        padding: 1rem 0;
        border-top: thin solid $beige;
        ul{
            list-style-type: none;
            margin: 0;
            margin-left: 50%;
            transform: translateX(-50%);

            li{
                float: left;
                margin: 0 0.75rem;

                @include text-styling($primary-font, $regular, 1.5rem);
                color: $beige;
            }
        }
    }

    .facebook{
        @include footer-icon-social('/img/facebook.svg');
    }

    .google{
        @include footer-icon-social('/img/google.svg');
    }

    .twitter{
        @include footer-icon-social('/img/twitter.svg');
    }

    .instagram{
        @include footer-icon-social('/img/instagram.svg');
    }

    .klarna{
        @include footer-icon('/img/klarna.svg');
    }

    .paypal{
        @include footer-icon('/img/paypal.svg');
    }

    .amex{
        @include footer-icon('/img/amex.svg');
    }

    .visa{
        @include footer-icon('/img/visa.svg');
    }

    .mastercard{
        @include footer-icon('/img/mastercard.svg');
    }


</style>