require('./bootstrap');
import Vue from 'vue';
window.Vue = require('vue');
require('alpinejs');
require('bootstrap');
require('select2');

Vue.component('jtable', require('./components/jlmaSortingTable.vue').default);
Vue.component('jlmabutton', require('./components/jlmabutton.vue').default);
Vue.component('jlmaselect2', require('./components/jlmaSelect2.vue').default);
window.bus =  new Vue();

const app = new Vue({
    el: '#app',
});