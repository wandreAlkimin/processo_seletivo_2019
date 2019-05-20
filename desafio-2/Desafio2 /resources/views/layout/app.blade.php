<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="" />
    <meta name="description" content="" />
    <meta name="keywords" content=""/>
    <meta name="robots" content="index, follow" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('img/favicon.png') }}">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

        <script>
        window.Laravel ={!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>

    <!--[if (gte IE 6)&(lte IE 8)]>
    <script type="text/javascript" src="selectivizr.js"></script>
    <noscript><link rel="stylesheet" href="[fallback css]" /></noscript>
    <![endif]-->

</head>
<body>
<!--[if lt IE 7]>
<p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

<!--[if IE]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->


@include('layout.topo')
<main>
    @yield('content')
</main>
@include('layout.paginacao')

<!-- Scripts -->
<script src="/js/app.js"></script>

</body>
</html>

