<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}"> <!-- CSRF Token protects website from cross-site request forgeries -->

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" type="text/css" rel="stylesheet">
</head>
<body>
    <div id="app">
        @include('include.navbar')
        <div class="container">
            @include('include.messages')
            @yield('content')
        </div>
        @include('include.footer')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="../../vendor/unisharp/laravel-ckeditor/ckeditor.js"></script> <!-- Extra extension to provide a user friendly form body for blog post creations -->
    <script>
        CKEDITOR.replace( 'article-ckeditor' );
    </script>
<script>
    $('body>.container').height(
      $(window).height()-
      $('body>.container-fluid').height()-
      $('body>footer').height()
    );
  </script> <!-- Ensures that footer always remains at the bottom of the page -->


</body>
</html>
