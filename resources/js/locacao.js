require('./bootstrap');
window.Vue = require('vue');
import Locacao from './components/locacao.vue';
const app = new Vue({
    el: '#locacao',
    components:{
        'locacao': Locacao,
    }
});