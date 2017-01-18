@extends('layouts.master')

@section('title')
    {{ $post->title }} | @parent
@stop

@section('content')
    {!! Breadcrumbs::render('blog.post', $post) !!}
    <div class="container content">
        <div class="col-md-9 col-sm-12">
        <span class="linkBack">
            <a href="{{ URL::route('blog') }}" class="color-primary">
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
                <h3 class="color-primary font-heading">{{ trans('blogextension::core.write comment') }}</h3>
                {!! Form::open(['route' => ['admin.pearlskin.procedure.store'], 'method' => 'post','class' => 'row']) !!}
                <div class="col-xs-12 col-md-6">
                    <div class='input-group {{ $errors->has("name") ? ' has-error' : '' }}'>
                <span class="input-group-addon">
                    <i class="fa fa-user"></i>
                </span>
                        {!! Form::text("name", old("comment.name"), ['class' => 'form-control', 'placeholder' => trans('pearlskin::common.form.name')]) !!}
                        {!! $errors->first("name", '<span class="help-block">:message</span>') !!}
                    </div>
                </div>
                <div class="col-xs-12 col-md-6">
                    <div class='input-group {{ $errors->has("email") ? ' has-error' : '' }}'>
                <span class="input-group-addon">
                    <i class="fa fa-envelope"></i>
                </span>
                        {!! Form::text("email", old("comment.email"), ['class' => 'form-control', 'placeholder' => trans('pearlskin::common.form.email')]) !!}
                        {!! $errors->first("email", '<span class="help-block">:message</span>') !!}
                    </div>
                </div>
                <div class="col-sm-12">
                    {!! Form::textarea('message', old('comment.message', null),[
                    'class' => 'form-control',
                    'rows' => '3',
                    'placeholder' => trans('pearlskin::common.form.message'),
                    'cols' => 10,
                    'maxlength' => setting('blog::comment-length')
                    ]) !!}
                </div>
                {!! Form::close() !!}
            </div>
            <div class="row">
                <h4 class="color-primary font-heading">{{ trans('blogextension::core.comments') }} ({{ count($post->comments())}})</h4>
                <ul class="comment-list">
                    @each('partials.blog.comment',$post->parentComments(), 'comment')
                </ul>
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
