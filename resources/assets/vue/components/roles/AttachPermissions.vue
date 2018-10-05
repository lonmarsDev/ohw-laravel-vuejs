<template>
  <div>
 
   
                        <div class="row">

                            <div class="col-lg-6">
                                <h4 class="font-w300 push">Permission Attached</h4>
                                <p class="text-muted no-padding">Drag below to attach permissions.</p>
                                <draggable class="list-group" v-model="attached_permissions"  :element="'ul'"  @add="permissionDropToAttach" :options="attached_permission_options">
                                <!-- <li class="list-group-item" v-if="checkEmptyAttachedAgents">Drag Agents to attached</li> -->
                                <li class="list-group-item" v-for="permission in attached_permissions" track-by="group.id"
                                    :data-group-id="permission.id"  :data-id="permission.id" :data-group-name="permission.name" :key="permission.id">{{permission.display_name}} 
                                </li>
                                <!-- <li class="list-group-item">Cras justo odio</li>
                                <li class="list-group-item">Dapibus ac facilisis in</li>
                                <li class="list-group-item">Morbi leo risus</li>
                                <li class="list-group-item">Porta ac consectetur ac</li>
                                <li class="list-group-item">Vestibulum at eros</li> -->
                                </draggable>
                            </div>
                            <div class="col-lg-6">
                                <h4 class="font-w300 push">Available Permissions</h4>
                                <p class="text-muted no-padding">Drag below to detach Permissions.</p>
                                <draggable class="list-group" v-model="permissions" :element="'ul'"
                                         @add="permissionDropToDettach"   :options="permission_options">
                                    <!-- <li class="list-group-item" v-if="checkEmptyAvailableAgents">Drag Agents to dettached</li> -->
                                    <li class="list-group-item" v-for="permission in permissions" track-by="group.id" :data-group-id="permission.id"
                                        :data-group-name="permission.name" :key="permission.id">{{permission.display_name}}
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
  }
</style>
<script>
  import draggable from 'vuedraggable';
  import Toastr from 'vue-toastr';
  export default {

    name: 'AttachToPermissions',

    props: ['id'],
    data: function () {
     return {
          attached_permissions:[],
          permissions:[],
           permission_options: {
              group: {
                  name:'permission',
                  pull:true,
                  put:true
              },
              ghostClass: 'list-group-item-info',
              chosenClass: 'list-group-item-success',
              sort: false
        },
        attached_permission_options: {
              group: {
                  name: 'permission',
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
           
            this.$http.get('/admin/roles/'+this.id+'/getattached').then(function(response, status, header){
              console.log(response.data);
               self.attached_permissions = response.data.data.attached_permissions;
               self.permissions = response.data.data.permissions;
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
        permissionDropToAttach(evnt){
            this.attachedPermission(evnt.item.dataset);
        },
        permissionDropToDettach(evnt){
             this.detachPermission(evnt.item.dataset);
        },
        attachedPermission(group){
          let self = this;
          this.$http.post('/admin/roles/'+this.id+'/attached/permission',{'permission_id':group.groupId}).then(function(response, status, header){
              self.fetchingAttached();
               toastr.s('Attached permission', 'Successfully Attached permission', {
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
          
          this.$http.post('/admin/roles/'+this.id+'/detached/permission',{'permission_id':group.groupId}).then(function(response, status, header){
              self.fetchingAttached();
                 toastr.s('Detached permission', 'Successfully Detached permission', {
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