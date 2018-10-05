import Vue from 'vue';

import VueResource from 'vue-resource';
// components

import ElementUI from 'element-ui';
import lang from 'element-ui/lib/locale/lang/en';
import 'element-ui/lib/theme-chalk/index.css';
import locale from 'element-ui/lib/locale/lang/en';
import AttachPermissions from './../components/roles/AttachPermissions';
// import Toastr
import Toastr from 'vue-toastr';
import VuejsDialog from "vuejs-dialog"
// import toastr scss file: need webpack sass-loader
require('vue-toastr/src/vue-toastr.scss');
// Register plugin
Vue.use(Toastr);
//install http client for vue
Vue.use(VueResource);
Vue.use(lang);
Vue.use(VuejsDialog);
Vue.use(ElementUI,{locale});
Vue.component('attach-permissions',AttachPermissions);
Vue.http.headers.common['X-CSRF-TOKEN'] = window.Laravel.csrfToken;
new Vue({
  el: '#ohwo',
  props: [],
  data:{
  		model:{role:'',owner:0},
      model_update:{},
      models:[],
      roles:[],
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
        
        this.$http.post('/admin/roles',this.model).then(function(response, status, header){
          this.$toastr.s(response.body.message,'Success');   
          this.submitting= false;

          this.fetchList();
        
          this.model  ={role:'',owner:0};
          $('#RoleModal').modal('hide');
        }).catch(function(response, status,header){
          this.submitting= false;
           this.loading2 = false;
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
      this.$http.get('/admin/roles/list').then(function(response, status, header){
          let me = this;
          me.models = response.data.data;
        
          //this.models = response.data.data
          this.submitting= false;
          this.loading2 = false;
        }).catch(function(response, status,header){
          this.submitting= false;
          this.loading2 = false;
        });
    },
     redirect(id){
      window.location.href ='/admin/roles/'+id+'/attached/permission/';
    },
    /**
    * Fetch model by id via ajax
    */
    fetchById(id){
      this.submitting = true,
       this.loading2 = true;
      this.$http.get('/admin/roles/'+id).then(function(response, status, header){
        this.model_update = response.data.data
        this.loading2 = false;
        this.submitting = false,
        $('#RoleModalUpdate').modal("show");

      }).catch(function(response, $status, header){
          this.submitting= false;
           this.loading2 = false;
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
    * Save model via ajax
    */
    update(){
      this.submitting = true,
      
      this.$http.put('/admin/roles/'+this.model_update.id,this.model_update).then(function(response, status, header){
         this.$toastr.s(response.body.message,'Success');   
          this.submitting= false;

          this.fetchList();
      
          $('#RoleModalUpdate').modal('hide')
      }).catch(function(response, $status, header){
         this.submitting= false;
           this.loading2 = false;
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
    * Delete Model via ajax
    */
    Clickdelete(id){
    
     var  me =this;
      this.$dialog.confirm('Role will be deleted, Are you sure?')
      .then(function () {
          me.submitting = true,
       
          me.$http.delete('/admin/roles/'+id).then(function(response, status, header){
              me.$toastr.s(response.body.message,'Success');   
              me.submitting= false;
              me.fetchList();
          }).catch(function(response, $status, header){
             me.submitting= false;
             me.loading2 = false;
          });
      })
      .catch(function () {
          console.log('Clicked on cancel')
      });
      
    },
   

  },
  mounted(){
  	this.fetchList();
   // this.fetchListRole();
  }
});