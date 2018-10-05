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
                <br/>
               <h1>Unauthorized Access</h1>

            </div>


    </div>
</section>

   


@endsection

