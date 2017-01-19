<div class="box-body">
    {!! Form::i18nInput('title', trans('pearlskin::common.form.name'), $errors, $lang, $procedure) !!}
    {!! Form::i18nTextarea('description', trans('pearlskin::common.form.description'), $errors, $lang, $procedure) !!}
    <div class="col-md-6 col-sm-12">
        <div class="form-group">
            {!! Form::label("doctor_id", trans('pearlskin::common.form.doctor')) !!}
            <select name="doctor_id" id="category" class="form-control">
                @foreach ($procedureCategories as $procedureCategory)
                    <option value="{{ $procedureCategory->id }}" {{ old('procedure_cat_id', $procedure->procedure_cat_id) == $procedureCategory->id ? 'selected' : '' }}>
                        {{ $procedureCategory->title }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>
</div>
