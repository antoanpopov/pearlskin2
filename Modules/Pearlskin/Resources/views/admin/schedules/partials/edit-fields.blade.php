<div class="box-body">
    {!! Form:: customSelect('client_id', trans('pearlskin::common.form.client'), $errors, $clients, $schedule, 'names', ['class'=> 'col-md-6 col-sm-12']) !!}
    {!! Form:: customSelect('doctor_id', trans('pearlskin::common.form.client'), $errors, $doctors, $schedule, 'names', ['class'=> 'col-md-6 col-sm-12']) !!}
    {!! Form::dateTimePicker('appointed_at', trans('pearlskin::common.form.appointed_at'), $errors, $schedule, ['class'=> 'col-md-6 col-sm-12']) !!}
</div>
