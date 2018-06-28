<template>
    <div class="toddler-wishlist">
        <a href="/wishlist/" class="toddler-wishlist-icon" :class="{ true : wishlist, false : wishlistInverse }"></a>
    </div>
</template>

<script>
    export default {
        data() {
            return {}
        },
        mounted() {
            var self = this;

            axios
                .get('/api/getWishlistQuantity/')
                .then(function (response) {
                    const quantity = response.data;

                    if(quantity > 0){
                        self.$store.commit('newWishlistItem', quantity);
                    }

                    self.$store.commit('setQuantity', quantity);
                })
                .catch(function (error) {
                    console.log(error);
                });
        },
        computed: {
            wishlist(){
                return this.$store.state.wishlist;
            },
            wishlistInverse(){
                if (this.$store.state.wishlist === true){
                    return false;
                }else{
                    return true;
                }
            }
        }
    }
</script>

<style lang="scss" scoped>
    @import '~@/app.scss';

    .toddler-wishlist {
        display: inline-block;
        .toddler-wishlist-icon {
            display: block;
            height: 40px;
            width: 40px;
            padding-right: 5rem;
            margin-bottom: 15px;

            &:hover{
                background: url(/img/wishlist-add-kids.svg) no-repeat;
                background-size: 40px 40px;
            }

            @include custom-max(640px){
                margin-bottom: 0;
            }
        }

        .false {
            background: url(/img/toddler-wishlist.svg) no-repeat;
            background-size: 40px 40px;
        }

        .true {
            background: url(/img/wishlist-true-kids.svg) no-repeat;
            background-size: 40px 40px;
        }
    }
</style>