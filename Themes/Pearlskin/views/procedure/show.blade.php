@extends('layouts.master')

@section('title')
    {{ $procedure->title }} | @parent
@stop
@section('meta')
    <meta name="title" content="{{ $procedure->title }}"/>
    <meta name="description" content="{{ $procedure->description }}"/>
@stop

@section('content')
    @include('partials.page-title',array(
        'title' => $procedure->title,
        'image' => $procedure->files()->where('zone', 'image')->get()[0]->path->getUrl()
    ))
    <div class="container content">
        <div class="row">
            <div class="col-md-9 col-xs-12">
                {!! $procedure->description !!}
            </div>
            <div class="col-md-3 col-xs-12">
                <aside>
                    @include('widgets.procedures')
                </aside>
            </div>
        </div>
    </div>
@stop
