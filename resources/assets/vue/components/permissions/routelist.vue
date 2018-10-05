<template>
  <div >
  	<div class="form-group">
      
            
      <p id='role_id'> <label for="RouteName" class="required">Routes</label></p>
            
            <select class='form-control' v-bind:value='value' v-on:input="$emit('input', $event.target.value)"  v-model='route'>
              <option v-for="item in routes" :value='item' v-text="filterString(item.as)"></option>
            </select>
            
       </div>
        <div class="card text-white bg-info mb-3">
          <div class="card-header">Route {{filterString(route.as)}} Details</div>
          <div class="card-body">
            <h5 class="card-title">Method</h5>
            <p class="card-text">{{route.method}}</p>
            <h5 class="card-title">Route</h5>
             <p class="card-text">{{route.uri}}</p>
          </div>
        </div>
  </div>
</template>
<script>
	import ElementUI from 'element-ui';
  import lang from 'element-ui/lib/locale/lang/en';
  import 'element-ui/lib/theme-chalk/index.css';
  import locale from 'element-ui/lib/locale/lang/en'; 
  export default{
    name:'routeList',
    components:{
      ElementUI,locale,lang
    },
    data:function(){
      return {
        routes:[],
        route:{
          'as':''
        },

      }
    },
    props:['modelname','value'],
    methods:{
      /**
      * Fetch model by id via ajax
      */
      fetchListRole(){
       
        this.$http.get('/admin/permissions/routes').then(function(response, status, header){
            let me = this;
            me.routes = response.data.data;
            console.log(me.routes);
             
          }).catch(function(response, status,header){
          
          });
      },
      filterString(string){
          return string.replace(/\./g,' ').replace(/\_/g,' ').replace(/(^|\s)\S/g, l => l.toUpperCase());
        // return string;
      },
      selectedValue(){

      }
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
