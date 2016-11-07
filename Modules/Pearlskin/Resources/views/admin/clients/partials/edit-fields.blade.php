<div class="box-body">
    {!! Form::normalInput('names', trans('pearlskin::common.form.names'), $errors, $client) !!}
    {!! Form::normalInput('email', trans('pearlskin::common.form.email'), $errors, $client) !!}
    {!! Form::normalInput('phone', trans('pearlskin::common.form.phone'), $errors, $client) !!}
    {!! Form::normalInput('dob', trans('pearlskin::common.form.dob'), $errors, $client) !!}
    {!! Form::normalTextarea('address', trans('pearlskin::common.form.address'), $errors, $client) !!}
</div>
