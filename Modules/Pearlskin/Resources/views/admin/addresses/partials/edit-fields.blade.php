<div class="box-body">
    <div class="col-md-6 col-sm-12">
        {!! Form::normalInput('name', trans('pearlskin::common.form.name'), $errors, $address) !!}
    </div>
    <div class="col-md-6 col-sm-12">
        {!! Form::normalInput('email', trans('pearlskin::common.form.email'), $errors, $address) !!}
    </div>
    <div class="col-md-6 col-sm-12">
        {!! Form::normalInput('address_line_1', trans('pearlskin::common.form.address_line_1'), $errors, $address) !!}
    </div>
    <div class="col-md-6 col-sm-12">
        {!! Form::normalInput('address_line_2', trans('pearlskin::common.form.address_line_2'), $errors, $address) !!}
    </div>
    <div class="col-md-6 col-sm-12">
        {!! Form::normalInput('mobile_phone', trans('pearlskin::common.form.mobile_phone'), $errors, $address) !!}
    </div>
    <div class="col-md-6 col-sm-12">
        {!! Form::normalInput('stationary_phone', trans('pearlskin::common.form.stationary_phone'), $errors, $address) !!}
    </div>
</div>
