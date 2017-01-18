<div class="col-md-6 col-sm-12">
    <div class="form-group dropdown">
        <label for="client_id"><?= trans('pearlskin::common.form.client')?></label>
        <select class="form-control"
                name="client_id">
            @foreach($clients as $client)
                <option value="{{ $client->id }}">{{ $client->names }}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="col-md-6 col-sm-12">
    <div class="form-group dropdown">
        <label for="doctor_id"><?= trans('pearlskin::common.form.doctor')?></label>
        <select class="form-control"
                name="doctor_id">
            @foreach($doctors as $doctor)
                <option value="{{ $doctor->id }}">{{  $doctor->names }}</option>
            @endforeach
        </select>
    </div>
</div>
{!! Form::dateTimePicker('appointed_at', trans('pearlskin::common.form.appointed_at'), $errors, null, ['class'=> 'col-md-6 col-sm-12']) !!}
