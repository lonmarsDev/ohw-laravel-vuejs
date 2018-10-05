<template>
	<div class="form-group">
    
          
    <p id='role_id'> <label for="password" class="required">Company Owners</label></p>
          
           <select class='form-control' v-bind:value='value' v-on:input="$emit('input', $event.target.value)">
            <option v-for="item in users" :value='item.id'>{{item.name}}</option>
          </select>
  </div>   
</template>
<script>
	import ElementUI from 'element-ui';
  import lang from 'element-ui/lib/locale/lang/en';
  import 'element-ui/lib/theme-chalk/index.css';
  import locale from 'element-ui/lib/locale/lang/en'; 
  export default{
    name:'listUsersOwner',
    components:{
      ElementUI,locale,lang
    },
    data:function(){
      return {
        users:[],
        user:''
      }
    },
    props:['value'],
    methods:{
      /**
      * Fetch model by id via ajax
      */
      fetchListUser(){
       
        this.$http.get('/admin/users/list/owners').then(function(response, status, header){
            let me = this;
            me.users = response.data.data;
          }).catch(function(response, status,header){
          
          });
      },
    },
    mounted(){
      this.fetchListUser();
    },
    watch:{
      user:function(val){
        this.$parent[this.modelname]['owner'] = val; 
      }
    }
  }
</script>
<style>
  #role_id{
    margin: 0 !important;
  }
</style>
