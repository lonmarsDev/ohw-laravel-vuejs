@extends('layouts.ohwo')



<style type="text/css">
    .modal .modal-header {
        background: #f2f2f2;
    }
    .modal p {
        font-size: 14px;
        line-height: 20px;
    }
    .modal span {
        font-size: 12px;
        color: #aaa;
        font-weight: 600;
    }
    .modal label {
        font-size: 14px;
        color: #666;
        margin-bottom: 10px;
    }
    .modal .modal-header .close {
        background: #000;
        border-radius: 100%;
        height: 25px;
        width: 25px;
        text-align: center;
    }
    .modal .content {
        padding: 10px 0 50px 0;
        min-height: 200px;
    }
    .modal .alert {
        font-size: 14px;
    }
    .modal span.text-danger {
        color: #a94442
    }
    #authenticationModal .alert-danger {
        background: #eee;
        border: none;
    }
    .modal p strong {
        font-size: 13px;
        color: #666;
    }
</style>

@section('content')

<section class="mainsection">
    <div class="container-fluid">
        <div class="row row-no-padding">


        <div class="col-sm-4 col-md-3 col-lg-2">
               @include('partials.left_sidebar', ['ActiveMenu'=>'domain', 'user'=>$user])
        </div>


            <template>

                <div class="col-sm-8 col-md-9 col-lg-10" v-loading="loading2"
                          element-loading-text="Loading..."
                          element-loading-spinner="el-icon-loading"
                          element-loading-background="rgba(0, 0, 0, 0.8"
                          >

                <div class="rightmenumain">
                  <div class="titlemain">
                      <h2>Company Name</h2>
                      <!--<div class="right">ccs</div>-->
                  </div>
                </div>


                <template v-if="domain_data.length >0">
                <!-- if has domains   -->
                  <div class="containbox" >
                    <h2 class="line">Verified Domains <div class="right"><a class="btn btn1 btnsm" data-toggle="modal" data-target="#domainModal">verified domain</a></div></h2>

                    <!-- loop -->
                    <div class="databoxone" v-for="domain in domain_data"  :key="domain.id">
                        <input type="hidden" name="successMessage" id="successMessage" v-model="domain.successMessage">
                        <h4>@{{domain.domain}}<div class="right"><a class="btn btn2 btnsm" v-on:click="RemoveDomain(domain.id, domain.domain)">remove</a></div></h4>

                        <p v-if="domain.verified==0">
                          <b>Verification pending: </b>
                          A verification email was sent to @{{domain.email}} on @{{domain.updated_at}}.
                          <a v-on:click="VerifyDomain(domain.id, domain.domain)" class="btn" id="enter">
                            Enter Code
                          </a>
                          <a  v-on:click="SendNewVerificationEmail(domain.id, domain.domain , domain.email)"  class="btn" id="Resend" >Resend Email</a>
                        </p>

                        <p v-if="domain.verified==1"><b>Verification:</b> @{{domain.domain}} is verified for sending</p>

                        <p v-if="domain.authenticated==0"><b>Authentication:</b> Customize your account so that campaigns appear to come from @{{domain.domain}} <a v-on:click="AuthenticationDomain(domain.id, domain.domain)" class="link02 bold btn">View setup instructions</a></p>
                        <p  v-if="domain.authenticated==1"><b>Authentication:</b> @{{domain.domain}} is authenticated with valid DKIM and SPF records.<a data-toggle="modal" data-target="#authenticationModal" class="link02 bold btn">View setup instructions</a><a data-toggle="modal" data-target="#disableAuthentication" class="link02 bold btn">Disable authentication</a></p>

                    </div>
                  </div>

                </template>
                <template v-else>
                  <div class="containbox">
                    <h2>Verified Domains</h2>

                    <div class="nodata-boxone">
                        <div class="nodata-boxoneimg"><img src="{{ asset('dist/images/nodata-img1.png') }}" class="img-responsive img"></div>

                        <h4>You haven't verified a domain yet</h4>
                        <p>Before you can send campaigns with a From email address like you@yourdomain.com,<br />You'll need to verify that you have access to an email address at that domain. <a href="#" class="link02 bold">Learn more.</a></p>

                        <a href="#" class="btn btn1" data-toggle="modal" data-target="#domainModal">verify a domain</a>


                    </div>
                  </div>
                </template>

                  <!-- add domain Modal -->
                          <div class="modal fade" id="domainModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                              <form name="registerDomain" id="registerDomain" v-on:submit.prevent="AddDomain">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">×</button>
                                    <h4 class="modal-title text-center">Verify Domain</h4>
                                  </div>
                                  <div class="modal-body" id="domain-modal-body" v-loading="submittingAdd"
                                                              element-loading-text="Loading..."
                                                              element-loading-spinner="el-icon-loading"
                                                              element-loading-background="rgba(0, 0, 0, 0.8">
                                      <div class="container-fluid">

                                          <p>We need to verify that you have access to an email address at the domain you plan to send campaigns from. Enter an address, and we'll send you a verification email. Learn more.</p>
                                          <div class="form-group">
                                              <label>Email address</label>
                                              <input type="email" class="form-control" data-email="" v-model="email_address" v-bind:placeholder="email_address"  name="email" id="email">
                                              <span>Enter an address that contains the domain you want to verify.</span>
                                          </div>

                                      </div>
                                  </div>
                                  <div class="modal-footer">
                                      <button type="submit" class="btn btn-default" id="verifyBtn">Send Verification Email</button>
                                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                  </div>
                                </div>
                              </form>
                            </div>
                          </div>
                          <!--end of modal-->
                          <!-- Verification domain Modal -->
                          <div id="verificationModal" class="modal fade" role="dialog"  >
                            <div class="modal-dialog">

                              <form name="verifyDomain" id="verifyDomain" v-on:submit.prevent="DoVerifyDomain">
                              <!-- Modal content-->
                              <div class="modal-content">
                                  <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                      <h4 class="modal-title text-center">Verify Domain</h4>
                                  </div>

                                  <div class="modal-body" v-loading="submittingVerify"
                                                              element-loading-text="Loading..."
                                                              element-loading-spinner="el-icon-loading"
                                                              element-loading-background="rgba(0, 0, 0, 0.8">
                                      <div class="content">
                                          <div class="form-group">
                                              <label>Enter Verification Code</label>
                                              <input type="text" class="form-control" name="code" v-model="verification_code" id="code">
                                          </div>
                                      </div>
                                      <div id="verify_domain_error"></div>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="submit" class="btn btn-default" id="verify">Verify</button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal" id="verifCancel">Cancel</button>
                                    
                                  </div>
                              </div>
                              </form>
                            </div>
                          </div>
                          <!--end of Verification modal-->
                          <!-- Remove Modal -->
                          <div id="removeModal" class="modal fade" role="dialog">
                              <div class="modal-dialog">
                                  <div class="modal-content">
                                      <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title text-center">Are you sure</h4>
                                      </div>

                                      <div class="modal-body" v-loading="submittingRemove"
                                                              element-loading-text="Loading..."
                                                              element-loading-spinner="el-icon-loading"
                                                              element-loading-background="rgba(0, 0, 0, 0.8">
                                        <div class="">
                                          <p>If you remove @{{selected_domain_name}} from your verified domains, you can't use it in your From email address or campaign URLs.</p>
                                        </div>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="submit" class="btn btn-default" v-on:click="DoRemoveDomain()">Remove Domain</button>
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <!-- Remove Modal -->
                          <!-- Authentication Modal -->
                          <div id="authenticationModal" class="modal fade" role="dialog">
                              <div class="modal-dialog">
                                  <form name="authenticateDomain" id="authenticateDomain">
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title text-center">Domain Authentication</h4>
                                        </div>

                                        <div class="modal-body" v-loading="submittingAuth"
                                                              element-loading-text="Loading..."
                                                              element-loading-spinner="el-icon-loading"
                                                              element-loading-background="rgba(0, 0, 0, 0.8">
                                            <div class="content">

                                                <p>Authenticate @{{selected_domain_name}} with OHWO by modifying your domain's DNS records. These changes allow your campaigns to appear to come from ohwo.com, instead of from our servers. After you've made the required DNS changes, please wait 24-48 hours for the changes to propogate. Why should I do this?</p>

                                                <p><strong>DKIM: Create a CNAME record for K1._domainkey.@{{selected_domain_name}} with this value:</strong></p>
                                                <div class="alert alert-danger">
                                                    dkim.ohsv.net
                                                </div>
                                                <p><strong>SPF: Create a TXT record for @{{selected_domain_name}} with:</strong></p>
                                                <div class="alert alert-danger">
                                                    v=spf1 include:servers.ohsv.net ?all
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-default authentication" id="authentication">Authenticate Domain</button>
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                        </div>
                                    </div>
                                  </form>
                              </div>
                          </div>
                          <!-- End of Authentication Modal -->


                    </div>

            </template>
    <!-- end of vuejs templating -->
        </div>
    </div>
</section>







@endsection

@section('script-assets')
    <script src="{{ asset('js/vue/settings/verify_domain.js') }}"></script>
@endsection