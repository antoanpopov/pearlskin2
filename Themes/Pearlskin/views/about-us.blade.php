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
    <div class="container content">
        <div class="col-md-9 col-sm-12">
            {!! $page->body !!}
        </div>
        <aside class="col-md-3 hidden-sm hidden-xs">
            @include('widgets.doctors')
        </aside>
    </div>
@stop
