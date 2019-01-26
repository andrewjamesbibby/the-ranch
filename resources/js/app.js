window._ = require('lodash');
window.axios = require('axios');

let token = document.head.querySelector('meta[name="csrf-token"]');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;


import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

import store from './store';





import App from './views/App'
import Home from './views/Home'

import Readers from './views/Readers'
import ListReaders from './views/readers/list'
import FindReader from './views/readers/find'
import CreateReader from './views/readers/create'
import UpdateReader from './views/readers/update'
import DeleteReader from './views/readers/delete'

import Editions from './views/Editions'
import ListEditions from './views/editions/list'
import FindEdition from './views/editions/find'


import Permissions from './views/Permissions'
import ReaderLogins from './views/ReaderLogins'
import Publications from './views/Publications'
import Subscriptions from './views/Subscriptions'
import SubscriptionPeriods from './views/SubscriptionPeriods'
import Devices from './views/Devices'
import Authentication from './views/Authentication'
import SSOTokens from './views/SSOTokens'
import TargetedNotifications from './views/TargetedNotifications'
import History from './views/History'

const router = new VueRouter({
   // mode: 'history',
    linkActiveClass: 'is-active',
    routes: [
        { path: '/', name: 'home', component: Home },
        {
            path: '/readers',
            component: Readers,
            children: [
                {
                    path: 'list',
                    component: ListReaders
                },
                {
                    path: 'find',
                    component: FindReader
                },
                {
                    path: 'create',
                    component: CreateReader
                },
                {
                    path: 'update',
                    component: UpdateReader
                },
                {
                    path: 'delete',
                    component: DeleteReader
                },
            ]
        },
        {
            path: '/editions',
            name: 'editions',
            component: Editions,
            children: [
                {
                    path: 'list',
                    component: ListEditions
                },
                {
                    path: 'find',
                    component: FindEdition
                },
            ]
        },
        { path: '/permissions', name: 'permissions', component: Permissions },
        { path: '/reader-logins', name: 'reader-logins', component: ReaderLogins },
        { path: '/publications', name: 'publications', component: Publications },
        { path: '/subscriptions', name: 'subscriptions', component: Subscriptions },
        { path: '/subscription-periods', name: 'subscription-periods', component: SubscriptionPeriods },
        { path: '/devices', name: 'devices', component: Devices },
        { path: '/authentication', name: 'authentication', component: Authentication },
        { path: '/sso-tokens', name: 'sso-tokens', component: SSOTokens },
        { path: '/targeted-notifications', name: 'targeted-notifications', component: TargetedNotifications },
        { path: '/history', name: 'history', component: History },
    ],
});



const app = new Vue({
    el: '#app',
    components: { App },
    router,
    store,
});