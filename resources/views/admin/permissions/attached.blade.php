@extends('layouts.admin.app')
@section('content')
 <!--state overview start-->
              <div class="row">
                <div class="col-lg-12">
                      <attach-roles id="{{$id}}"></attach-roles> 
                </div>
                 
                  </div>
              </div>
             
@endsection

@section('script-assets')
    <script src="{{ asset('js/vue/admin/permissions.js') }}"></script>
@endsection