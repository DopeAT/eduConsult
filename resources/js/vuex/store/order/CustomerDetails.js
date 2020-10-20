export default {
    namespaced: true,
    state: {
        currentUser: null
    },
    getters: {
        getCurrentUser: (state) => {
            return state.currentUser;
        }
    },
    mutations: {
        setCurrentUser: (state, payload) => {
            state.currentUser = payload;
        }
    },
    actions: {
        getMe({commit}) {
            axios.get('/api/user/me').then(res => {

                if(res.status !== 200) return;

                commit('setCurrentUser', {
                    id: res.data.id,
                    firstname: res.data.firstname,
                    lastname: res.data.lastname,
                    email: res.data.email,
                    phone: res.data.phone,
                });

                return res;
            })
        }
    }
}
