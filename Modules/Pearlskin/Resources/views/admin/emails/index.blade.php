@extends('layouts.master')

@section('content-header')
    <h1>
        {{ trans('pearlskin::emails.title.emails') }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i
                        class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
        <li class="active">{{ trans('pearlskin::emails.title.emails') }}</li>
    </ol>
@stop

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="row">
                <div class="btn-group pull-right" style="margin: 0 15px 15px 0;">
                    <a href="{{ route('admin.pearlskin.email.create') }}" class="btn btn-primary btn-flat"
                       style="padding: 4px 10px;">
                        <i class="fa fa-pencil"></i> {{ trans('pearlskin::emails.button.create email') }}
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
                            <th>{{ trans('pearlskin::common.form.sender') }}</th>
                            <th>{{ trans('pearlskin::common.form.subject') }}</th>
                            <th>{{ trans('pearlskin::common.form.message') }}</th>
                            <th>{{ trans('pearlskin::common.form.created at') }}</th>
                            <th data-sortable="false">{{ trans('pearlskin::common.form.actions') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if (isset($emails)): ?>
                        <?php foreach ($emails as $email): ?>
                        <tr class="<?= (!$email->is_read || $email->replies()->where('is_read', 0)->count() > 0) ? 'unread' : '' ?>">
                            <td>
                                <a href="{{ URL::route('admin.pearlskin.email.reply', [$email->id]) }}">
                                    {{ $email->sender_names . " (".$email->sender_email.")" }}
                                </a>
                                @if($email->replies()->where('is_read',0)->count() > 0)
                                    <span class="label label-success label-badge pull-right">{{ $email->replies()->where('is_read',0)->count() }}</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ URL::route('admin.pearlskin.email.reply', [$email->id]) }}">
                                    {{ $email->message_subject }}
                                </a>
                            </td>
                            <td>
                                <a href="{{ URL::route('admin.pearlskin.email.reply', [$email->id]) }}">
                                    {{ str_limit($email->message_text) }}
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('admin.pearlskin.email.reply', [$email->id]) }}">
                                    {{ $email->created_at }}
                                </a>
                            </td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('admin.pearlskin.email.reply', [$email->id]) }}"
                                       class="btn btn-default btn-flat"><i class="fa fa-mail-reply"></i></a>
                                    <button class="btn btn-danger btn-flat" data-toggle="modal"
                                            data-target="#modal-delete-confirmation"
                                            data-action-target="{{ route('admin.pearlskin.email.destroy', [$email->id]) }}">
                                        <i class="fa fa-trash"></i></button>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                        <?php endif; ?>
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>{{ trans('pearlskin::common.form.sender') }}</th>
                            <th>{{ trans('pearlskin::common.form.subject') }}</th>
                            <th>{{ trans('pearlskin::common.form.message') }}</th>
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
        <dd>{{ trans('pearlskin::pearlskin.title.create email') }}</dd>
    </dl>
@stop

@section('styles')
    <style>
        .unread {
            background-color: #f4f4f4 !important;

        }

        .unread > td > a {
            color: #333 !important;
        }

        .label-badge {
            border-radius: 1em;
        }
    </style>
@stop
@section('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            $(document).keypressAction({
                actions: [
                    {key: 'c', route: "<?= route('admin.pearlskin.email.create') ?>"}
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
