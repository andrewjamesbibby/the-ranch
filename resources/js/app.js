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
import Filtered from './mixins/filteredForm';
Vue.mixin(Loading);
Vue.mixin(Toast);
Vue.mixin(Filtered);

// Import vuex store
import store from './store';

// Entry point component
import App from './views/App'

// Global components.
Vue.component('main-layout', require('./views/layouts/mainLayout.vue').default);

// Router
const router = new VueRouter({
    mode: 'history',
    linkActiveClass: 'is-active',
    saveScrollPosition: true,
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

        { path: '/reader-logins/list', component: require('./views/logins/list.vue').default },
        { path: '/reader-logins/find', component: require('./views/logins/find.vue').default },

        { path: '/publications/list', component: require('./views/publications/list.vue').default },
        { path: '/publications/find', component: require('./views/publications/find.vue').default },

        { path: '/subscriptions/list', component: require('./views/subscriptions/list.vue').default },
        { path: '/subscriptions/find', component: require('./views/subscriptions/find.vue').default },

        { path: '/subscription-periods/list', component: require('./views/subscriptionPeriods/list.vue').default },
        { path: '/subscription-periods/find', component: require('./views/subscriptionPeriods/find.vue').default },
        { path: '/subscription-periods/create', component: require('./views/subscriptionPeriods/create.vue').default },
        { path: '/subscription-periods/update', component: require('./views/subscriptionPeriods/update.vue').default },
        { path: '/subscription-periods/delete', component: require('./views/subscriptionPeriods/delete.vue').default },

        { path: '/history', component: require('./views/History.vue').default },
    ],
});

const app = new Vue({
    el: '#app',
    components: { App },
    router,
    store,
});