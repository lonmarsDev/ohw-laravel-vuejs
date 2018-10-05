import '../../js/bootstrap';
window.Vue = require('vue');

// packages
import ElementUI from 'element-ui';
import 'element-ui/lib/theme-chalk/index.css';
import VueResource from 'vue-resource';
import Toastr from 'vue-toastr';
import 'vue-toastr/src/vue-toastr.scss';

// child components
import AccountSecurity from "./components/AccountSecurity";
import AccountVerification from "./components/AccountVerification";
import DataSciencePrivacy from './components/DataSciencePrivacy';

// usages
Vue.use(ElementUI);
Vue.use(VueResource);
Vue.use(Toastr)


// vue-resource configurations 
Vue.http.headers.common['X-CSRF-TOKEN'] = window.Laravel.csrfToken;

// components
Vue.component('account-security', AccountSecurity);
Vue.component('account-verification', AccountVerification);
Vue.component('data-science-privacy', DataSciencePrivacy);

new Vue({
  el: '#settings-security'

});