export default {
    namespaced: true,
    state: {
        order: {
            academic_level: 1,
            product: 1,
            level: 1,
            type_of_service: 1,
            additional_services: [],
            delivery: 5,
            total: null,
        },
        discount: null
    },
    getters: {
        getOrder(state) {
            return state.order
        },
        getDeliveryDate(state) {
            return state.order.delivery
        },
        getTotal(state) {
            return state.order.total
        },
        getDiscount(state) {
            return state.discount
        }
    },
    mutations: {
        updateOrder: (state, payload) => {
            state.order = Object.assign({}, state.order, payload);
        },
        setTotal: (state, payload) => {
            let total = parseFloat(payload.total);

            if (parseInt(state.order.delivery) === 1) {
                total += 100;
            }

            if (state.discount) {
                let discountValue = state.discount / 100;
                total = total - (total * discountValue)
            }

            state.order.total = +total.toFixed(2);
        },
        setDiscount: (state, payload) => {
            state.discount = payload
        }
    },
    actions: {
        updateOrder({commit, dispatch}, payload) {
            commit('updateOrder', payload);
        },
        fetchDiscountRate({commit, dispatch, getters}, payload) {
            axios.post('/api/orders/get-discount', payload).then(res => {
                if(res.status !== 200) return

                if(res.data && res.data.id) {
                    commit('setDiscount', res.data.value)

                    dispatch('fetchTotal', getters.getOrder.additional_services);
                }

                return res;
            })
        },
        fetchTotal({commit, getters, rootGetters}, addServices) {
            let payload = getters['getOrder'];
            let rates = 0;

            let services = rootGetters['Services/getAdditionalServices'];

            if (addServices.length) {
                addServices.forEach(id => {

                    let servicesArray = services.filter(service => service.id === id);

                    rates += parseInt(servicesArray[0].rates[0].total);
                })
            }

            if(payload.product == 2) {
                commit('setTotal', {
                    total: rates
                })

                return;
            }

            axios.post('/api/orders/order-total', payload).then(res => {
                if(res.status !== 200) return;

                res.data.total = parseInt(res.data.total) + parseInt(rates);

                commit('setTotal', res.data);

                return res;
            })
        }
    }
}
