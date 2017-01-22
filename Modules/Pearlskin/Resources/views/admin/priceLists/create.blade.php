@extends('layouts.master')

@section('content-header')
    <h1>
        {{ trans('pearlskin::priceLists.title.create') }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
        <li><a href="{{ route('admin.pearlskin.procedure.index') }}">{{ trans('pearlskin::procedures.title.procedures') }}</a></li>
        <li class="active">{{ trans('pearlskin::procedures.title.create procedure') }}</li>
    </ol>
@stop

@section('styles')
    {!! Theme::script('js/vendor/ckeditor/ckeditor.js') !!}
@stop

@section('content')
    {!! Form::open(['route' => ['admin.pearlskin.procedure.store'], 'method' => 'post']) !!}
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="nav-tabs-custom">
                @include('partials.form-tab-headers')
                <div class="tab-content">
                    <?php $i = 0; ?>
                    @foreach (LaravelLocalization::getSupportedLocales() as $locale => $language)
                        <?php $i++; ?>
                        <div class="tab-pane {{ locale() == $locale ? 'active' : '' }}" id="tab_{{ $i }}">
                            @include('pearlskin::admin.priceLists.partials.create-fields', ['lang' => $locale])
                        </div>
                    @endforeach
                        <div class="row">
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group dropdown">
                                    <label for="price_list_category"><?= trans('pearlskin::common.form.category')?></label>
                                    <select class="form-control"
                                            name="price_list_category">
                                        @foreach($priceListCategories as $priceListCategory)
                                            <option value="{{ $priceListCategory->id }}">{{ $priceListCategory->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group dropdown">
                                    <label for="procedure_id"><?= trans('pearlskin::common.form.procedure')?></label>
                                    <select class="form-control"
                                            name="procedure_id">
                                        @foreach($procedures as $procedure)
                                            <option value="{{ $procedure->id }}">{{ $procedure->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                {!! Form::normalInput('price', trans('pearlskin::common.form.price'), $errors) !!}
                            </div>
                            <div class="col-sm-12 col-md-4">
                                {!! Form::normalCheckbox('is_visible', trans('pearlskin::common.statuses.is visible'), $errors) !!}
                            </div>
                            <div class="col-sm-12 col-md-6">
                                {!! Form::normalCheckbox('show_procedure_price', trans('pearlskin::common.statuses.show procedure price'), $errors) !!}
                            </div>
                        </div>
            </div> {{-- end nav-tabs-custom --}}
        </div>
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
        $( document ).ready(function() {
            $(document).keypressAction({
                actions: [
                    { key: 'b', route: "<?= route('admin.pearlskin.procedure.index') ?>" }
                ]
            });
        });
    </script>
    <script>
        $( document ).ready(function() {
            $('input[type="checkbox"].flat-blue, input[type="radio"].flat-blue').iCheck({
                checkboxClass: 'icheckbox_flat-blue',
                radioClass: 'iradio_flat-blue'
            });
        });
    </script>
@stop
