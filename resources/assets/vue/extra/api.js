import Vue from 'vue';

import VueResource from 'vue-resource';
// components

import ElementUI from 'element-ui';
import lang from 'element-ui/lib/locale/lang/en';
import 'element-ui/lib/theme-chalk/index.css';
import locale from 'element-ui/lib/locale/lang/en';
// import Toastr
import Toastr from 'vue-toastr';
// import toastr scss file: need webpack sass-loader
require('vue-toastr/src/vue-toastr.scss');
// Register plugin
Vue.use(Toastr);
//install http client for vue
Vue.use(VueResource);
Vue.use(lang);
Vue.use(ElementUI,{locale});

Vue.http.headers.common['X-CSRF-TOKEN'] = window.Laravel.csrfToken;
new Vue({
  el: '#ohwo',
  props: [],
  data:{
  		model:{},
      models:[],
      submitting:false,
      loading2:true,
      value:true
  },

  methods:{
		/**
    * Save the model via ajax
    */
    save(){
        this.submitting = true;
        
        this.$http.post('/extra/api',this.model).then(function(response, status, header){
          this.$toastr.s(response.body.message,'Success');   
          this.submitting= false;

          this.fetchList();
        
          this.model.label ='';
          $('#ApiModal').modal('hide');
        }).catch(function(response, status,header){
          this.submitting= false;
          var data =[];
          var message =response.body.message;
          if(response.status == 500){
              data = "We found exceptions, team currently fixing this issue";
          }else{
             var data = Object.keys(response.body.errors).map(function(key,value){      
                  return  [response.body.errors[key][0]];
              });
          }
          this.$toastr.e(data.toString(), message); 
          
        });
    },
    /**
    * Fetch the list of data via ajax
    */
    fetchList(){
      this.submitting = true;
      this.loading2 = true;
      this.$http.get('/extra/api/list').then(function(response, status, header){
          let me = this;
          me.models = [];
          $.each(response.data.data,function(e,v){
              v.status = v.status == 1;
              me.models.push(v);
          });
          //this.models = response.data.data
          this.submitting= false;
          this.loading2 = false;
        }).catch(function(response, status,header){
          this.submitting= false;
          this.loading2 = false;
        });
    },
    /**
    * Fetch model by id via ajax
    */
    fetchById(id){
      this.submitting = true,
       this.loading2 = true;
      this.$http.get('/settings/api/'+id).then(function(response, status, header){
        this.model = response.data.data
        this.loading2 = false;
      }).catch(function(response, $status, header){
        this.submitting= false;
        this.loading2 = false;
      });
    },

    /**
    * Save model via ajax
    */
    update(id){
      this.submitting = true,
       this.loading2 = true;
      this.$http.put('/settings/api/'+id,this.model).then(function(response, status, header){
        this.model = response.data.data
      }).catch(function(response, $status, header){
         this.submitting= false;
      });
    },

    /**
    * Delete Model via ajax
    */
    delete(id){
      this.submitting = true,
       this.loading2 = true;
      this.$http.delete('/settings/api/'+id,this.model).then(function(response, status, header){
        this.model = response.data.data
        this.loading2 = false;
         this.submitting= false;
      }).catch(function(response, $status, header){
         this.submitting= false;
         this.loading2 = false;
      });
    },
    /**
    *
    */
    toggle(model){
      console.log(model);
      this.submitting = true,
      this.loading2 = true;
      this.$http.post('/extra/api/toggle/'+model.id+'/'+model.status,{}).then(function(response, status, header){
        this.model = response.data.data
        this.submitting= false;
         this.loading2 = false;
      }).catch(function(response, $status, header){
         this.submitting= false;
          this.loading2 = false;
      });
    }

  },
  mounted(){
  	this.fetchList();
  }
});