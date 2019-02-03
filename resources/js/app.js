window._ = require('lodash');
window.axios = require('axios');
window.moment = require('moment');


let token = document.head.querySelector('meta[name="csrf-token"]');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;

import Vue from 'vue'

// Set up Notifications
import Toasted from 'vue-toasted';
Vue.use(Toasted, {
    theme: "toasted-primary",
    position: "bottom-center",
    duration : 2000
});

// Set up router
import VueRouter from 'vue-router'
Vue.use(VueRouter)

// Import global mixins
import Loading from './mixins/loading';
import Toast from './mixins/toast';
Vue.mixin(Loading);
Vue.mixin(Toast);

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

        { path: '/editions/list', component: require('./views/editions/list.vue').default },
        { path: '/editions/find', component: require('./views/editions/find.vue').default },

        { path: '/permissions/list', component: require('./views/permissions/list.vue').default },
        { path: '/permissions/find', component: require('./views/permissions/find.vue').default },
        { path: '/permissions/create', component: require('./views/permissions/create.vue').default },
        { path: '/permissions/update', component: require('./views/permissions/update.vue').default },
        { path: '/permissions/delete', component: require('./views/permissions/delete.vue').default },

        { path: '/history', component: require('./views/History.vue').default },
    ],
});

const app = new Vue({
    el: '#app',
    components: { App },
    router,
    store,
});