<header class="header
            @if(Request::route()->getName() === 'homepage')
        header-fixed-top header-transparent
    @endif">
    <div class="container">
        <nav class="nav">
            <a class="navbar-brand" href="{{ URL::to('/'.locale()) }}"><span>PEARL</span>SKIN</a>
            {!! Menu::render('main') !!}
            {{--<li class="dropdown">--}}
                {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown">--}}
                    {{--<span>--}}
                        {{--{{ LaravelLocalization::getCurrentLocaleName()  }}--}}
                        {{--<i class="caret"></i>--}}
                    {{--</span>--}}
                {{--</a>--}}
                {{--<ul class="dropdown-menu language-menu">--}}
                    {{--@foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)--}}
                        {{--<li class="{{ App::getLocale() == $localeCode ? 'active' : '' }}">--}}
                            {{--<a rel="alternate" lang="{{$localeCode}}" href="{{LaravelLocalization::getLocalizedURL($localeCode) }}">--}}
                                {{--{!! $properties['native'] !!}--}}
                            {{--</a>--}}
                        {{--</li>--}}
                    {{--@endforeach--}}
                {{--</ul>--}}
            {{--</li>--}}
            {{--<li class="dropdown">--}}
            {{--<a href="#" class="dropdown-toggle"--}}
            {{--data-toggle="dropdown" r--}}
            {{--ole="button"--}}
            {{--aria-haspopup="true"--}}
            {{--aria-expanded="false">Dropdown--}}
            {{--<span class="caret"></span>--}}
            {{--</a>--}}
            {{--<ul class="dropdown-menu">--}}
            {{--@foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)--}}
            {{--<li class="{{ App::getLocale() == $localeCode ? 'active' : '' }}">--}}
            {{--<a rel="alternate" lang="{{$localeCode}}"--}}
            {{--href="{{LaravelLocalization::getLocalizedURL($localeCode) }}">--}}
            {{--{!! $properties['native'] !!}--}}
            {{--</a>--}}
            {{--</li>--}}
            {{--@endforeach--}}
            {{--</ul>--}}
            {{--</li>--}}
        </nav>
    </div>
</header>
<script>
    $(window).scroll(function() {
        var scroll = $(window).scrollTop();
        //>=, not <=
        if (scroll >= 500) {
            //clearHeader, not clearheader - caps H
            $(".header-fixed-top").removeClass("header-transparent");
        } else {
            $(".header-fixed-top").addClass("header-transparent");
        }
    }); //missing );
</script>