import Vue from  'vue';
import Vuex from 'vuex';

Vue.use(Vuex);


import CustomerDetails from "./order/CustomerDetails";
import OrderDetails from "./order/OrderDetails";
import OrderLevels from "./order/Levels"
import Services from "./order/Services"

import VuexPersistence from "vuex-persist";

const vuexLocal = new VuexPersistence({
    key: 'store-data',
    storage: window.localStorage,
    modules: [
        'CustomerDetails',
        'OrderLevels',
        'OrderDetails',
        'Services'
    ]
})

export default new Vuex.Store({
    modules: {
        OrderDetails,
        OrderLevels,
        CustomerDetails,
        Services
    },
    plugins: [vuexLocal.plugin],
    strict: true
})

