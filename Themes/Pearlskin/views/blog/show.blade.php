@extends('layouts.master')

@section('title')
    {{ $post->title }} | @parent
@stop

@section('content')
    <div class="container content">
        <div class="col-md-9 col-sm-12">
        <span class="linkBack">
            <a href="{{ URL::route($currentLocale . '.blog') }}" class="color-primary">
                <i class="fa fa-backward"></i> {{ trans('pearlskin::blog.back to list') }}</a>
        </span>
            <div class="row">
                @if(count($post->files()->where('zone', 'thumbnail')->get()))
                    <img class="col-xs-12"
                         src="{{ Imagy::getThumbnail($post->files()->where('zone', 'thumbnail')->get()[0]->path, 'mediumThumb') }}"
                         alt="{{ $post->title }}"/>
                @else
                    <img src=""
                         alt="{{ $post->title }}"/>
                @endif
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <h1 class="font-heading blog-title">{{ $post->title }}</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div>
                        <span class="fa fa-clock-o color-primary"></span>
                        <span>{{ $post->created_at->format('d-m-Y') }}</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    {!! $post->content !!}
                </div>
            </div>
            <div class="row">
                <h4 class="color-primary">{{ trans('blogextension::common.comments') }}({{ count($post->comments()) }})</h4>
                @foreach($post->comments() as $comment)
                    <div class="col-md-1">
                        <img src="http://1.gravatar.com/avatar/afaa67c22b665e854fa5790c02a57866?s=65&d=mm&r=g"/>
                    </div>
                    <div class="col-md-11">
                        <div class="row">
                        <span class="pull-left color-primary">
                            {{ $comment->nickname }}
                            @if($comment->email !== null)
                                , {{ $comment->email }}
                            @endif
                        </span>
                            <a href="#" class="pull-right color-primary">{{ trans('blogextension::common.reply') }}</a>
                            <span class="pull-right">{{ $comment->created_at }} | </span>

                        </div>
                        <div class="row">
                            <p>
                                {{ $comment->comment_text }}
                            </p>
                        </div>

                    </div>
                @endforeach
            </div>
            <p>
                <?php if ($previous = $post->present()->previous): ?>
                <a href="{{ route(locale() . '.blog.slug', [$previous->slug]) }}" class="color-primary">Previous</a>
                <?php endif; ?>
                <?php if ($next = $post->present()->next): ?>
                <a href="{{ route(locale() . '.blog.slug', [$next->slug]) }}" class="color-primary">Next</a>
                <?php endif; ?>
            </p>
        </div>
        <aside class="col-md-3 hidden-sm hidden-xs">
            @include('widgets.blog.posts')
        </aside>
    </div>
@stop
