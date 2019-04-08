require('./bootstrap');
window.Vue = require('vue');
import buscaLocacao from './components/buscaLocacao.vue';
const app = new Vue({
    el: '#banner',
    components:{
        'buscalocacao': buscaLocacao,
    }
});