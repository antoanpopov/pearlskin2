<div class="box-body">
    {!! Form::i18nInput('names', trans('pearlskin::common.form.names'), $errors, $lang, $doctor) !!}
    {!! Form::i18nTextarea('description', trans('pearlskin::common.form.description'), $errors, $lang, $doctor) !!}
</div>
