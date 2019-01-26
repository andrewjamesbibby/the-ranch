window._ = require('lodash');
window.axios = require('axios');

let token = document.head.querySelector('meta[name="csrf-token"]');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;

import Vue from 'vue'

// Set up router
import VueRouter from 'vue-router'
Vue.use(VueRouter)

// Import global mixins
import Loading from './mixins/loading';
Vue.mixin(Loading);

// Import vuex store
import store from './store';


// Entry point component
import App from './views/App'

// Global components.
Vue.component('main-layout', require('./views/layouts/mainLayout.vue').default);


// Router
const router = new VueRouter({
   // mode: 'history',
    linkActiveClass: 'is-active',
    routes: [
        { path: '/', redirect: '/readers/list' },
        { path: '/readers/list', component: require('./views/readers/list.vue').default },
        { path: '/readers/find', component: require('./views/readers/find.vue').default },
        { path: '/readers/create', component: require('./views/readers/create.vue').default },
        { path: '/readers/update', component: require('./views/readers/update.vue').default },
        { path: '/readers/delete', component: require('./views/readers/delete.vue').default },
    ],
});

const app = new Vue({
    el: '#app',
    components: { App },
    router,
    store,
});