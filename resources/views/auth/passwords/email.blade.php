@extends('layouts.app_auth')

@section('content')
    <section class="authentication-main">
        <div class="container-fluid">
            <div class="row row-no-padding">
                <div class="col-sm-6 col-sm-offset-6 col-md-6 col-md-offset-6">
                    <div class="boxmain">
                        <div class="logo"><img src="{{ asset('images/logo.png') }}" class="img-responsive img" alt="" /></div>

                        <div class="test24 bold">Reset your password</div>
                        <div class="sep1"></div>
                        <p>Lorem ipsum dolor sit amet,  consectetur adipiscing elit</p>
                        <a href="#" class="link">ACCOUNT RECOVERY</a>
                        <div class="sep3"></div>

                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form class="formmain" method="POST" action="{{ route('password.email') }}">
                            @csrf
                            <div class="input-group">
                                <span class="input-group-addon"><img src="{{ asset('images/frm-icon1.png') }}" alt="username"></span>
                                <!-- <input type="text" class="form-control" placeholder="Username"> -->
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <small id="passwordHelp" class="text-danger">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </small>
                                @endif
                            </div>

                            <button type="submit" class="btn btn01 btnfull">RESET PASSWORD</button>


                        </form>

                        <div class="sep"></div>
                        <a href="{{ route('login') }}" class="link">RETURN TO LOGIN</a>

                        <div class="sep4"></div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do<br />eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection