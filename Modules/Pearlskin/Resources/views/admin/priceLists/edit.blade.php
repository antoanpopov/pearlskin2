@extends('layouts.master')

@section('content-header')
    <h1>
        {{ trans('pearlskin::procedures.title.edit procedure') }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i
                        class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
        <li>
            <a href="{{ route('admin.pearlskin.procedure.index') }}">{{ trans('pearlskin::procedures.title.procedures') }}</a>
        </li>
        <li class="active">{{ trans('pearlskin::procedures.title.edit procedure') }}</li>
    </ol>
@stop

@section('styles')
    {!! Theme::script('js/vendor/ckeditor/ckeditor.js') !!}
@stop

@section('content')
    {!! Form::open(['route' => ['admin.pearlskin.procedure.update', $procedure->id], 'method' => 'put']) !!}
    <div class="row">
        <div class="col-md-6 col-xs-12">
            <div class="nav-tabs-custom">
                @include('partials.form-tab-headers')
                <div class="tab-content">
                    <?php $i = 0; ?>
                    @foreach (LaravelLocalization::getSupportedLocales() as $locale => $language)
                        <?php $i++; ?>
                        <div class="tab-pane {{ locale() == $locale ? 'active' : '' }}" id="tab_{{ $i }}">
                            @include('pearlskin::admin.procedures.partials.edit-fields', ['lang' => $locale])
                        </div>
                    @endforeach
                    <div class="row">
                        <div class="col-sm-12 col-md-4">
                            <div class="form-group">
                                {!! Form::label("procedure_cat_id", trans('pearlskin::common.form.procedure category')) !!}
                                <select name="procedure_cat_id" id="procedure_cat_id" class="form-control">
                                    @foreach ($procedureCategories as $procedureCategory)
                                        <option value="{{ $procedureCategory->id }}" {{ old('procedure_cat_id', $procedure->procedure_cat_id) == $procedureCategory->id ? 'selected' : '' }}>
                                            {{ $procedureCategory->title }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-4">
                            {!! Form::normalInput('price', trans('pearlskin::common.form.price'), $errors, $procedure) !!}
                        </div>
                        <div class="col-sm-12 col-md-4">
                            {!! Form::normalCheckbox('is_visible', trans('pearlskin::common.statuses.is visible'), $errors, $procedure) !!}
                        </div>
                        <div class="col-xs-12">
                            @mediaSingle('featured_image', $procedure)

                            @mediaMultiple('gallery', $procedure)
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <button type="submit"
                            class="btn btn-primary btn-flat">{{ trans('core::core.button.update') }}</button>
                    <button class="btn btn-default btn-flat" name="button"
                            type="reset">{{ trans('core::core.button.reset') }}</button>
                    <a class="btn btn-danger pull-right btn-flat"
                       href="{{ route('admin.pearlskin.procedure.index')}}"><i
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
                    {key: 'b', route: "<?= route('admin.pearlskin.procedure.index') ?>"}
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
