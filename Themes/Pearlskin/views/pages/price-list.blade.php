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
        <div class="col-xs-12">
            {!! $page->body !!}
            <div class="table table-striped">
                @foreach($priceListCategories as $priceListCategory)
                    <tr>
                        <td>{{$priceListCategory->title}}</td>
                        <td></td>
                    </tr>
                    @foreach($priceListCategory->priceLists as $priceList)
                        <tr>
                            <td>{{ $priceList->title }}</td>
                            <td>{{ $priceList->price }}</td>
                        </tr>
                    @endforeach
                @endforeach
            </div>
        </div>
    </div>
@stop
