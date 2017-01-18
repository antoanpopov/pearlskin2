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
        {!! $page->body !!}
        {{--@foreach($contentBlocks->getContentBlocksByPageAndPosition($page->id, 'content-middle' , 3) as $block)--}}
            {{--@include('partials.thumbnail',array(--}}
            {{--'block' => $block--}}
            {{--))--}}
        {{--@endforeach--}}
    </div>

@stop
