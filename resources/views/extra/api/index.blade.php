@extends('layouts.ohwo')

@section('header-assets')
<style type="text/css">
    .modal .modal-header {
        background: #f2f2f2;
    }
    .modal .modal-header .close {
        background: #000;
        border-radius: 100%;
        height: 25px;
        width: 25px;
        text-align: center;
    }
    legend.required::after, label.required::after {
        content: "required";
        float: right;
        color: #959595;
        font-size: .86666667em;
    }
    .orange-border{
        border-color:#ee9879;
    }
</style>
@endsection
@section('content')


<section class="mainsection">
    <div class="container-fluid">
        <div class="row row-no-padding">

            <div class="col-sm-4 col-md-3 col-lg-2">
                @include('partials.left_sidebar', ['ActiveMenu'=>'api', 'user'=>$user])
            </div>

            <div class="col-sm-8 col-md-9 col-lg-10">

                <div class="rightmenumain">
                    <div class="titlemain">
                        <h2>Company Name</h2>
                    </div>
                </div>

                <div class="containbox">

                    <div class="innerformmain topspace">
                        <h2>API Keys</h2>
                        <div class="row">
                            <div class='col-md-6'>
                                

                                <h4>About the API</h4>
                                <p>This Ohwolar API makes it easy to programmers to integrate Ohwolar features into other applications</p>
                                <a href="#" class="btn btn1">Read API Documentations</a>
                            </div>
                       

                            <div class='col-md-6'>
                                <h4>Developing on App?</h4>
                                <p>Writing your own application that require access to other ohwolar users accounts?. check out our OAUTH2 api documentations. then register your app</p>
                                <a href="#" class="btn btn-default orange-border">Read API Documentations</a>
                            </div>

                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            
                        </div>
                    </div>
                 </div>
                </div>

                <div class="containbox">
                    <h2>Lists Api Keys</h2>
                    

                    <div class="row">
                        <div class="col-md-12" v-loading="loading2"
                          element-loading-text="Loading..."
                          element-loading-spinner="el-icon-loading"
                          element-loading-background="rgba(0, 0, 0, 0.8">
                            <div class="tablestriped-one table-responsive">
                                  <el-table
                                    :data="models"
                                    
                                    style="width: 100%"
                                    >
                                    <el-table-column
                                      prop="user.name"
                                      label="User"
                                      sortable
                                      width="180">
                                    </el-table-column>
                                    <el-table-column
                                      prop="label"
                                      label="Label"
                                      sortable
                                      width="180">
                                    </el-table-column>
                                    <el-table-column
                                      prop="hash_key"
                                      label="Token"
                                      sortable
                                      >
                                    </el-table-column>
                                    <el-table-column
                                      label="Active"
                                       width="150">
                                      <template slot-scope="scope">
                                       <el-switch
                                                  v-model="scope.row.status"
                                                  
                                                  @change='toggle(scope.row)' >
                                        </el-switch>
                                      </template>
                                      </el-table-column>
                                  </el-table>
                               
                            </div>
                        </div>
                    </div>

                    <button class="btn btn1" data-toggle="modal" data-target="#ApiModal"> Create API</button>
                </div>

            </div>


    </div>
</section>

<!-- Modal -->
<div id="ApiModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    
    <div class="modal-content">
      <div class="modal-header text-center">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Billing Information</h4>
      </div>
      <div class="modal-body"  v-loading="submitting"
                          element-loading-text="Loading..."
                          element-loading-spinner="el-icon-loading"
                          element-loading-background="rgba(0, 0, 0, 0.8">
        <div class="container-fluid" >
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="label" class="required">Label</label>
                        <input type="text" v-model='model.label' name='label' class="form-control">
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


@endsection

@section('script-assets')
    <script src="{{ asset('js/vue/extra/api.js') }}"></script>
@endsection