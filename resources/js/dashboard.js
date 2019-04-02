import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter);

import DashboardApp from '../assets/js/views/DashboardApp'
import Comments from '../assets/js/views/comments'
import Home from '../assets/js/views/Home'
import Reservation from '../assets/js/views/reservation'
import EmpresaDash from './components/empresadash';
import moment from 'moment'
import Vue2Filters from 'vue2-filters'

Vue.use(Vue2Filters)
Vue.config.productionTip = false
Vue.filter('formatDate', function(value) {
    if (value) {
        return moment(String(value)).format('MM/DD/YYYY')
    }
});

Vue.filter('formatTelefone', function(value) {
    if (value) {
        value = "("+value;
        value =  [value.slice(0,3),")", value.slice(3)].join('');
        return [value.slice(0,9),"-", value.slice(9)].join('');
    }
});

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