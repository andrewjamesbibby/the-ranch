import Vue from 'vue';
import Vuex from 'Vuex';

Vue.use(Vuex);

const store = new Vuex.Store({
    strict: true,
    state: {
        credentials : {
            modal : false,
            key : '',
            secret : '',
        },
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
        },
        setKey(state, value) {
            this.state.credentials.key = value;
        },
        setSecret(state, value) {
            this.state.credentials.secret = value;
        },
        toggleCredentialsModal(state, value) {
            this.state.credentials.modal = value;
        },
    }
});

export default store;