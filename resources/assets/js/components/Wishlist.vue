<template>
    <div class="wishlist">
        <a href="/wishlist/" :class="{ true : wishlist, false : wishlistInverse }"></a>
    </div>
</template>

<script>
    export default {
        data: function() {
            return{}
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

                    self.$store.commit('setQuantityWishlist', quantity);
                })
                .catch(function (error) {
                    console.log(error);
                });
        },
        computed: {
            wishlist(){
                return this.$store.state.wishlist;
            },
            quantity(){
                return this.$store.state.wishlistQuantity;
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

    .wishlist {
        display: inline-block;
        .false {
            @include nav-icons ('/img/wishlist.png');
            background-size: 28px 25px;
        }

        .true {
            @include nav-icons ('/img/wishlist-true.png');
            background-size: 28px 25px;
        }
    }

</style>