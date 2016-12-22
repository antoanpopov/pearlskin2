@extends('layouts.master')

@section('content-header')
    <h1>
        {{ trans('blogextension::core.title') }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i
                        class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
        <li class="active">{{ trans('blogextension::core.comments') }}</li>
    </ol>
@stop

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header">
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="data-table table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>{{ trans('pearlskin::common.form.author') }}</th>
                            <th>{{ trans('pearlskin::common.form.text') }}</th>
                            <th>{{ trans('pearlskin::common.form.is_active') }}</th>
                            <th>{{ trans('pearlskin::common.form.created at') }}</th>
                            <th data-sortable="false">{{ trans('pearlskin::common.form.actions') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if (isset($comments)): ?>
                        <?php foreach ($comments as $comment): ?>
                        <tr>
                            <td>
                                <a href="{{ URL::route('admin.pearlskin.article.edit', [$comment->id]) }}">
                                    {{ $comment->nickname }} ({{$comment->email}})
                                </a>
                            </td>
                            <td>
                                <a href="{{ URL::route('admin.pearlskin.article.edit', [$comment->id]) }}">
                                    {!! str_limit($comment->comment_text) !!}
                                </a>
                            </td>
                            <td>
                                <a href="{{ URL::route('admin.pearlskin.carousel.edit', [$comment->id]) }}">
                                    @if($comment->is_active)
                                        <span class="label label-success">{{ trans('pearlskin::common.statuses.is visible') }}</span>
                                    @else
                                        <span class="label label-danger">{{ trans('pearlskin::common.statuses.not visible') }}</span>
                                    @endif
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('admin.pearlskin.article.edit', [$comment->id]) }}">
                                    {{ $comment->created_at }}
                                </a>
                            </td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('admin.pearlskin.article.edit', [$comment->id]) }}"
                                       class="btn btn-default btn-flat"><i class="fa fa-pencil"></i></a>
                                    <button class="btn btn-danger btn-flat" data-toggle="modal"
                                            data-target="#modal-delete-confirmation"
                                            data-action-target="{{ route('admin.pearlskin.article.destroy', [$comment->id]) }}">
                                        <i class="fa fa-trash"></i></button>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                        <?php endif; ?>
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>{{ trans('pearlskin::common.form.title') }}</th>
                            <th>{{ trans('pearlskin::common.form.content') }}</th>
                            <th>{{ trans('pearlskin::common.form.is_active') }}</th>
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
        <dd>{{ trans('pearlskin::pearlskin.title.create article') }}</dd>
    </dl>
@stop

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            $(document).keypressAction({
                actions: [
                    {key: 'c', route: "<?= route('admin.pearlskin.article.create') ?>"}
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
                "order": [[0, "desc"]],
                "language": {
                    "url": '<?php echo Module::asset("core:js/vendor/datatables/{$locale}.json") ?>'
                }
            });
        });
    </script>
@stop
