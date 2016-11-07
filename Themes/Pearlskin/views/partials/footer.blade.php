<footer>
    {{--<div class="template-wrapper">--}}
    {{--<img src="public/assets/img/articles/img3.jpg"--}}
    {{--alt="Pearlskin footer"--}}
    {{--class="footer-image"/>--}}
    {{--<div class="footer-text">--}}
    {{--<p><% article_footer.texts[$root.langCode].title </p>--}}
    {{--<p ng-bind-html="article_footer.texts[$root.langCode].content"></p>--}}
    {{--</div>--}}
    {{--</div>--}}
    <div class="footer-main">
        <div class="container">
            <div class="col-sm-12 col-md-4 footer-widget">
                <h5 class="widget-heading">{{ trans('pearlskin::common.labels.about us') }}</h5>
                <div class="widget-text">
                    Клиника за естетична дерматология Pearl Skin - Варна е основана като модерен лазерен център. Той е оборудван с лазер Nd-YAG от последно поколение на американската компания CUTERA и прилага уникалната патентована система TITAN на CUTERA.
                </div>
            </div>
            @if($addresses)
                <div class="col-sm-12 col-md-4 footer-widget">
                        <h5 class="widget-heading">{{ trans('pearlskin::common.labels.find us here') }}</h5>
                    <div class="widget-text">
                        @foreach($addresses as $address)
                            <p>{{ $address->address_line_1  }}, {{ $address->address_line_2 }}</p>
                            <p>
                                <span>{{ trans('pearlskin::common.form.stationary_phone') }}</span>: {{ $address->stationary_phone }}
                                </br>
                                <span>{{ trans('pearlskin::common.form.mobile_phone') }}</span>: {{ $address->mobile_phone }}
                            </p>
                            <p>
                                <a href="mailto:{{ $address->email }}"
                                   data-url="mailto:{{ $address->email }}"
                                   data-action="mailTo"
                                   class="color-primary">
                                    {{ $address->email }}
                                </a>
                            </p>
                        @endforeach
                    </div>
                </div>
            @endif
            <div class="col-sm-12 col-md-4">

            </div>
            <div class="col-sm-12 col-md-4">

            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <p class="copyright">© 2016 Pearlskin</p>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <p class="custom-text">
                        {{ trans("design and development") }} <a href="http://antoanpopov.com"
                                                                 title="Antoan Popov">Antoan Popov</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>
