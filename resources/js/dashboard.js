import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

import DashboardApp from '../assets/js/views/DashboardApp'
import Options from '../assets/js/views/Options'
import Home from '../assets/js/views/Home'

const router = new VueRouter({
    mode: 'history',
    routes:[
        {
            path: '/perfil',
            name: 'home',
            component: Home
        },
        {
            path: '/options',
            name: 'options',
            component: Options,
        },
    ],
});

const dashapp = new Vue({
    el:'#dashboard',
    components: {'dashboardapp':DashboardApp},
    router,
});