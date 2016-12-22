@extends('layouts.master')

@section('title')
    Blog posts | @parent
@stop
@section('content')
    @include('partials.page-title',array(
            'title' => 'Blog'
    ))
    <div class="container content">
        <div class="col-md-9 col-sm-12">

            <?php if (isset($posts)): ?>
            <div class="row">
                <?php foreach($posts as $post): ?>
                <a href="{{ URL::route($currentLocale . '.blog.slug', [$post->slug]) }}"
                   title="{{ $post->title }}">
                    <figure class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="thumbnail">
                            <div class="thumbnail-image-container">
                                @if(count($post->files()->where('zone', 'thumbnail')->get()))
                                    <img src="{{ Imagy::getThumbnail($post->files()->where('zone', 'thumbnail')->get()[0]->path, 'mediumThumb') }}"
                                         alt="{{ $post->title }}"/>
                                @else
                                    <img src=""
                                         alt="{{ $post->title }}"/>
                                @endif
                            </div>
                            <div class="thumbnail-caption">
                                <div class="thumbnail-bump"></div>
                                <div class="thumbnail-icon">
                                    <i class="fa fa-align-left"></i>
                                </div>
                                <h5 class="thumbnail-title">
                                    {{ $post->title }}
                                </h5>
                                <div class="thumbnail-action">
                                    {!! str_limit($post->content, 20) !!}
                                </div>
                            </div>
                        </div>
                    </figure>
                </a>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
        </div>
        <aside class="col-md-3 hidden-sm hidden-xs">
            @include('widgets.blog.posts')
        </aside>
    </div>
@stop
