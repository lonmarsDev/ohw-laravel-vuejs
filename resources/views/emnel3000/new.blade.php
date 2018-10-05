@extends('layouts.ohwo')
@section('content')
<section class="mainsection">
    <div class="container-fluid">
        <div class="row row-no-padding">

            <div class="col-sm-4 col-md-3 col-lg-2">
                @include('emnel3000.partials.emnel3000_left_sidebar', ['ActiveMenu'=>'new'])
            </div>
            <div class="col-sm-8 col-md-9 col-lg-10" id="emnel3000">
                <emnel-3000></emnel-3000>
            </div>
        </div>
    </div>
</section>
@endsection
@section('script-assets')
    <script src="{{ asset('js/emnel3000/emnel3000.js') }}"></script>
@endsection