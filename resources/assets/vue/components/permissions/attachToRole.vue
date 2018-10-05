<template>
  <div>
 
   
                        <div class="row">

                            <div class="col-lg-6">
                                <h4 class="font-w300 push">Role Attached</h4>
                                <p class="text-muted no-padding">Drag below to attach roles.</p>
                                <draggable class="list-group" v-model="attached_roles"  :element="'ul'"  @add="roleDropToAttach" :options="attached_role_options">
                                <!-- <li class="list-group-item" v-if="checkEmptyAttachedAgents">Drag Agents to attached</li> -->
                                <li class="list-group-item" v-for="role in attached_roles" track-by="group.id"
                                    :data-group-id="role.id"  :data-id="role.id" :data-group-name="role.name" :key="role.id">{{role.display_name}} 
                                </li>
                                <!-- <li class="list-group-item">Cras justo odio</li>
                                <li class="list-group-item">Dapibus ac facilisis in</li>
                                <li class="list-group-item">Morbi leo risus</li>
                                <li class="list-group-item">Porta ac consectetur ac</li>
                                <li class="list-group-item">Vestibulum at eros</li> -->
                                </draggable>
                            </div>
                            <div class="col-lg-6">
                                <h4 class="font-w300 push">Available roles</h4>
                                <p class="text-muted no-padding">Drag below to detach roles.</p>
                                <draggable class="list-group" v-model="roles" :element="'ul'"
                                         @add="roleDropToDettach"   :options="role_options">
                                    <!-- <li class="list-group-item" v-if="checkEmptyAvailableAgents">Drag Agents to dettached</li> -->
                                    <li class="list-group-item" v-for="role in roles" track-by="group.id" :data-group-id="role.id"
                                        :data-group-name="role.name" :key="role.id">{{role.display_name}}
                                    </li>
                                    <!-- <li class="list-group-item">Cras justo odio</li>
                                    <li class="list-group-item">Dapibus ac facilisis in</li>
                                    <li class="list-group-item">Morbi leo risus</li>
                                    <li class="list-group-item">Porta ac consectetur ac</li>
                                    <li class="list-group-item">Vestibulum at eros</li> -->
                                </draggable>
                            </div>
                        </div>


         
  </div>
</template>
<style type="text/css">
  .list-group{
    height: 500px;
     overflow-y:scroll;
  }
</style>
<script>
  import draggable from 'vuedraggable';
  import Toastr from 'vue-toastr';
  export default {

    name: 'AttachToRoles',

    props: ['id'],
    data: function () {
     return {
          attached_roles:[],
          roles:[],
           role_options: {
              group: {
                  name:'role',
                  pull:true,
                  put:true
              },
              ghostClass: 'list-group-item-info',
              chosenClass: 'list-group-item-success',
              sort: false
        },
        attached_role_options: {
              group: {
                  name: 'role',
                  pull:true,
                  put:true,
              },
              ghostClass:'list-group-item-info',
              chosenClass: 'list-group-item-success',
              sort: true
            }
         
       }
    },
    components: {
      draggable,Toastr
    },
   
    methods: {
     fetchingAttached(){
            let self = this;
           
            this.$http.get('/admin/permissions/'+this.id+'/getattached').then(function(response, status, header){
              console.log(response.data);
               self.attached_roles = response.data.data.attached_roles;
               self.roles = response.data.data.roles;
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
                  
                  
                  toastr.e(data.toString(),'Errors Found', {
                    closeButton: true,
                    progressBar: true,
                  });
               this.submitting=false;
            });
        },
        roleDropToAttach(evnt){
            this.attachedPermission(evnt.item.dataset);
        },
        roleDropToDettach(evnt){
             this.detachPermission(evnt.item.dataset);
        },
        attachedPermission(group){
          let self = this;
          this.$http.post('/admin/permissions/'+this.id+'/attached/role',{'role_id':group.groupId}).then(function(response, status, header){
              self.fetchingAttached();
               toastr.s('Attached role', 'Successfully Attached role', {
                    closeButton: true,
                    progressBar: false,
                  });
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
                  
                  
                  toastr.e(data.toString(),'Errors Found', {
                    closeButton: true,
                    progressBar: true,
                  });
               this.submitting=false;
          });
      },
      detachPermission(group){
          let self = this;
          
          this.$http.post('/admin/permissions/'+this.id+'/detached/role',{'role_id':group.groupId}).then(function(response, status, header){
              self.fetchingAttached();
                 toastr.s('Detached role', 'Successfully Detached role', {
                    closeButton: true,
                    progressBar: false,
                  });
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
                  
                  
                  toastr.e(data.toString(),'Errors Found', {
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