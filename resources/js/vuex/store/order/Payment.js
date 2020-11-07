export default {
    namespaced: true,
    state: {
        order: null,
        payment: null
    },
    getters: {
        getOrder(state) {
            return state.order
        },
        getPayment(state) {
            return state.payment
        },
    },
    mutations: {
        setOrder: (state, payload) => {
            state.order = payload
        },
        setPayment: (state, payload) => {
            state.payment = payload
        },
    },
    actions: {
        updateOrder({commit, dispatch}, payload) {
            commit('setOrder', payload);
        },
        updatePayment({commit, dispatch}, payload) {
            commit('setPayment', payload);
        },
        createInvoice({}, payload) {
            return axios.post('/api/service/order-pdf', payload).then(res => {
                if (res.status !== 200) {
                    alert('Something went wrong. Please try again later.');
                }
            })
        }
    }
}
