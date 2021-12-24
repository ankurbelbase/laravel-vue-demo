require('./bootstrap');

window.Vue = require('vue');


import VueRouter from 'vue-router';
import * as VueGoogleMaps from 'vue2-google-maps';
Vue.use(VueRouter);
Vue.use(VueGoogleMaps, {
    load: {
        key:''
    }
})

import App from './App.vue';
import Home from '../js/components/Home';

import VueAxios from 'vue-axios';
import axios from 'axios';
import Vue from 'vue';
Vue.use(VueAxios, axios);

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

const routes = [
    {
        name:'/',
        path:'/',
        component: Home
    },
]

const router = new VueRouter({mode: 'history', routes:routes});
// const app = new Vue({
//     el: '#app',
// });

const app = new Vue(Vue.util.extend({ router }, App)).$mount('#app');