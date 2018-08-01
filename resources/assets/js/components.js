/**
 * Importing all Vue Components
 */

/**
 * Feather Icons
 */
Vue.component('feather-send', require('./components/icons/FeatherSend.vue'));
Vue.component('feather-plus', require('./components/icons/FeatherPlus.vue'));
Vue.component('feather-add', require('./components/icons/FeatherAdd.vue'));
Vue.component('feather-minus', require('./components/icons/FeatherMinus.vue'));
Vue.component('feather-up', require('./components/icons/FeatherUp.vue'));
Vue.component('feather-down', require('./components/icons/FeatherDown.vue'));
Vue.component('feather-edit2', require('./components/icons/FeatherEdit2.vue'));
Vue.component('feather-trash', require('./components/icons/FeatherTrash.vue'));
Vue.component('feather-book', require('./components/icons/FeatherBook.vue'));
Vue.component('feather-users', require('./components/icons/FeatherUsers.vue'));
Vue.component('feather-github', require('./components/icons/FeatherGithub.vue'));
Vue.component('feather-x', require('./components/icons/FeatherX.vue'));
Vue.component('feather-user', require('./components/icons/FeatherUser.vue'));
Vue.component('feather-user-plus', require('./components/icons/FeatherUserPlus.vue'));
Vue.component('feather-package', require('./components/icons/FeatherPackage.vue'));
Vue.component('feather-settings', require('./components/icons/FeatherSettings.vue'));
Vue.component('feather-logout', require('./components/icons/FeatherLogout.vue'));
Vue.component('feather-edit', require('./components/icons/FeatherEdit.vue'));

/**
 * Toddler-Components
 */
Vue.component('toddler-carousel', require('./components/age-specific-components/toddler-components/ToddlerCarousel.vue'));
Vue.component('toddler-character', require('./components/age-specific-components/toddler-components/ToddlerCharacter.vue'));
Vue.component('toddler-character-books', require('./components/age-specific-components/toddler-components/ToddlerCharacterBooks.vue'));
Vue.component('toddler-opt-out', require('./components/age-specific-components/toddler-components/ToddlerFooterOptOut.vue'));
Vue.component('toddler-wishlist', require('./components/age-specific-components/toddler-components/ToddlerWishlist.vue'));
Vue.component('toddler-redirect', require('./components/age-specific-components/toddler-components/ToddlerRedirectBack.vue'));
Vue.component('toddler-carousel-element', require('./components/age-specific-components/toddler-components/ToddlerCarouselElement.vue'));
Vue.component('toddler-book', require('./components/age-specific-components/toddler-components/ToddlerBook.vue'));

/**
 * Kids Components
 */
Vue.component('kids-book-preview', require('./components/age-specific-components/kid-components/KidsBookPreview.vue'));
Vue.component('kids-preview', require('./components/age-specific-components/kid-components/KidsPreviewSection.vue'));
Vue.component('kids-novelties', require('./components/age-specific-components/kid-components/KidsNovelties.vue'));
Vue.component('kids-send-wishlist', require('./components/age-specific-components/kid-components/KidsSendWishlistButton.vue'));

/**
 * Age Circle
 */
Vue.component('age-circle', require('./components/AgeCircle.vue'));
Vue.component('save-age-group', require('./components/SaveAgeGroup.vue'));

/**
 * Components, which the navigation consists of
 */
Vue.component('search', require('./components/Search.vue'));
Vue.component('mobile-search', require('./components/MobileSearch.vue'));
Vue.component('logo', require('./components/Logo.vue'));
Vue.component('login', require('./components/Login.vue'));
Vue.component('wishlist', require('./components/Wishlist.vue'));
Vue.component('cart', require('./components/Cart.vue'));
Vue.component('navigation', require('./components/Navigation.vue'));
Vue.component('category-nav', require('./components/CategoryNav.vue'));
Vue.component('mobile-logo', require('./components/age-specific-components/elderly-components/MobileLogo.vue'));

/**
 * Slider
 */
Vue.component('slider', require('./components/Slider.vue'));

/**
 * First Page -> Start/Homepage Components
 */
Vue.component('opening', require('./components/Opening.vue'));
Vue.component('manual', require('./components/Manual.vue'));
Vue.component('novelties', require('./components/Novelties.vue'));
Vue.component('novelty-preview', require('./components/NoveltyPreview.vue'));
Vue.component('authors-list', require('./components/AuthorsList.vue'));
Vue.component('author-list-entry', require('./components/AuthorListEntry.vue'));

/**
 * Carousel
 */
Vue.component('book-carousel', require('./components/BookCarousel.vue'));
Vue.component('book-carousel-product', require('./components/BookCarouselProduct.vue'));

/**
 * Footer Components
 */
Vue.component('footer-section', require('./components/FooterSection.vue'));
Vue.component('footer-icons', require('./components/FooterIcons.vue'));
Vue.component('footer-navigation', require('./components/FooterNavigation.vue'));
Vue.component('footer-bottom', require('./components/FooterBottom.vue'));

/**
 * OffCanvas Components
 */
Vue.component('hamburger-menu', require('./components/HamburgerMenu.vue'));
Vue.component('offcanvas', require('./components/OffCanvas.vue'));
Vue.component('offcanvas-close', require('./components/OffCanvasClose.vue'));

/**
 * Page Category
 */
Vue.component('filter-category', require('./components/FilterCategory.vue'));
Vue.component('book-preview', require('./components/BookPreview.vue'));
Vue.component('book-preview-section', require('./components/BookPreviewSection.vue'));

/**
 * Single Product Page
 */
Vue.component('book', require('./components/Book.vue'));

/**
 * Product in Cart
 */
Vue.component('product-cart', require('./components/ProductCart.vue'));

/**
 * Order Page
 */
Vue.component('product-order', require('./components/ProductOrder.vue'));
Vue.component('order-bill', require('./components/OrderBill.vue'));
Vue.component('order-delivery', require('./components/OrderDelivery.vue'));

/**
 * Checkout Redirect Components
 */
Vue.component('redirect-login', require('./components/RedirectToLogin.vue'));
Vue.component('redirect-registration', require('./components/RedirectToRegistration.vue'));

/**
 * Alert Success Components (can be found in admin backend, but also when customers change deliveryAddress
 * in order just as an example)
 */
Vue.component('alert-success-popup', require('./components/AlertSuccessPopup.vue'));

/**
 * Accordion
 */
Vue.component('accordion', require('./components/Accordion.vue'));

/**
 * Customer Backend Dashboard Menu
 */
Vue.component('dashboard-menu', require('./components/DashboardMenu.vue'));

/**
 * preview of orders for customers
 */
Vue.component('order-preview', require('./components/OrderPreview.vue'));

/**
 * Admin Components
 */
Vue.component('admin-order-preview', require('./components/AdminOrderPreview.vue'));
Vue.component('admin-mobile-redirect', require('./components/AdminMobileRedirect.vue'));
Vue.component('admin-dashboard-menu', require('./components/AdminDashboardMenu.vue'));

Vue.component('age-slider', require('./components/AgeSlider.vue'));
