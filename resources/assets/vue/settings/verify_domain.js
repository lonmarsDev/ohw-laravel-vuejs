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
  		email_address  : "" ,
      verification_code : "",
      domain_data : [] ,
      errors : [],
      selected_domain_id : 0 ,
      selected_domain_name : "",
      submittingAdd:false,
      submittingVerify:false,
      submittingRemove:false,
      submittingAuth:false,
      loading2:true,
      value:true
  },

  methods:{
	 
    AddDomain(event) {
      
      this.submittingAdd = true;
      var len = $('#verificationModal .content p').length;
      if(len > 0)
      {
          $('#verificationModal .content p')[0].remove();
          $('#verificationModal .content .alert')[0].remove();
      }
      this.$http.post('/settings/verified-domain/add',{  email: this.email_address }).then(function(response, status, header){
        
        console.log(response);       
        $('#verificationModal .content').prepend('<p>'+response.body.data.successMessage+'</p>');
        $('#verificationModal .content').prepend('<div class="alert alert-success">Your verification email is on the way!</div>');

        this.$toastr.s(response.body.message,'Success');   
        this.submittingAdd= false;
        this.GetDomain();
        $('#domainModal').modal('hide');
        $('#verificationModal').modal('show');
      }).catch(function(response, status,header){
        this.submittingAdd= false;
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
    SendNewVerificationEmail(domain_id , domain_name , email_address){
      this.selected_domain_id=domain_id;
      this.email_address=email_address;
      $('#domainModal').modal('show');
    },
    VerifyDomain(domain_id , domain_name) {
      this.selected_domain_id=domain_id;
      this.selected_domain_name=domain_name;
      $('#verificationModal').modal('show');
    },
    DoVerifyDomain() {
      
      this.submittingVerify = true;
      this.$http.put('/settings/verified-domain/verify/'+this.selected_domain_id+'/'+this.verification_code).then(function(response, status, header){
        if(response.data.status){
          this.$toastr.s(response.body.message,'Success');
          $('#verificationModal').modal('hide');
        }else{
          this.$toastr.e(response.body.message,'Error'); 
        }
        this.submittingVerify = false;
        
      
      }).catch(function(response, status,header){
        this.submittingVerify = false;
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
    //Get Domains list
    GetDomain() {

      this.loading2 = true;
      this.$http.get('/settings/verified-domain/list').then(function(response, status, header){
        console.log( response)
        this.domain_data = response.data.data;
        this.loading2 = false;

      }).catch(function(response, status,header){
        this.loading2 = false;
        this.errors.push(e)
      });
    
    },
    RemoveDomain(domain_id , domain_name) {
      this.selected_domain_id=domain_id;
      this.selected_domain_name=domain_name;
      $('#removeModal').modal('show');
    },
    DoRemoveDomain(){
      this.submittingRemove = true;
      this.$http.delete('/settings/verified-domain/remove/'+this.selected_domain_id).then(function(response, status, header){
        this.GetDomain();
        $('#removeModal').modal('hide');
        this.submittingRemove = false;
      
      }).catch(function(response, status,header){
        this.submittingRemove = false;
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
    AuthenticationDomain(domain_id , domain_name) {
      this.selected_domain_id=domain_id;
      this.selected_domain_name=domain_name;
      $('#authenticationModal').modal('show');
    }

  },
  mounted(){
    this.GetDomain();
  }
});