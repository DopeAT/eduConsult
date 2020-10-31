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
        },
        login({commit, dispatch}, payload) {
            return axios.post('/login', payload).then(res => {
                if (res.status === 200) {
                    dispatch('getMe');

                    return res;
                }

                return {info: {error: true, errorMessage: 'These credentials do not match our records.'}}
            }).catch(() => {
                return {info: {error: true, errorMessage: 'These credentials do not match our records.'}}
            })
        },
        register({commit, dispatch}, payload) {
            return axios.post('/register', payload).then(res => {
                if (res.status === 200) {
                    dispatch('getMe');

                    return res;
                }

                return {info: {error: true, errorMessage: 'Something went wrong. Please try again later.'}}
            }).catch(() => {
                return {info: {error: true, errorMessage: 'Something went wrong. Please try again later.'}}
            })
        },
        checkUserEmail(context, payload) {
            return axios.post('/api/checkUserEmail', {email: payload}).then(res => {
                if (res && res.data) {
                    return {info: {error: false, data: {count: res.data.length}}}
                }
                return {info: {error: false}, data: {count: 0}}
            }).catch(err => {
                return {info: {error: false}, data: {count: 0}}
            })
        }
    }
}
