<!-- Modal -->
<div id="UserModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    
    <div class="modal-content">
      <div class="modal-header text-center">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Create User</h4>
      </div>
      <div class="modal-body"  v-loading="submitting"
                          element-loading-text="Loading..."
                          element-loading-spinner="el-icon-loading"
                          element-loading-background="rgba(0, 0, 0, 0.8">
        <div class="container-fluid" >
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group" v-show="model.role != 3 ">
                        <label for="company" class="required">Company Name</label>
                        <input type="text" v-model='model.company' name='company' class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="name" class="required">Name</label>
                        <input type="text" v-model='model.name' name='name' class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="email" class="required">Email</label>
                        <input type="email" v-model='model.email' name='email' class="form-control">
                    </div>
                    <list-roles v-model='model.role'></list-roles>
                    <list-users-owners v-model='model.owner' v-show="model.role== 3 "></list-users-owners>
                    <div class="form-group">
                        <label for="password" class="required">Password</label>
                        <input type="password" v-model='model.password' name='password' class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation" class="required">Confirm Password</label>
                        <input type="password" v-model='model.password_confirmation' name='password_confirmation' class="form-control">
                    </div>
                </div>
               
            </div>
            
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-theme" id="billSave" @click="save">Save</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
    
  </div>
</div> 

<div id="UserModalUpdate" class="modal fade" role="dialog">
  <div class="modal-dialog">
    
    <div class="modal-content">
      <div class="modal-header text-center">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Update User</h4>
      </div>
      <div class="modal-body"  v-loading="submitting"
                          element-loading-text="Loading..."
                          element-loading-spinner="el-icon-loading"
                          element-loading-background="rgba(0, 0, 0, 0.8">
        <div class="container-fluid" >
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group" v-show="model_update.role != 3 ">
                        <label for="company" class="required">Company Name</label>
                        <input type="text" v-model='model_update.company' name='company' class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="name" class="required">Name</label>
                        <input type="text" v-model='model_update.name' name='name' class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="email" class="required">Email</label>
                        <input type="email" v-model='model_update.email' name='email' class="form-control">
                    </div>
                    <list-roles v-model='model_update.role'></list-roles>
                    <list-users-owners v-model='model_update.owner' v-show="model_update.role== 3 "></list-users-owners>
                    <div class="form-group">
                        <label for="password" class="required">Password</label>
                        <input type="password" v-model='model_update.password' name='password' class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation" class="required">Confirm Password</label>
                        <input type="password" v-model='model_update.password_confirmation' name='password_confirmation' class="form-control">
                    </div>
                </div>
               
            </div>
            
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-theme" id="billSave" @click="update">Save</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
    
  </div>
</div> 