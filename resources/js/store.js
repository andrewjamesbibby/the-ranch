import Vue from 'vue';
import Vuex from 'Vuex';

Vue.use(Vuex);

const store = new Vuex.Store({
    state: {
        lastRequest: '',
    },
    getters: {
    },
    mutations: {
        setResponse(state, response) {
           this.state.lastRequest = response;
        }
    }
});

export default store;