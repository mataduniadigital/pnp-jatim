<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="theme-color" content="#3273dc">
        @stack('meta')

        <title>SNVT - PNP JATIM</title>
        <link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:100,600">
        <link type="text/css" rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link type="text/css" rel="stylesheet" href="{{asset('vendor/bulma-0.6.2/css/bulma.css')}}">
        <link type="text/css" rel="stylesheet" href="{{asset('css/my-style.css')}}">
    </head>
    <body>
    <div class="columns">
        <div class="column">
        @yield('content')
        </div>
    </div>
    </body>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
        var $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);
            if ($navbarBurgers.length > 0) {
                $navbarBurgers.forEach(function ($el) {
                    $el.addEventListener('click', function () {
                        // Get the target from the "data-target" attribute
                        var target = $el.dataset.target;
                        var $target = document.getElementById(target);

                        // Toggle the class on both the "navbar-burger" and the "navbar-menu"
                        $el.classList.toggle('is-active');
                        $target.classList.toggle('is-active');
                    });
                });
            }
        });
    </script>
    <script src="{{asset('vendor/jquery-2.2.0/jquery.min.js')}}"></script>
    <script src="{{asset('vendor/sweetalert2-7.16.0/sweetalert2.js')}}"></script>
    @if(Session::has('error-msg'))
    <script>
        $(window).load(function(){
            swal('Error!', '{{Session::get('error-msg')}}', 'error')
        });
    </script>
    @endif
    @if(Session::has('success-msg'))
    <script>
        $(window).load(function(){
            swal('Success!', '{{Session::get('success-msg')}}', 'success')
        });
    </script>
    @endif
    @stack('scripts')
</html>
