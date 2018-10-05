
@extends('layouts.ohwo')

@section('content')

<section class="mainsection">
    <div class="container-fluid">
        <div class="row row-no-padding">

            <div class="col-sm-4 col-md-3 col-lg-2">
                @include('partials.left_sidebar', ['ActiveMenu'=>'home'])
            </div>

            
        </div>
    </div>
</section>
        
@endsection
