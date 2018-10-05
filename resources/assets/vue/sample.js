import Vue from 'vue';

import VueResource from 'vue-resource';
// components

//install http client for vue
Vue.use(VueResource);

Vue.http.headers.common['X-CSRF-TOKEN'] = window.Laravel.csrfToken;
new Vue({
  el: '#ohwo',
  props: [],
  data:{
  		
  },

  methods:{
		

  },
  mounted(){
  	
  }
});