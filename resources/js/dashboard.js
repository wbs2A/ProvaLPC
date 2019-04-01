import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter);

import DashboardApp from '../assets/js/views/DashboardApp'
import Comments from '../assets/js/views/comments'
import Home from '../assets/js/views/Home'
import Reservation from '../assets/js/views/reservation'
import EmpresaDash from './components/empresadash';

const router = new VueRouter({
    mode: 'history',
    routes:[
        {
            path: window.location.pathname+'/',
            name: 'home',
            component: Home
        },
        {
            path: window.location.pathname+'/comments',
            name: 'comments',
            component: Comments,
        },
        {
            path: window.location.pathname+'/reservations',
            name: 'reservations',
            component: Reservation,
        }
    ],
});

const dashapp = new Vue({
    el:'#dashboard',
    data:{
        info: null
    },
    components: {
        'dashboardapp':DashboardApp,
        'empresadash':EmpresaDash
    },
    router,
});