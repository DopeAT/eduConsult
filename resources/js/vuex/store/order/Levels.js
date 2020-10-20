export default {
    namespaced: true,
    state: {
        levels: []
    },
    getters: {
        get: (state) => {
            return state.levels;
        }
    },
    mutations: {
        set: (state, payload) => {
            state.levels = payload;
        }
    },
    actions: {
        getLevels({commit}) {
            axios.get('/api/orders/levels').then(res => {
                if(res.status !== 200) return;

                commit('set', res.data);

                return res;
            })
        }
    }
}
