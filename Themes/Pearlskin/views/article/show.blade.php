@extends('layouts.master')

@section('title')
    {{ $article->title }} | @parent
@stop
@section('meta')
    <meta name="title" content="{{ $article->title }}"/>
    <meta name="description" content="{{ $article->content }}"/>
@stop

@section('content')
    @include('partials.page-title',array(
        'title' => $article->title
    ))
    <div class="container content">
        <div class="row">
            {!! $article->content !!}
        </div>
    </div>
@stop
