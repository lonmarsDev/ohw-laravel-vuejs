<template>
	<div class="form-group">
    
          
    <p id='role_id'> <label for="password" class="required">Role</label></p>
          
          <select class='form-control' v-bind:value='value' v-on:input="$emit('input', $event.target.value)">
            <option v-for="item in roles" :value='item.id'>{{item.display_name}}</option>
          </select>
          
     </div>
</template>
<script>
	import ElementUI from 'element-ui';
  import lang from 'element-ui/lib/locale/lang/en';
  import 'element-ui/lib/theme-chalk/index.css';
  import locale from 'element-ui/lib/locale/lang/en'; 
  export default{
    name:'listRoles',
    components:{
      ElementUI,locale,lang
    },
    data:function(){
      return {
        roles:[],
        role:''
      }
    },
    props:['modelname','value'],
    methods:{
      /**
      * Fetch model by id via ajax
      */
      fetchListRole(){
       
        this.$http.get('/admin/roles/list').then(function(response, status, header){
            let me = this;
            me.roles = response.data.data;
            console.log(me.roles);
             
          }).catch(function(response, status,header){
          
          });
      },
    },
    mounted(){
      this.fetchListRole();
      //this.role=  //this.$parent[this.modelname]['role'];
     //console.log(this.value);
    },
    created:function(){
    
    },
    watch:{
      role:function(val){
        this.$parent[this.modelname]['role'] = val; 
      }
    }
  }
</script>
<style>
  #role_id{
    margin: 0 !important;
  }
</style>
