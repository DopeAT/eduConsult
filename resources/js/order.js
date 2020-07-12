window.Vue = require('vue');
window.IS_LOGGED = IS_AUTHENTICATED;
window.axios = require('axios');

import store from './vuex/store'

Vue.component('order', require('./components/order/Order.vue').default);



const app = new Vue({
    el: '#app',
    store
});

$(function () {
    $('[data-toggle="tooltip"]').tooltip()
})
