<!-- header start -->
<header class="headermain">

    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="row">    
                <div class="col-xs-1 navbar-header pull-right">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>                    
                </div>

                <div class="col-xs-4 col-md-3 col-lg-2 logo-holder">
                    <a class="" href="{{ url('/') }}"><img src="{{ asset('dist/images/logo.png') }}" width="180" class="img-responsive img" alt="" /></a>
                </div>

                <div class="col-xs-12 col-md-9 col-lg-10">
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav manuleft">
                            <li class="active"><img src="{{ asset('dist/images/menuicon1.png') }}" class="img-responsive img" alt="" /><a href="#">Statistics</a></li>
                            <li><img src="{{ asset('dist/images/menuicon2.png') }}" class="img-responsive img" alt="" /><a href="#">address book</a></li>
                            <li><img src="{{ asset('dist/images/menuicon3.png') }}" class="img-responsive img" alt="" /><a href="{{ route('emnel3000.lab.index') }}">launch lab</a></li>
                            <li><img src="{{ asset('dist/images/menuicon4.png') }}" class="img-responsive img" alt="" /><a href="#">send an email</a></li>
                        </ul>

                        <ul class="nav navbar-nav navbar-right">
                            <li><img src="{{ asset('dist/images/menuricon1.png') }}" class="img-responsive img" alt="" /><a href="#">notification</a></li>
                            <li class="button"><img src="{{ asset('dist/images/menuricon2.png') }}" class="img-responsive img" alt="" /><a href="#">more</a></li>
                        </ul>
                    </div>
                </div>
                
            </div>     
        </div>
    </nav>



</header>