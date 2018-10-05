<template>
  <div>
     <ul class="list-group">
                         <li class="list-group-item" v-for="group in attached_groups" >{{group.name}}
                          </li>
      </ul>
  </div>
</template>

<script>

  export default {

    name: 'attachedGroups',

    props: ['id'],
    data: function () {
     return { attached_groups:[],
      groups:[] }
    },
    components: {
      
    },
   
    methods: {
     fetchingAttached(){
            let self = this;
           
            this.$http.get('/leads/'+this.id+'/getattached').then(function(response, status, header){
            
                self.attached_groups = response.data.attached_groups;
               
            }).catch(function(response,status,header){
                var data =[];
                  if(response.status == 500){
                      data = "We found exceptions, team currently fixing this issue";
                  }else{
                    if(response.data.error==true){
                      var data = response.data.message;
                    }else{
                         var data = Object.keys(response.data).map(function(key,value){
                         
                          return [response.data[key][value]];
                      });
                    }
                  }
                  
                  
                  toastr.error(data.toString(),'Errors Found', {
                    closeButton: true,
                    progressBar: true,
                  });
               this.submitting=false;
            });
        },
    },
    mounted(){
      this.fetchingAttached();
    }
  }
</script>