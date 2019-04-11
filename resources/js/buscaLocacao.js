
require('./bootstrap');

window.Vue = require('vue');

import buscaLocacao from './components/buscaLocacao.vue';


const my = new Vue({
    el: '#banner',
    components:{
        'buscalocacao': buscaLocacao,
    }
});
