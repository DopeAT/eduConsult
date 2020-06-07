export default {
    namespaced: true,
    state: {
        order: {
            academic_level: 'student',
            product: 'personal_statement',
            level: 'ucas',
            type_of_service: 'new',
            additional_services: [],
            delivery: '7',
        }
    },
    getters: {
        getOrder(state) {
            return state.order
        },
        getDeliveryDate(state) {
            return state.order.delivery
        }
    },
    mutations: {
        updateOrder: (state, payload) => {
            state.order = Object.assign({}, state.order, payload);
        },
    },
    actions: {

    }
}
