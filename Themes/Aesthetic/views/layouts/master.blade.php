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
</head>
<body>
<div class="wrapper">
    @include('partials.header')
    @yield('carousel')
    @yield('content')
    @include('partials.footer')

    {{--{!! Theme::script('js/all.js') !!}--}}

    @yield('scripts')

    @if(Setting::has('core::google-analytics'))
    {!! setting('core::google-analytics') !!}
    @endif
</div>
{!! Theme::script('js/all.js') !!}
</body>
</html>
