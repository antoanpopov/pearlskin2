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
                            <th>{{ trans('blogextension::common.form_fields.text') }}</th>
                            <th>{{ trans('blogextension::common.form_fields.author') }}</th>
                            <th>{{ trans('blogextension::common.form_fields.is_active') }}</th>
                            <th>{{ trans('core::core.table.created at') }}</th>
                            <th data-sortable="false">{{ trans('core::core.table.actions') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($post->comments() as $comment)
                        <tr>
                            <td>
                                <a href="{{ URL::route('admin.blogextension.comment.edit', [$comment->id]) }}">
                                    {!! str_limit($comment->comment_text) !!}
                                </a>
                            </td>
                            <td>
                                <a href="{{ URL::route('admin.blogextension.comment.edit', [$comment->id]) }}">
                                    {{ $comment->nickname }}, {{ $comment->email }}
                                </a>
                            </td>
                            <td>
                                <a href="{{ URL::route('admin.blogextension.comment.edit', [$comment->id]) }}">
                                    @if($comment->is_active)
                                        <span class="label label-success">{{ trans('pearlskin::common.statuses.is active') }}</span>
                                    @else
                                        <span class="label label-danger">{{ trans('pearlskin::common.statuses.not active') }}</span>
                                    @endif
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('admin.blogextension.comment.edit', [$comment->id]) }}">
                                    {{ $comment->created_at }}
                                </a>
                            </td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('admin.blogextension.comment.edit', [$comment->id]) }}" class="btn btn-default btn-flat"><i class="fa fa-pencil"></i></a>
                                    <button class="btn btn-danger btn-flat" data-toggle="modal" data-target="#modal-delete-confirmation" data-action-target="{{ route('admin.blogextension.comment.destroy', [$comment->id]) }}"><i class="fa fa-trash"></i></button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>{{ trans('blogextension::common.form_fields.text') }}</th>
                            <th>{{ trans('blogextension::common.form_fields.author') }}</th>
                            <th>{{ trans('blogextension::common.form_fields.is_active') }}</th>
                            <th>{{ trans('core::core.table.created at') }}</th>
                            <th>{{ trans('core::core.table.actions') }}</th>
                        </tr>
                        </tfoot>
                    </table>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
    </div>

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
