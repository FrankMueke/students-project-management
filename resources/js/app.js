/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');


window.Vue = require('vue');


Vue.component(
    'chat-component',
    require('./components/ChatComponent.vue').default
)

import VueRouter from 'vue-router';
Vue.use(VueRouter);

import VueAxios from 'vue-axios';
import axios from 'axios';

import App from './App.vue';
Vue.use(VueAxios, axios);

import Join from './components/Join';
import Meeting from './components/Meeting';
// import Chatcomponent from './components/ChatComponent';

const routes = [{
        path: '/join',
        name: 'join',
        component: Join
    },
    {
        path: '/meeting',
        name: 'meeting',
        component: Meeting
    }
    // {
    //     path: '/chatcomponent',
    //     name: 'chatcomponent',
    //     component: Chatcomponent
    // }
];

const router = new VueRouter({
    mode: 'history',
    routes: routes
});

const app = new Vue(Vue.util.extend({ router }, App)).$mount('#app');
// const app = new Vue({
//     el: '#app',
// });