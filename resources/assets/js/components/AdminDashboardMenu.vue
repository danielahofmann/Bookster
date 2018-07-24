<template>
    <div class="cell small-12 medium-6 large-4">
        <div class="welcome-user">
            <p class="dashboard-initial">
                {{first}}{{scnd}}
            </p>
            <div class="welcome-text">
                <p class="dashboard-regular">Hallo,</p>
                <p class="dashboard-bold">{{user.firstname}} {{user.lastname}}</p>
            </div>
        </div>
        <div class="dashboard-menu display-mobile-none" :class="{ 'border-left' : overview }">
            <a class="dashboard-link grid-x flex-center" :href="route('admin.dashboard')">
                <div class="cell small-2 flex-center">
                    <feather-user></feather-user>
                </div>
                <p class="dashboard-regular cell small-10">Meine Angaben</p>
            </a>
        </div>
        <div class="dashboard-menu">
            <a class="dashboard-link grid-x flex-center" :class="{ 'border-left' : orders }" :href="route('admin.orders')">
                <div class="cell small-2 flex-center">
                    <feather-package></feather-package>
                </div>
                <p class="dashboard-regular cell small-10">Bestellungen</p>
            </a>

            <a class="dashboard-link grid-x flex-center" :class="{ 'border-left' : products }" :href="route('admin.products')">
                <div class="cell small-2 flex-center">
                    <feather-book></feather-book>
                </div>
                <p class="dashboard-regular cell small-10">Produkte</p>
            </a>

            <a class="dashboard-link grid-x flex-center" :class="{ 'border-left' : authors }" :href="route('admin.authors')">
                <div class="cell small-2 flex-center">
                    <feather-user></feather-user>
                </div>
                <p class="dashboard-regular cell small-10">Autoren</p>
            </a>

            <a class="dashboard-link grid-x flex-center" :class="{ 'border-left' : characters }" :href="route('admin.characters')">
                <div class="cell small-2 flex-center">
                    <feather-user></feather-user>
                </div>
                <p class="dashboard-regular cell small-10">Charaktere</p>
            </a>

            <a class="dashboard-link grid-x flex-center" :class="{ 'border-left' : users }" :href="route('admin.users')">
                <div class="cell small-2 flex-center">
                    <feather-users></feather-users>
                </div>
                <p class="dashboard-regular cell small-10">Mitarbeiter</p>
            </a>
        </div>
        <div class="dashboard-menu logout">
            <a class="dashboard-link grid-x flex-center" :href="route('admin.logout')" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <div class="cell small-2 flex-center">
                    <feather-logout></feather-logout>
                </div>
                <p class="dashboard-regular cell small-10">Abmelden</p>
            </a>

            <form id="logout-form" :action="route('admin.logout')" method="POST" style="display: none;">
                <input type="hidden" name="_token" :value="csrf">
            </form>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                user: this.userData,
                first: this.firstchar,
                scnd: this.scndchar,
                overview: this.overviewTemplate,
                orders: this.orderView,
                users: this.userView,
                products: this.productView,
                authors: this.authorView,
                characters: this.characterView,
                csrf: this.token
            }
        },
        mounted() {},
        props: ['userData', 'firstchar', 'scndchar', 'overviewTemplate', 'orderView', 'userView', 'token', 'productView', 'authorView', 'characterView']
    }
</script>

<style lang="scss" scoped>
    @import '~@/app.scss';
    .welcome-user{
        background: $white;
        padding: 3rem 2rem;
        position: relative;
        margin-bottom: 0.5rem;

        @include custom-max(639px){
            padding: 2rem;
        }

        .welcome-text{
            padding-left: 4rem;

            @include custom-max(639px){
                text-align: center;
                padding: 2rem 0 0 0;
            }
        }
    }

    .dashboard-bold{
        @include text-styling($primary-font, $bold, 1rem);
        color: $dark-grey;
        margin: 0;
    }

    .dashboard-initial{
        @include text-styling($primary-font, $bold, 1.5rem);
        color: $white;
        margin: 0;
        background: $dark-grey;
        border-radius: 50%;
        line-height: 1.5;
        height: 80px;
        padding: 1.5rem;
        position: absolute;
        left: -20px;
        top: 50%;
        transform: translateY(-50%);

        @include custom-max(1215px){
            left: 0;
        }

        @include custom-max(639px){
            left: 50%;
            transform: translateX(-50%);
            top: -35px;
        }
    }

    .dashboard-regular{
        @include text-styling($primary-font, $regular, 1rem);
        color: $dark-grey;
        margin: 0;
    }

    .dashboard-menu {
        background-color: $white;
        margin-bottom: 0.5rem;

        svg {
            width: 20px;
            height: auto;
        }
    }

    .border-left{
        border-left: 2px solid $blue;
    }

    .display-inline-block{
        display: inline-block;
    }

    .dashboard-link{
        div{
            padding: 1.5rem 0;
        }

        p{
            padding: 1.5rem 0 1.5rem 1rem;
            border-bottom: thin solid $beige;
        }
    }

    .dashboard-image{
        @include custom-max(639px){
            height: 35vh;
            width: 100%;
            object-fit: cover;
            object-position: 0 0;
        }
    }

</style>