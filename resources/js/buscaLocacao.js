
require('./bootstrap');

window.Vue = require('vue');
import buscaLocacao from './components/buscaLocacao.vue';
import ConfirmReserv from './components/confirmReserv';
const my = new Vue({
    el: '#banner',
    components:{
        'buscalocacao': buscaLocacao,
    }
});