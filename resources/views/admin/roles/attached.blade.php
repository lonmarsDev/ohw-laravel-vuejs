@extends('layouts.admin.app')
@section('content')
 <!--state overview start-->
              <div class="row">
                <div class="col-lg-12">
                      <attach-permissions id="{{$id}}"></attach-permissions> 
                </div>
                 
                  </div>
              </div>
             
@endsection

@section('script-assets')
    <script src="{{ asset('js/vue/admin/role.js') }}"></script>
@endsection