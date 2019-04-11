window.Vue = require('vue');


import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter);

import DashboardApp from '../assets/js/views/DashboardApp'
import Comments from '../assets/js/views/comments'
import Home from '../assets/js/views/Home'
import Reservation from '../assets/js/views/reservation'
import EmpresaDash from './components/empresadash';
import Cars from '../assets/js/views/Cars';
import moment from 'moment';
import ConfirmReserv from './components/confirmReserv';
import Vue2Filters from 'vue2-filters'
import  VeeValidate from 'vee-validate'

Vue.use(Vue2Filters);
Vue.use(VeeValidate);

Vue.config.productionTip = false;

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

const bus = new Vue({
    data(){
        return {
            info: null,
            name:null
        }
    }
});
export default bus

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
        },
        {
            path: window.location.pathname+'/cars',
            name: 'cars',
            component: Cars,
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
        'empresadash':EmpresaDash,
        'confirm-reserv': ConfirmReserv,
    },
    router,
});