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
    {!! Breadcrumbs::render('page',$page) !!}
    <div class="container content">
        <div class="col-md-12 col-sm-12">
            <div class="row">
                <ul class="nav nav-pills padding-left-15">
                    <li role="presentation" class="active">
                        <a class="color-primary"
                           data-filter="*">
                            {{ trans('pearlskin::common.labels.all') }}
                        </a>
                    </li>
                    @foreach($procedureCategories as $procedureCategory)
                        <li role="presentation">
                            <a class="color-primary"
                               data-filter=".procedure_category_{{$procedureCategory->id}}">
                                {{ $procedureCategory->title }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="row grid">
                @foreach($procedures as $procedure)
                    <figure class="col-md-4 col-xs-12 grid-item procedure_category_{{$procedure->procedure_cat_id}}">
                        <div class="thumbnail">
                            <div class="thumbnail-image-container">
                                @if(count($procedure->files()->where('zone', 'featured_image')->get()))
                                    <img src="{{ Imagy::getThumbnail($procedure->files()->where('zone', 'featured_image')->get()[0]->path, 'mediumThumb') }}"
                                         alt="{{ $procedure->title }}"/>
                                @else
                                    <img src="{{asset('assets/img/default_image.jpg')}}"
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
            <script>
                var grid = $('.grid').isotope({
                    // options
                    itemSelector: '.grid-item',
                    layoutMode: 'fitRows'
                });
                $('[data-filter]').click(function () {
                    var filterParameter = $(this).data('filter');
                    grid.isotope({filter: filterParameter});
                })

                $('.nav-pills li').click(function(){
                    $('.nav-pills li').removeClass('active');
                    $(this).addClass('active');
                });
            </script>
            {!! $procedures->render() !!}
        </div>
    </div>
@stop
