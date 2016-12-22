@extends('layouts.master')

@section('content-header')
    <h1>
        {{ trans('pearlskin::emails.reply to',['email' => $emailMessage->sender_email]) }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i
                        class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
        <li><a href="{{ route('admin.pearlskin.email.index') }}">{{ trans('pearlskin::emails.title.emails') }}</a></li>
        <li class="active">{{ trans('pearlskin::emails.title.edit email') }}</li>
    </ol>
@stop

@section('styles')
    {!! Theme::script('js/vendor/ckeditor/ckeditor.js') !!}
    <style>
        h3 {
            padding: 0;
            margin: 0 0 10px 0;
            border-bottom: 1px solid rgba(100, 100, 100, .2);
        }
    </style>
@stop

@section('content')
    {!! Form::open(['route' => ['admin.pearlskin.email.store'], 'method' => 'post']) !!}
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="nav-tabs-custom">
                <div class="tab-content">
                    <h3>{{ $emailMessage->message_subject }}</h3>
                    <p><strong>{{ $emailMessage->sender_names }}</strong>
                        <small>{{ $emailMessage->sender_email }}</small>
                    </p>
                    <blockquote>
                        <p>{{ $emailMessage->message_text }}</p>
                    </blockquote>
                    {!! Form::normalInput('message_subject', trans('pearlskin::common.form.subject'), $errors, $replyEmail) !!}

                    {!! Form::normalTextarea('message_text', trans('pearlskin::common.form.message'), $errors, $replyEmail) !!}
                    <div class="box-footer">
                        <button type="submit"
                                class="btn btn-primary btn-flat">
                            <i class="fa fa-mail-reply"></i>
                            {{ trans('pearlskin::common.buttons.reply') }}
                        </button>
                        <a class="btn btn-danger pull-right btn-flat"
                           href="{{ route('admin.pearlskin.email.index')}}">
                            <i class="fa fa-times"></i> {{ trans('core::core.button.cancel') }}</a>
                    </div>
                </div>
            </div>
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
        $(document).ready(function () {
            $(document).keypressAction({
                actions: [
                    {key: 'b', route: "<?= route('admin.pearlskin.email.index') ?>"}
                ]
            });
        });
    </script>
@stop
