<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login | {{ config('app.name', 'Laravel') }}</title>

  <meta name="csrf-token" content="{{ csrf_token() }}"> 

  <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">

  <link rel="stylesheet" href="{{ asset('css/font-awesome.css') }}">
  <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">

  <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:400,600,700" rel="stylesheet">
</head>


<body>

    @yield('content')

<!-----Start Script----->
<script src="{{ asset('js/jquery-3.2.1.min.js') }}" defer></script>
<script src="{{ asset('js/bootstrap.min.js') }}" defer></script>
</body>
</html>
