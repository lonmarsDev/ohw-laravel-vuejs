@extends('layouts.ohwo')
@section('content')
<section class="mainsection">
    <div class="container-fluid">
        <div class="row row-no-padding">

            <div class="col-sm-4 col-md-3 col-lg-2">
                @include('emnel3000.partials.emnel3000_left_sidebar', ['ActiveMenu'=>'home'])
            </div>
            <div class="col-sm-8 col-md-9 col-lg-10">
                <div class="jumbotron text-center">
                    <span class="emnel-3000-welcome-header">Welcome to your <strong>EMNEL 3000</strong></span>
                    <p class="emnel-3000-welcome-subheader">Let's create some EMNEL LABS!</p>
                    {{-- <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a></p> --}}
                    <div class="row emnel-action-buttons">
                        <div class="col-md-4">
                            <a href="" class="btn btn1"><i class="fa fa-plus"></i> LAB FROM SCRATCH</a>
                        </div>
                        <div class="col-md-4">
                            <a href="" class="btn btn2"><i class="fa fa-upload"></i> UPLOAD LAB</a>
                        </div>
                        <div class="col-md-4">
                            <a href="" class="btn btn1"><i class="fa fa-shopping-cart"></i> LAB MARKETPLACE</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('header-assets')
<style>
    .jumbotron {
        background: #fff;
        height: 78vh;
    }
    .emnel-3000-welcome-header {
        font-size: 24pt;
        text-transform: uppercase;
        text-rendering: geometricPrecision;
        font-weight: 300;
    }
    .emnel-3000-welcome-subheader {
        font-size: 18pt !important;
        font-weight: 300 !important;
        margin-top: 20px;
    }
    .emnel-action-buttons {
        margin-top: 50px;
    }
</style>
@endsection