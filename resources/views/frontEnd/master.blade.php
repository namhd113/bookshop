
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Anime Template">
    <meta name="keywords" content="Anime, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    @toastr_css
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@300;400;500;600;700;800;900&display=swap"
          rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-
     alpha/css/bootstrap.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
{{--    <link rel="stylesheet" type="text/css"--}}
{{--          href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">--}}

{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>--}}
<!-- Css Styles -->
    <link rel="stylesheet" href="{{asset('/frontEnd/css/bootstrap.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('/frontEnd/css/font-awesome.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('/frontEnd/css/elegant-icons.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('/frontEnd/css/plyr.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('/frontEnd/css/nice-select.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('/frontEnd/css/owl.carousel.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('/frontEnd/css/slicknav.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('/frontEnd/css/style.css')}}" type="text/css">
    <style>
        header{
            position: fixed;
            width: 100%;
            z-index: 100;
        }
        .owl-stage{
            margin-top: 40px !important;
        }
    </style>
    @yield('CSS')
</head>

<body>

<!--toastr message -->
{{--<script>--}}
{{--    @if(Session::has('message'))--}}
{{--        toastr.options =--}}
{{--        {--}}
{{--            "closeButton" : true,--}}
{{--            "progressBar" : true--}}
{{--        }--}}
{{--    toastr.success("{{ session('message') }}");--}}
{{--    @endif--}}

{{--        @if(Session::has('error'))--}}
{{--        toastr.options =--}}
{{--        {--}}
{{--            "closeButton" : true,--}}
{{--            "progressBar" : true--}}
{{--        }--}}
{{--    toastr.error("{{ session('error') }}");--}}
{{--    @endif--}}

{{--        @if(Session::has('info'))--}}
{{--        toastr.options =--}}
{{--        {--}}
{{--            "closeButton" : true,--}}
{{--            "progressBar" : true--}}
{{--        }--}}
{{--    toastr.info("{{ session('info') }}");--}}
{{--    @endif--}}

{{--        @if(Session::has('warning'))--}}
{{--        toastr.options =--}}
{{--        {--}}
{{--            "closeButton" : true,--}}
{{--            "progressBar" : true--}}
{{--        }--}}
{{--    toastr.warning("{{ session('warning') }}");--}}
{{--    @endif--}}
{{--</script>--}}
<!-- Page Preloder -->
<div id="preloder">
    <div class="loader"></div>
</div>

<!-- Header Section Begin -->

@include('frontEnd.layouts.nav')
<!-- Header End -->

<!-- Hero Section Begin -->
@yield('slider')
{{--    @include('frontEnd.layouts.slider')--}}
<!-- Hero Section End -->

<!-- Product Section Begin -->
@yield('content')
<!-- Product Section End -->

<!-- Footer Section Begin -->

<!-- Footer Section End -->

<!-- Search model Begin -->

<!-- Search model end -->

<!-- Js Plugins -->
<script src="{{asset('/frontEnd/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('/frontEnd/js/bootstrap.min.js')}}"></script>
<script src="{{asset('/frontEnd/js/player.js')}}"></script>
<script src="{{asset('/frontEnd/js/jquery.nice-select.min.js')}}"></script>
<script src="{{asset('/frontEnd/js/mixitup.min.js')}}"></script>
<script src="{{asset('/frontEnd/js/jquery.slicknav.js')}}"></script>
<script src="{{asset('/frontEnd/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('/frontEnd/js/main.js')}}"></script>
@yield('js')

</body>

</html>
