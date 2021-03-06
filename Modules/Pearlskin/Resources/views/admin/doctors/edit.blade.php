@extends('layouts.master')

@section('content-header')
    <h1>
        {{ trans('pearlskin::doctors.title.edit doctor') }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
        <li><a href="{{ route('admin.pearlskin.doctor.index') }}">{{ trans('pearlskin::doctors.title.doctors') }}</a></li>
        <li class="active">{{ trans('pearlskin::doctors.title.edit doctor') }}</li>
    </ol>
@stop

@section('styles')
    {!! Theme::script('js/vendor/ckeditor/ckeditor.js') !!}
@stop

@section('content')
    {!! Form::open(['route' => ['admin.pearlskin.doctor.update', $doctor->id], 'method' => 'put']) !!}
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="nav-tabs-custom">
                @include('partials.form-tab-headers')
                <div class="tab-content">
                    <?php $i = 0; ?>
                    @foreach (LaravelLocalization::getSupportedLocales() as $locale => $language)
                        <?php $i++; ?>
                        <div class="tab-pane {{ locale() == $locale ? 'active' : '' }}" id="tab_{{ $i }}">
                            @include('pearlskin::admin.doctors.partials.edit-fields', ['lang' => $locale])
                        </div>
                    @endforeach

                    {!! Form::normalInput('phone', trans('pearlskin::doctors.phone'), $errors, $doctor) !!}
                    {!! Form::normalCheckbox('is_visible', trans('pearlskin::doctors.is visible'), $errors, $doctor) !!}
                    {!! Form::normalCheckbox('has_percent', trans('pearlskin::doctors.has percent'), $errors, $doctor) !!}

                    @include('media::admin.fields.file-link', [
                            'entityClass' => 'Modules\\\\Pearlskin\\\\Entities\\\\Doctor',
                            'entityId' => $doctor->id,
                            'zone' => 'image'
                        ])
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary btn-flat">{{ trans('core::core.button.update') }}</button>
                        <button class="btn btn-default btn-flat" name="button" type="reset">{{ trans('core::core.button.reset') }}</button>
                        <a class="btn btn-danger pull-right btn-flat" href="{{ route('admin.pearlskin.doctor.index')}}"><i class="fa fa-times"></i> {{ trans('core::core.button.cancel') }}</a>
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
                    { key: 'b', route: "<?= route('admin.pearlskin.doctor.index') ?>" }
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
