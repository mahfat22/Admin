<!doctype html>
<html lang="{{app()->getLocale()}}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="">

    <title> Admin </title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('public/css/bootstrap.min.css')}}" rel="stylesheet">
    @if( app()->getLocale() == "ar" )
        <link href="{{asset('public/css/rtl.css')}}" rel="stylesheet">
    @endif
    <link href="{{asset('public/css/style.css')}}" rel="stylesheet">

    @yield('style')

</head>

<body>

@include('layouts.header')

<!-- Begin page content -->
<main class="main">
    <div class="container">
        <div class="row">
            @yield('content')
        </div>
    </div>
</main>

@include('layouts.footer')

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>

<script src="{{asset('public/js/bootstrap.min.js')}}"></script>
<script src="{{asset('public/js/script.js')}}"></script>

@yield('script')
</body>
</html>
