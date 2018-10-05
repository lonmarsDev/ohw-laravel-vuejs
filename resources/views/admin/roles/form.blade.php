<!-- Modal -->
<div id="RoleModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    
    <div class="modal-content">
      <div class="modal-header text-center">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Create Role</h4>
      </div>
      <div class="modal-body"  v-loading="submitting"
                          element-loading-text="Loading..."
                          element-loading-spinner="el-icon-loading"
                          element-loading-background="rgba(0, 0, 0, 0.8">
        <div class="container-fluid" >
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="company" class="required">Name</label>
                        <input type="text" v-model='model.name' name='company' class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="name" class="required">Display Name</label>
                        <input type="text" v-model='model.display_name' name='name' class="form-control">
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

<div id="RoleModalUpdate" class="modal fade" role="dialog">
  <div class="modal-dialog">
    
    <div class="modal-content">
      <div class="modal-header text-center">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Update Role</h4>
      </div>
      <div class="modal-body"  v-loading="submitting"
                          element-loading-text="Loading..."
                          element-loading-spinner="el-icon-loading"
                          element-loading-background="rgba(0, 0, 0, 0.8">
        <div class="container-fluid" >
            <div class="row">
                <div class="col-md-12">
                   <div class="form-group">
                        <label for="company" class="required">Name</label>
                        <input type="text" :disabled="model_update.is_default" v-model='model_update.name' name='company' class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="name" class="required">Display Name</label>
                        <input type="text" v-model='model_update.display_name' name='name' class="form-control">
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