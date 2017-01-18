<div class="box-body">
    <div class="col-md-6 col-sm-12">
        {!! Form::normalInput('names', trans('pearlskin::common.form.names'), $errors) !!}
    </div>
    <div class="col-md-6 col-sm-12">
        {!! Form::normalInput('email', trans('pearlskin::common.form.email'), $errors) !!}
    </div>
    <div class="col-md-6 col-sm-12">
        {!! Form::normalInput('phone', trans('pearlskin::common.form.phone'), $errors) !!}
    </div>
    {!! Form::datePicker('dob', trans('pearlskin::common.form.dob'), $errors, null, ['class'=> 'col-md-6 col-sm-12']) !!}
    <div class="col-sm-12">
        {!! Form::normalTextarea('address', trans('pearlskin::common.form.address'), $errors) !!}
    </div>
</div>
