<div class="box-body">
    {!! Form::i18nInput('title', trans('pearlskin::common.form.name'), $errors, $lang, $carousel) !!}
    {!! Form::i18nTextarea('description', trans('pearlskin::common.form.description'), $errors, $lang, $carousel) !!}
</div>
