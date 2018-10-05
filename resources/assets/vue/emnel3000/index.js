import '../../js/bootstrap';
import Vue from 'vue';
import store from './store'
window.Vue = Vue;
import registerComponents from './register-components';

// packages

// componenets
// registering compoenents
registerComponents(Vue);

// usage

// some configs
Vue.prototype.$http = window.axios;

new Vue({
  el: '#emnel3000',
  store
});