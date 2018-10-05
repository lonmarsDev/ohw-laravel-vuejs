@extends('layouts.app_auth')

@section('content')
    <section class="authentication-main">
        <div class="container-fluid">
            <div class="row row-no-padding">
                <div class="col-sm-6 col-sm-offset-6 col-md-6 col-md-offset-6">
                    <div class="boxmain">
                        <!-----Start Script----->
                        <script src="{{ asset('js/jquery-3.2.1.min.js') }}" defer></script>
                        <div class="logo"><img src="{{ asset('images/logo.png') }}" class="img-responsive img" alt="" /></div>

                        <p>Lorem ipsum dolor eset</p>
                        <a href="{{ route('register') }}" class="link text-uppercase">Create a free account</a>


                        <form class="formmain" method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="input-group">
                                <span class="input-group-addon"><img src="images/frm-icon1.png" alt="username"></span>
                                <!-- <input type="text" class="form-control" placeholder="Username"> -->
                                <input id="email" type="email" placeholder="Email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                                @if ($errors->has('email'))
                                    <small id="passwordHelp" class="text-danger">
                                      <strong>{{ $errors->first('email') }}</strong>
                                    </small>
                                @endif
                            </div>

                            <div class="input-group">
                                <span class="input-group-addon"><img src="images/frm-icon2.png" alt="password"></span>
                                <input id="password" type="password" placeholder="Password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                                @if ($errors->has('password'))
                                    <small id="passwordHelp" class="text-danger">
                                      <strong>{{ $errors->first('password') }}</strong>
                                    </small>
                                @endif
                            </div>

                            <div class="sep"></div>
                            <button type="submit" class="btn btn01 btnhalf">Log In</button>
                            <div class="sep2"></div>

                            <ul class="unstyled">
                                <li>
                                    <input type="checkbox" class="styled-checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label for="styled-checkbox-1">Keep me Logged in</label>
                                </li>
                            </ul>
                        </form>
                        <div class="sep2"></div>
                        <a href="#" class="link01 bold">Forgot Username</a> <i class="fa fa-circle frmdot"></i> <a href="{{ route('password.request') }}" class="link01 bold">Forgot Password</a>

                        <div class="sep3"></div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do<br />eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection