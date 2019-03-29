
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import VcUsers from './components/users.vue'
import Search from './components/search.vue';
import CreateUser from './components/createuser.vue';
import BuscaCep from './components/buscacep.vue';
import EmpresaDash from './components/empresadash';
import UserDashboard from './components/userdashboard';

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('createuser', require('./components/createuser.vue').default);
Vue.component('buscacep', require('./components/buscacep.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 *
 */

const app = new Vue({
    el: '#index',
    components:{
        'vcusers':VcUsers,
        'search': Search,
        'createuser': CreateUser,
        'buscacep':BuscaCep,
        'empresadash': EmpresaDash,
        'userdashboard': UserDashboard
    },
    data: {
        message: "O VUE JS ESTÁ FUNCIONANDO"
    }
});

// new Vue({
// 	el:"#register",
// 	components:{
//         CreateUser
// 	}
// });