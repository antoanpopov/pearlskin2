@extends('layouts.master')

@section('title')
    {{ $doctor->names }} | @parent
@stop
@section('meta')
    <meta name="title" content="{{ $doctor->names }}"/>
    <meta name="description" content="{{ $doctor->description }}"/>
@stop

@section('content')
    {!! Breadcrumbs::render('doctor',$doctor) !!}
    <div class="container content">
        <div class="row">
            <div class="col-md-9 col-xs-12">
                @include('partials.subpage-title',array(
                    'title' => $doctor->names,
                    'image' => $doctor->files()->where('zone', 'image')->get()[0]->path->getUrl(),
                ))
                {!! $doctor->description !!}
            </div>
            <div class="col-md-3 col-xs-12">
                <aside>
                    @include('widgets.doctors')
                </aside>
            </div>
        </div>
    </div>
@stop
