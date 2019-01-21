import Vue from 'vue';
import Vuex from 'Vuex';

Vue.use(Vuex);

const store = new Vuex.Store({
    state: {
        loading: false,
        lastRequest: {
            raw : null,
            statusCode : null,
            body : null,
        },
    },
    getters: {
    },
    mutations: {
        startLoading() {
            this.state.loading = true;
        },
        stopLoading() {
            this.state.loading = false;
        },
        setResponse(state, response) {
           this.state.lastRequest = response;
        }
    }
});

export default store;