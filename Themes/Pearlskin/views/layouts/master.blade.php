<!DOCTYPE html>
<html>
<head lang="{{ LaravelLocalization::setLocale() }}">
    <meta charset="UTF-8">
    @section('meta')
        <meta name="description" content="{{ Setting::get('core::site-description') }}"/>
    @show
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        @section('title'){{ Setting::get('core::site-name') }}
        @show
    </title>
    <link rel="shortcut icon" href="{{ Theme::url('favicon.ico') }}">
    {!! Theme::style('css/main.css') !!}
    {!! Theme::style('vendor/Swiper/dist/css/swiper.min.css') !!}

    {!! Theme::script('vendor/jquery/dist/jquery.min.js') !!}
    {{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.1 1.0/jquery.min.js"></script>--}}
    {{--<script src="http://pixelcog.github.io/parallax.js/js/parallax.js"></script>--}}
    {!! Theme::script('vendor/parallax.js/parallax.js') !!}
    {!! Theme::script('vendor/Swiper/dist/js/swiper.min.js') !!}
    {!! Theme::script('vendor/bootstrap/dist/js/bootstrap.min.js') !!}
</head>
<body>
<div class="wrapper">
    @include('partials.header')
    @yield('carousel')
    @yield('content')
    @include('partials.footer')

    {{--{!! Theme::script('js/all.js') !!}--}}

    <script>
        var swiper = new Swiper('.swiper-container', {
            pagination: '.swiper-pagination',
            nextButton: '.swiper-button-next',
            prevButton: '.swiper-button-prev',
            paginationClickable: true,
            spaceBetween: 0,
            centeredSlides: true,
            autoplay: 4000,
            speed: 1000,
            autoplayDisableOnInteraction: false,
            effect: 'fade'
        });
    </script>
    @yield('scripts')

    <?php if (Setting::has('core::google-analytics')): ?>
    {!! Setting::get('core::google-analytics') !!}
    <?php endif; ?>
</div>
</body>
</html>
