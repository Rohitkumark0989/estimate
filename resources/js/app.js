require('./bootstrap');

require('alpinejs');
window.Vue = require('vue').default;

import Vue from 'vue'

import App from './vue/app.vue'

const app = new Vue({
    el:'#app',
    components:{App}
});