@extends('layouts.master')

@section('title')
    {{ $page->title }} | @parent
@stop
@section('meta')
    <meta name="title" content="{{ $page->meta_title}}"/>
    <meta name="description" content="{{ $page->meta_description }}"/>
@stop
@section('carousel')
    @include('partials.carousel',array(
    'carousels' => $carousel->getCarouselsForPage($page->id)
    ))
@stop
@section('content')
    {!! Breadcrumbs::render() !!}
    <div class="container content">
        <div class="block-bump"></div>
        <h3 class="text-center">Защо клиентите ни предпочитат</h3>
        <div class="col-sm-12 text-center">
            <span class="under-bump">‿</span>
        </div>
        <div class="row padding-top-50">
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <div class="thumbnail thumbnail-home">
                    <div class="thumbnail-caption">
                        <div class="thumbnail-bump"></div>
                        <div class="thumbnail-icon">
                            <i class="fa fa-diamond"></i>
                        </div>
                        <h5 class="thumbnail-title">
                            Първокласно обслужване
                        </h5>
                        <div class="thumbnail-action">

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <div class="thumbnail thumbnail-home">
                    <div class="thumbnail-caption">
                        <div class="thumbnail-bump"></div>
                        <div class="thumbnail-icon">
                            <i class="fa fa-users"></i>
                        </div>
                        <h5 class="thumbnail-title">
                            Екип от специалисти
                        </h5>
                        <div class="thumbnail-action">

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <div class="thumbnail thumbnail-home">
                    <div class="thumbnail-caption">
                        <div class="thumbnail-bump"></div>
                        <div class="thumbnail-icon">
                            <i class="fa fa-map-marker"></i>
                        </div>
                        <h5 class="thumbnail-title">
                            Добра локация
                        </h5>
                        <div class="thumbnail-action">

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <div class="thumbnail thumbnail-home">
                    <div class="thumbnail-caption">
                        <div class="thumbnail-bump"></div>
                        <div class="thumbnail-icon">
                            <i class="fa fa-credit-card"></i>
                        </div>
                        <h5 class="thumbnail-title">
                            Конкурентни цени
                        </h5>
                        <div class="thumbnail-action">

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-12 padding-top-50">{!! $page->body !!}</div>
    </div>
    <div class="bg-creme">
        <div class="container content">
            <div class="block-bump bg-creme"></div>
            <h3 class="text-center">Последни новини</h3>
            <div class="col-sm-12 text-center">
                <span class="under-bump">‿</span>
            </div>
            <div class="row padding-top-50">
                @foreach($articles->latestArticles() as $article)

                    <figure class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <div class="thumbnail">
                            <div class="thumbnail-image-container">
                                @if(count($article->files()->where('zone', 'image')->get()))
                                    <img src="{{ Imagy::getThumbnail($article->files()->where('zone', 'image')->get()[0]->path, 'mediumThumb') }}"
                                         alt="{{ $article->title }}"/>
                                @else
                                    <img src=""
                                         alt="{{ $article->title }}"/>
                                @endif
                            </div>
                            <div class="thumbnail-caption">
                                <div class="thumbnail-bump"></div>
                                <div class="thumbnail-icon">
                                    <i class="fa fa-newspaper-o"></i>
                                </div>
                                <h5 class="thumbnail-title">
                                    {{ $article->title }}
                                </h5>
                                <div class="thumbnail-action">
                                    <a href="{{ route('article', $article->title) }}"
                                       class="btn">
                                        {{ trans('pearlskin::common.labels.read more') }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </figure>
                @endforeach
            </div>
        </div>
    </div>

@stop
