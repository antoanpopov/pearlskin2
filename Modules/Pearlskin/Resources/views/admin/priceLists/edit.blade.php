@extends('layouts.master')

@section('content-header')
    <h1>
        {{ trans('pearlskin::priceLists.title.edit') }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i
                        class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
        <li>
            <a href="{{ route('admin.pearlskin.priceLists.index') }}">{{ trans('pearlskin::priceLists.title.module') }}</a>
        </li>
        <li class="active">{{ trans('pearlskin::priceLists.title.edit') }}</li>
    </ol>
@stop

@section('styles')
    {!! Theme::script('js/vendor/ckeditor/ckeditor.js') !!}
@stop

@section('content')
    {!! Form::open(['route' => ['admin.pearlskin.priceLists.update', $priceList->id], 'method' => 'put']) !!}
    <div class="row">
        <div class="col-md-6 col-xs-12">
            <div class="nav-tabs-custom">
                @include('partials.form-tab-headers')
                <div class="tab-content">
                    <?php $i = 0; ?>
                    @foreach (LaravelLocalization::getSupportedLocales() as $locale => $language)
                        <?php $i++; ?>
                        <div class="tab-pane {{ locale() == $locale ? 'active' : '' }}" id="tab_{{ $i }}">
                            @include('pearlskin::admin.priceLists.partials.edit-fields', ['lang' => $locale])
                        </div>
                    @endforeach
                    <div class="box-body">
                        <div class="row">
                            <div class="col-sm-12 col-md-4">
                                <div class="form-group">
                                    {!! Form::label("price_list_category_id", trans('pearlskin::common.form.category')) !!}
                                    <select name="price_list_category_id" id="price_list_category_id"
                                            class="form-control">
                                        @foreach ($priceListCategories as $priceListCategory)
                                            <option value="{{ $priceListCategory->id }}" {{ old('price_list_category_id', $priceList->price_list_category_id) == $priceListCategory->id ? 'selected' : '' }}>
                                                {{ $priceListCategory->title }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    {!! Form::label("procedure_id", trans('pearlskin::common.form.procedure')) !!}
                                    <select name="doctor_id" id="category" class="form-control">
                                        <option value="">---{{ trans('pearlskin::common.none') }} ---</option>
                                        @foreach ($procedures as $procedure)
                                            <option value="{{ $procedure->id }}" {{ old('procedure_id', $priceList->procedure_id) == $procedure->id ? 'selected' : '' }}>
                                                {{ $procedure->names }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                {!! Form::normalInput('price', trans('pearlskin::common.form.price'), $errors, $priceList) !!}
                            </div>
                            <div class="col-sm-12 col-md-12">
                                {!! Form::normalCheckbox('is_visible', trans('pearlskin::common.statuses.is visible'), $errors, $priceList) !!}
                            </div>
                            <div class="col-sm-12 col-md-12">
                                {!! Form::normalCheckbox('show_procedure_price', trans('pearlskin::common.statuses.show procedure price'), $errors, $priceList) !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <button type="submit"
                            class="btn btn-primary btn-flat">{{ trans('core::core.button.update') }}</button>
                    <button class="btn btn-default btn-flat" name="button"
                            type="reset">{{ trans('core::core.button.reset') }}</button>
                    <a class="btn btn-danger pull-right btn-flat"
                       href="{{ route('admin.pearlskin.priceLists.index')}}"><i
                                class="fa fa-times"></i> {{ trans('core::core.button.cancel') }}</a>
                </div>
            </div>
        </div> {{-- end nav-tabs-custom --}}
    </div>
    {!! Form::close() !!}
@stop

@section('footer')
    <a data-toggle="modal" data-target="#keyboardShortcutsModal"><i class="fa fa-keyboard-o"></i></a> &nbsp;
@stop
@section('shortcuts')
    <dl class="dl-horizontal">
        <dt><code>b</code></dt>
        <dd>{{ trans('core::core.back to index') }}</dd>
    </dl>
@stop

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            $(document).keypressAction({
                actions: [
                    {key: 'b', route: "<?= route('admin.pearlskin.priceLists.index') ?>"}
                ]
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            $('input[type="checkbox"].flat-blue, input[type="radio"].flat-blue').iCheck({
                checkboxClass: 'icheckbox_flat-blue',
                radioClass: 'iradio_flat-blue'
            });
        });
    </script>
@stop
