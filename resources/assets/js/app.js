import './bootstrap';
import Vue from 'vue'; // Importing Vue Library
import VueRouter from 'vue-router'; // importing Vue router library
import router from './routes';
import VueResource from 'vue-resource';

window.Vue = Vue;
Vue.use(VueRouter);

Vue.use(VueResource);
Vue.config.productionTip = false

const app = new Vue({
    el: '#app',
    router

});