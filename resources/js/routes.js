
import Vue from 'vue';
import VueRouter from 'vue-router'
Vue.use(VueRouter)

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

export default {}