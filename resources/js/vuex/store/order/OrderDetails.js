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
        }
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
        }
    },
    mutations: {
        updateOrder: (state, payload) => {
            state.order = Object.assign({}, state.order, payload);
        },
        setTotal: (state, payload) => {
            let total = parseFloat(payload.total);

            if(parseInt(state.order.delivery) === 1) {
                total += 100;
            }
            state.order.total = total;
        }
    },
    actions: {
        updateOrder({commit, dispatch}, payload) {
            commit('updateOrder', payload);
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
