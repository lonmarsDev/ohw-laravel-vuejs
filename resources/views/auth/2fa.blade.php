@extends('layouts.app_auth')

@section('content')
    <section class="authentication-main">
        <div class="container-fluid">
            <div class="row row-no-padding">
                <div class="col-sm-6 col-sm-offset-6 col-md-6 col-md-offset-6">
                    <div class="boxmain">
                        <div class="logo"><img src="{{ asset('images/logo.png') }}" class="img-responsive img" alt="" /></div>

                        <h1>One Time Password</h1>
                        <p>Please Validate using Google Authenticator</p>

                        @if (session()->has('invalid'))
                            <div class="alert alert-danger" role="alert">
                                <strong>{{ session()->get('invalid') }}</strong>
                            </div>
                        @endif
                        <form class="formmain" method="POST" action="{{ route('auth.two_factor.validate') }}">
                            @csrf

                            <input type="hidden" name="secret_key" value="{{ $two_factor->getSecretKey() }}">
                            <img src="{{ $two_factor->getGoogleUrl() }}" alt="">
                            <div class="form-group{{ $errors->has('one_time_password') ? ' has-error' : '' }}">
                                <label for="one_time_password">One Time Password</label>
                                <input type="text" id="one_time_password" maxlength="6" class="form-control" name="one_time_password" autofocus>
                                @if ($errors->has('one_time_password'))
                                    <small class="text-danger">
                                        <strong>{{ $errors->first('one_time_password') }}</strong>
                                    </small>
                                @endif
                            </div>
                            <div class="sep"></div>
                            <button type="submit" class="btn btn01 btnhalf">Validate</button>
                            <div class="sep2"></div>


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection