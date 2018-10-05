@extends('layouts.app_auth')

@section('content')
    <section class="authentication-main">
        <div class="container-fluid">
            <div class="row row-no-padding">
                <div class="col-sm-6 col-sm-offset-6 col-md-6 col-md-offset-6">
                    <div class="boxmain">
                        <div class="logo"><img src="images/logo.png" class="img-responsive img" alt="" /></div>


                        <form class="formmain" method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="input-group">
                                <span class="input-group-addon"><img src="{{ asset('images/frm-icon1.png') }}" alt="company_name"></span>
                                <input id="company_name" type="text" class="form-control{{ $errors->has('company_name') ? ' is-invalid' : '' }}" name="company_name" value="{{ old('name') }}" placeholder="Company Name" required autofocus>

                                @if ($errors->has('name'))
                                    <small id="passwordHelp" class="text-danger">
                                        <strong>{{ $errors->first('company_name') }}</strong>
                                    </small>
                                @endif
                            </div>
                            <div class="input-group">
                                <span class="input-group-addon"><img src="{{ asset('images/frm-icon1.png') }}" alt="name"></span>
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" placeholder="Name" required autofocus>

                                @if ($errors->has('name'))
                                    <small id="passwordHelp" class="text-danger">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </small>
                                @endif
                            </div>

                            <div class="input-group">
                                <span class="input-group-addon"><img src="{{ asset('images/frm-icon1.png') }}" alt="email"></span>
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="email" required>

                                @if ($errors->has('email'))
                                    <small id="passwordHelp" class="text-danger">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </small>
                                @endif
                            </div>

                            <div class="input-group">
                                <span class="input-group-addon"><img src="{{ asset('images/frm-icon2.png') }}" alt="password"></span>
                                <input id="password" type="password" placeholder="Password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <small id="passwordHelp" class="text-danger">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </small>
                                @endif
                            </div>

                            <div class="input-group">
                                <span class="input-group-addon"><img src="{{ asset('images/frm-icon2.png') }}" alt="password"></span>
                                <!-- <input type="password" class="form-control" placeholder="Password"> -->
                                <input id="password-confirm" type="password" placeholder="Confirm-Password" class="form-control" name="password_confirmation" required>
                            </div>

                            <div class="sep"></div>
                            <button type="submit" class="btn btn01 btnhalf">Sign Up</button>
                        </form>

                        <div class="sep4"></div>
                        <div class="test24 bold">Get started with a free account</div>

                        <div class="sep3"></div>
                        <p>Lorem ipsum dolor eset</p>
                        <a href="#" class="link">SIGN UP NOW</a>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection