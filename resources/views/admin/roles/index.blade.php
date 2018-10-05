@extends('layouts.admin.app')
@section('content')
 <!--state overview start-->
              <div class="row">
                <div class="col-lg-12">
                       
                     </div>
                  <div class="col-lg-12">
                    <section class="panel">
                          <header class="panel-heading no-border">
                             <button class="btn btn-default" data-toggle="modal" data-target="#RoleModal"> Create Role</button>
                          </header>
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
                                      prop="display_name"
                                      label="Display Name"
                                      sortable
                                      width="180">
                                    </el-table-column>
                                    <el-table-column
                                      prop="name"
                                      label="Name"
                                      sortable
                                      width="180">
                                    </el-table-column>
                                    <el-table-column
                                      label="Active"
                                       width="150">
                                      <template slot-scope="scope">
                                        <el-button type="primary" icon="el-icon-edit" circle @click="fetchById(scope.row.id)"></el-button>
                                         <el-button type="primary" icon="el-icon-tickets" title="Attache Roles" circle @click="redirect(scope.row.id)"></el-button>
                                        <el-button type="danger" icon="el-icon-delete" circle @click="Clickdelete(scope.row.id)" v-show="scope.row.is_disabled"></el-button>
                                      </template>
                                    </el-table-column>
                                  </el-table>
                               
                            </div>
                        </div>
                      </section>
                    </div>
                  </div>
              </div>
              @include('admin.roles.form')
@endsection

@section('script-assets')
    <script src="{{ asset('js/vue/admin/role.js') }}"></script>
@endsection