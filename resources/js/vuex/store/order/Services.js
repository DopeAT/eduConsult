export default {
    namespaced: true,
    state: {
        additionalServices: []
    },
    getters: {
        getAdditionalServices: (state) => {
            return state.additionalServices;
        }
    },
    mutations: {
        setAdditionalServices: (state, payload) => {
            state.additionalServices = payload;
        }
    },
    actions: {
        getAdditionalServices({commit}) {
            axios.get('/api/orders/additional-services').then(res => {
                if(res.status !== 200) return;

                commit('setAdditionalServices', res.data);

                return res;
            })
        }
    }
}
