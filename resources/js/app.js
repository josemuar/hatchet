require('./bootstrap');
import Vue from 'vue';
window.Vue = require('vue').default;
require('alpinejs');
require('bootstrap');
require('select2');



Vue.component('jtable', require('./components/jlmaSortingTable.vue').default);
Vue.component('jlmabutton', require('./components/jlmabutton.vue').default);
Vue.component('jlmaselect2', require('./components/jlmaSelect2.vue').default);





var bus = new Vue();
window.bus =  bus;


const app = new Vue({
});

/*
export default {
  components: {
    "jtable" : jtable
  }
}*/


