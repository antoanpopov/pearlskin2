@extends('layouts.master')

@section('content-header')
    <h1>
        {{ trans('pearlskin::carousels.title.carousels') }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
        <li class="active">{{ trans('pearlskin::carousels.title.carousels') }}</li>
    </ol>
@stop

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="row">
                <div class="btn-group pull-right" style="margin: 0 15px 15px 0;">
                    <a href="{{ route('admin.pearlskin.carousel.create') }}" class="btn btn-primary btn-flat" style="padding: 4px 10px;">
                        <i class="fa fa-pencil"></i> {{ trans('pearlskin::carousels.button.create carousel') }}
                    </a>
                </div>
            </div>
            <div class="box box-primary">
                <div class="box-header">
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="data-table table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>{{ trans('pearlskin::common.form.name') }}</th>
                            <th>{{ trans('pearlskin::common.form.description') }}</th>
                            <th>{{ trans('pearlskin::common.form.is_visible') }}</th>
                            <th>{{ trans('pearlskin::common.form.created at') }}</th>
                            <th data-sortable="false">{{ trans('pearlskin::common.form.actions') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if (isset($carousels)): ?>
                        <?php foreach ($carousels as $carousel): ?>
                        <tr>
                            <td>
                                <a href="{{ URL::route('admin.pearlskin.carousel.edit', [$carousel->id]) }}">
                                    {{ $carousel->title }}
                                </a>
                            </td>
                            <td>
                                <a href="{{ URL::route('admin.pearlskin.carousel.edit', [$carousel->id]) }}">
                                    {!! str_limit($carousel->description) !!}
                                </a>
                            </td>
                            <td>
                                <a href="{{ URL::route('admin.pearlskin.carousel.edit', [$carousel->id]) }}">
                                    @if($carousel->is_visible)
                                        <span class="label label-success">{{ trans('pearlskin::common.statuses.is visible') }}</span>
                                    @else
                                        <span class="label label-danger">{{ trans('pearlskin::common.statuses.not visible') }}</span>
                                    @endif
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('admin.pearlskin.carousel.edit', [$carousel->id]) }}">
                                    {{ $carousel->created_at }}
                                </a>
                            </td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('admin.pearlskin.doctor.edit', [$carousel->id]) }}" class="btn btn-default btn-flat"><i class="fa fa-pencil"></i></a>
                                    <button class="btn btn-danger btn-flat" data-toggle="modal" data-target="#modal-delete-confirmation" data-action-target="{{ route('admin.pearlskin.carousel.destroy', [$carousel->id]) }}"><i class="fa fa-trash"></i></button>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                        <?php endif; ?>
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>{{ trans('pearlskin::common.form.name') }}</th>
                            <th>{{ trans('pearlskin::common.form.description') }}</th>
                            <th>{{ trans('pearlskin::common.form.is_visible') }}</th>
                            <th>{{ trans('pearlskin::common.form.created at') }}</th>
                            <th>{{ trans('pearlskin::common.form.actions') }}</th>
                        </tr>
                        </tfoot>
                    </table>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
    </div>
    @include('core::partials.delete-modal')
@stop

@section('footer')
    <a data-toggle="modal" data-target="#keyboardShortcutsModal"><i class="fa fa-keyboard-o"></i></a> &nbsp;
@stop
@section('shortcuts')
    <dl class="dl-horizontal">
        <dt><code>c</code></dt>
        <dd>{{ trans('pearlskin::pearlskin.title.create carousel') }}</dd>
    </dl>
@stop

@section('scripts')
    <script type="text/javascript">
        $( document ).ready(function() {
            $(document).keypressAction({
                actions: [
                    { key: 'c', route: "<?= route('admin.pearlskin.carousel.create') ?>" }
                ]
            });
        });
    </script>
    <?php $locale = locale(); ?>
    <script type="text/javascript">
        $(function () {
            $('.data-table').dataTable({
                "paginate": true,
                "lengthChange": true,
                "filter": true,
                "sort": true,
                "info": true,
                "autoWidth": true,
                "order": [[ 0, "desc" ]],
                "language": {
                    "url": '<?php echo Module::asset("core:js/vendor/datatables/{$locale}.json") ?>'
                }
            });
        });
    </script>
@stop
