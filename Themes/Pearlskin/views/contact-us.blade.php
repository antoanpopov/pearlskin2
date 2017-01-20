@extends('layouts.master')

@section('title')
    {{ $page->title }} | @parent
@stop
@section('meta')
    <meta name="title" content="{{ $page->meta_title}}"/>
    <meta name="description" content="{{ $page->meta_description }}"/>
@stop

@section('content')
    @include('partials.page-title',array(
        'title' => $page->title
    ))
    {!! Breadcrumbs::render('page',$page) !!}
    <div class="container content">
        <div class="col-lg-6 col-xs-12">
            <h1 class="m-n font-thin h3 text-black">{{ $page->title }}</h1>
            @foreach($addresses as $address)
                <div class="row">
                    <div class="col-sm-12">
                        <div style="height: 300px; margin-bottom: 20px;">
                            <div id="map-{{$address->id}}" style="height: 100%;"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-xs-12">
                        <div>
                            <span class="fa fa-map-marker color-primary"></span>
                            {{ $address->address_line_1 }}
                            {{ $address->address_line_2 }}
                        </div>
                        <div>
                            <span class="fa fa-clock-o color-primary"></span>
                            Пон. - Петък 10:00 - 18:00
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-6">
                        <div>
                            <span class="fa fa-envelope color-primary"></span>
                            <a href="mailto:{{ $address->email }}"
                               data-url="mailto:{{ $address->email }}"
                               data-action="mailTo"
                               class="color-primary">
                                {{ $address->email }}
                            </a>
                        </div>
                        <div>
                            <span class="fa fa-phone color-primary"></span>
                            <span>{{ trans('pearlskin::common.form.stationary_phone') }}</span>: {{ $address->stationary_phone }}
                        </div>
                        <div>
                            <span class="fa fa-mobile-phone color-primary"></span>
                            <span>{{ trans('pearlskin::common.form.mobile_phone') }}</span>: {{ $address->mobile_phone }}
                        </div>
                    </div>
                </div>

                <script>
                    function initMap() {

                        var geocoder = new google.maps.Geocoder(),
                            map = new google.maps.Map(document.getElementById('map-{{$address->id}}'), {zoom: 16}),
                            address = "{{ $address->address_line_1 }} {{ $address->address_line_2 }}";

                        geocoder.geocode({'address': address}, function (results, status) {
                            if (status === google.maps.GeocoderStatus.OK) {
                                map.setCenter(results[0].geometry.location);
                                var marker = new google.maps.Marker({
                                    map: map,
                                    animation: google.maps.Animation.DROP,
                                    position: results[0].geometry.location
                                });
                            } else {
                                alert('Geocode was not successful for the following reason: ' + status);
                            }
                        });
                    }
                </script>
            @endforeach
        </div>
        {!! Form::open(['route' => ['contact_us.ask_question'], 'method' => 'post','class' => 'col-lg-6 col-sm-12 col-xs-12']) !!}
        <div class="col-sm-12">
            <h1 class="m-n font-thin h3 text-black">{{ trans('pearlskin::common.labels.get in touch') }}</h1>
        </div>
        <div class="col-sm-12">
            <div class='input-group {{ $errors->has("name") ? ' has-error' : '' }}'>
                <span class="input-group-addon">
                    <i class="fa fa-user"></i>
                </span>
                {!! Form::text("name", old("emailMessage.name"), ['class' => 'form-control', 'placeholder' => trans('pearlskin::common.form.name')]) !!}
            </div>
            <div class='{{ $errors->has("name") ? ' has-error' : '' }}'>
                {!! $errors->first("name", '<span class="help-block">:message</span>') !!}
            </div>
        </div>
        <div class="col-sm-12">
            <div class='input-group {{ $errors->has("email") ? ' has-error' : '' }}'>
                <span class="input-group-addon">
                    <i class="fa fa-envelope"></i>
                </span>
                {!! Form::text("email", old("emailMessage.email"), ['class' => 'form-control', 'placeholder' => trans('pearlskin::common.form.email')]) !!}
            </div>
            <div class='{{ $errors->has("email") ? ' has-error' : '' }}'>
                {!! $errors->first("email", '<span class="help-block">:message</span>') !!}
            </div>
        </div>
        <div class="col-sm-12">
            <div class='input-group {{ $errors->has("phone") ? ' has-error' : '' }}'>
                <span class="input-group-addon">
                    <i class="fa fa-phone"></i>
                </span>
                {!! Form::text("phone", old("emailMessage.name"), ['class' => 'form-control', 'placeholder' => trans('pearlskin::common.form.phone')]) !!}
            </div>
            <div class='{{ $errors->has("phone") ? ' has-error' : '' }}'>
                {!! $errors->first("phone", '<span class="help-block">:message</span>') !!}
            </div>
        </div>
        <div class="col-sm-12">
            <div class="{{ $errors->has("message") ? ' has-error' : '' }}">
                {!! Form::textarea('message', old('message', null),['class' => 'form-control', 'rows' => '10', 'placeholder' => trans('pearlskin::common.form.message'), 'cols' => 10]) !!}
            </div>
            <div class='{{ $errors->has("message") ? ' has-error' : '' }}'>
                {!! $errors->first("message", '<span class="help-block">:message</span>') !!}
            </div>
        </div>
        <div class="col-sm-12">
            <button type="submit"
                    class="btn">{{ trans('pearlskin::common.buttons.send_request') }}</button>
        </div>

        {!! Form::close() !!}
    </div>

@stop
@section('scripts')
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA0iCIxV8GEZ-FnHs7jjoENrjWhg2xbnkA&callback=initMap"
            async defer></script>
@endsection
