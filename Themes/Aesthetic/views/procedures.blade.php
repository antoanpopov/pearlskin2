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
        {!! Breadcrumbs::render('page',$page) !!}
        <div class="col-md-9 col-sm-12">
            <div class="row">
                @foreach($procedures as $procedure)
                    <figure class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <div class="thumbnail">
                            <div class="thumbnail-image-container">
                                @if(count($procedure->files()->where('zone', 'image')->get()))
                                    <img src="{{ Imagy::getThumbnail($procedure->files()->where('zone', 'image')->get()[0]->path, 'mediumThumb') }}"
                                         alt="{{ $procedure->title }}"/>
                                @else
                                    <img src=""
                                         alt="{{ $procedure->title }}"/>
                                @endif
                            </div>
                            <div class="thumbnail-caption">
                                <div class="thumbnail-bump"></div>
                                <div class="thumbnail-icon">
                                    <i class="fa fa-cog"></i>
                                </div>
                                <h5 class="thumbnail-title">
                                    {{ $procedure->title }}
                                </h5>
                                <div class="thumbnail-action">
                                    <a href="{{ route('procedure', $procedure->title) }}"
                                       class="btn">
                                        {{ trans('pearlskin::common.labels.read more') }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </figure>
                @endforeach
            </div>
        {!! $procedures->render() !!}
        </div>
        <aside class="col-md-3 hidden-sm hidden-xs">
            @include('widgets.procedures')
        </aside>
    </div>
@stop
