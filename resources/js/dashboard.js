import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter);

import DashboardApp from '../assets/js/views/DashboardApp'
import Comments from '../assets/js/views/comments'
import Home from '../assets/js/views/Home'
import Reservation from '../assets/js/views/reservation'

const router = new VueRouter({
    mode: 'history',
    routes:[
        {
            path: '/perfil',
            name: 'home',
            component: Home
        },
        {
            path: '/comments',
            name: 'comments',
            component: Comments,
        },
        {
            path: '/reservations',
            name: 'reservations',
            component: Reservation,
        }
    ],
});

const dashapp = new Vue({
    el:'#dashboard',
    components: {'dashboardapp':DashboardApp},
    router,
});