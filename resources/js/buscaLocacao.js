require('./bootstrap');
window.Vue = require('vue');

import buscaLocacao from './components/buscaLocacao.vue';
import LocacaoJuridica from './components/buscaLocacaoJuridica.vue';


const banner = new Vue({
    el: '#banner',
    components:{
        'buscalocacao': buscaLocacao,
		'buscalocacaojuridica' : LocacaoJuridica
    }
});
