<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="token" content="{{csrf_token()}}">
        <meta name="theme-color" content="#00d1b2">
        @stack('meta')

        <title>SNVT - PNP JATIM</title>
        <link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:100,600">
        <link type="text/css" rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link type="text/css" rel="stylesheet" href="{{asset('vendor/bulma-0.6.2/css/bulma.css')}}">
    </head>
    <body>
    <div class="columns">
        <div class="column">
        @yield('content')
        </div>
    </div>
    </body>
    
    @stack('scripts')
</html>
