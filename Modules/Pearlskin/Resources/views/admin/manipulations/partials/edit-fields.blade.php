<div class="box-body">
    <div class="col-md-6 col-xs-12">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class='form-group{{ $errors->has("title") ? ' has-error' : '' }}'>
                    {!! Form::label("title", trans('pearlskin::common.form.title')) !!}
                    {!! Form::text("title", old("title", $manipulation->title), ['class' => 'form-control', 'placeholder' => trans('pearlskin::common.form.title')]) !!}
                    {!! $errors->first("title", '<span class="help-block">:message</span>') !!}
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class='form-group{{ $errors->has("learnt_from") ? ' has-error' : '' }}'>
                    {!! Form::label("learnt_from", trans('pearlskin::common.form.learnt from')) !!}
                    {!! Form::text("learnt_from", old("learnt_from", $manipulation->learnt_from), ['class' => 'form-control', 'placeholder' => trans('pearlskin::common.form.learnt from')]) !!}
                    {!! $errors->first("learnt_from", '<span class="help-block">:message</span>') !!}
                </div>
            </div>
            <div class="col-md-12">
                {!! Form::normalTextarea('description', trans('pearlskin::common.form.description'), $errors, $manipulation) !!}
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    {!! Form::label("client_id", trans('pearlskin::common.form.client')) !!}
                    <select name="category_id" id="category" class="form-control">
                        @foreach ($clients as $client)
                            <option value="{{ $client->id }}" {{ old('client_id', $manipulation->client_id) == $client->id ? 'selected' : '' }}>
                                {{ $client->names }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    {!! Form::label("doctor_id", trans('pearlskin::common.form.doctor')) !!}
                    <select name="doctor_id" id="category" class="form-control">
                        @foreach ($doctors as $doctor)
                            <option value="{{ $doctor->id }}" {{ old('doctor_id', $manipulation->doctor_id) == $doctor->id ? 'selected' : '' }}>
                                {{ $doctor->names }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    <label for="procedure"><?= trans('pearlskin::common.form.procedure')?></label>
                    <select class="form-control"
                            name="procedure">
                        @foreach($procedures as $procedure)
                            <option value="{{ $procedure->id }}"
                                    data-title="{{ $procedure->title }}"
                                    data-price="{{ $procedure->price }}"
                                    data-procedure-id="{{ $procedure->id }}">{{ $procedure->title }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    <label>&nbsp;</label>
                    <a href="#" class="btn btn-success form-control add-procedure">
                        {{ trans('pearlskin::procedures.button.add procedure') }}
                    </a>
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    <label for="promotional_procedure"><?= trans('pearlskin::common.form.promotional procedure')?></label>
                    <select class="form-control"
                            name="promotional_procedure">
                        @foreach($procedures as $promotionalProcedure)
                            <option value="{{ $promotionalProcedure->id }}"
                                    data-title="{{ $promotionalProcedure->title }}"
                                    data-price="{{ $promotionalProcedure->price }}"
                                    data-procedure-id="{{ $promotionalProcedure->id }}">{{ $promotionalProcedure->title }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    <label>&nbsp;</label>
                    <a href="#" class="btn btn-success form-control">
                        {{ trans('pearlskin::procedures.button.add procedure') }}
                    </a>
                </div>
            </div>
        </div>
        <div class="row">
            <table class="table table-stripped table-hover procedures-list">
                <thead>
                <h4>{{ trans('pearlskin::procedures.list resource')  }}</h4><span class="pull-right badge"></span>
                <th>
                    {{ trans('pearlskin::common.form.quantity') }}
                </th>
                <th>
                    {{ trans('pearlskin::common.form.procedure') }}
                </th>
                <th>
                    {{ trans('pearlskin::common.form.price') }}
                </th>
                <th></th>
                </thead>
                <tbody>
                @foreach($manipulation->procedures as $key => $procedure)
                    <tr>
                        <td>
                            <input type="number"
                                   value="{{ $procedure->pivot->quantity }}"
                                   name="procedures[{{ $key }}][quantity]"
                                   class="manipulation-procedure-item"
                                   data-price="{{ $procedure->price }}"/>
                            <input type="hidden"
                                   value="{{ $procedure->id }}"
                                   name="procedures[{{ $key }}][procedure_id]"/>

                        </td>
                        <td>{{ $procedure->title }}</td>
                        <td>{{ $procedure->price }}</td>
                        <td>
                            <a hre="#"
                               class="btn btn-danger pull-right procedure-delete"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <th>
                    {{ trans('pearlskin::common.form.quantity') }}
                </th>
                <th>
                    {{ trans('pearlskin::common.form.procedure') }}
                </th>
                <th>
                    {{ trans('pearlskin::common.form.price') }}
                </th>
                <th></th>
                </tfoot>
            </table>
        </div>
    </div>
    <div class="col-md-6 col-xs-12">
        <div class="col-sm-3">
            <div class="form-group">
                {!! Form::label("amount_total", trans('pearlskin::common.form.amount total')) !!}
                {!! Form::number("amount_total", old("amount_total", $manipulation->amount_total), ['readonly','class' => 'form-control', 'data-slug' => 'source', 'placeholder' => trans('pearlskin::common.form.amount total')]) !!}
            </div>
        </div>
        <div class="col-sm-1">
            <div class="form-group">
                <label class="checkbox-inline">&nbsp;</label>
                <input type="checkbox"/>
            </div>
        </div>
        <div class="col-sm-2">
            <div class="form-group">
                {!! Form::label("amount_discount", trans('pearlskin::common.form.amount discount')) !!}
                {!! Form::number("amount_discount", old("amount_discount", $manipulation->amount_discount), ['step'=> '0.01','class' => 'form-control', 'data-slug' => 'source', 'placeholder' => trans('pearlskin::common.form.amount discount')]) !!}
            </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group">
                {!! Form::label("amount_paid", trans('pearlskin::common.form.amount paid')) !!}
                {!! Form::number("amount_paid", old("amount_paid", $manipulation->amount_paid), ['step'=> '0.01','class' => 'form-control', 'placeholder' => trans('pearlskin::common.form.amount paid')]) !!}
            </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group">
                {!! Form::label("amount_dept", trans('pearlskin::common.form.amount dept')) !!}
                {!! Form::number("amount_dept", old("amount_dept", $manipulation->amount_dept), ['readonly','class' => 'form-control', 'placeholder' => trans('pearlskin::common.form.amount dept')]) !!}
            </div>
        </div>
    </div>
</div>

@section('scripts')
    <script type="text/javascript">

        $(document).ready(function () {

            var proceduresCount = 0;

            $('input[type="checkbox"].flat-blue, input[type="radio"].flat-blue').iCheck({
                checkboxClass: 'icheckbox_flat-blue',
                radioClass: 'iradio_flat-blue'
            });

            $('.add-procedure').click(function (e) {
                e.preventDefault();

                var procedure = $('select[name="procedure"]').find(':selected'),
                        procedureId = procedure.data('procedure-id'),
                        procedureTitle = procedure.data('title'),
                        procedurePrice = procedure.data('price');
                $('.procedures-list').find('tbody').append(
                        "<tr>" +
                        "<td>" +
                        "<input " +
                        "type='number' " +
                        "value='0' " +
                        "name='procedures[" + proceduresCount + "][quantity]' " +
                        "class='manipulation-procedure-item'" +
                        "data-price='" + procedurePrice + "'/>" +
                        "<input type='hidden' value='" + procedureId + "' name='procedures[" + proceduresCount + "][procedure_id]'/>" +
                        "</td>" +
                        "<td>" + procedureTitle + "</td>" +
                        "<td>" + procedurePrice + "</td>" +
                        "<td><a href='#' class='btn btn-danger pull-right procedure-delete'><i class='fa fa-trash'></i></a></td>"
                );

                proceduresCount++;
            });

            $(document).on('click', '.procedure-delete', function (e) {
                e.preventDefault();
                $(this).closest('tr').remove();
            });

            $(document).on('keyup change paste', '.manipulation-procedure-item, input[name="amount_discount"], input[name="amount_paid"]', function () {

                var amountProceduresTotal = parseFloat(0),
                        amountDiscount = $('input[name="amount_discount"]').val(),
                        amountPaid = $('input[name="amount_paid"]').val(),
                        amountDeptElement = $('input[name="amount_dept"]'),
                        amountTotalElement = $('input[name="amount_total"]');

                $('.manipulation-procedure-item').each(function (index, element) {
                    var price = parseFloat($(this).data('price')),
                            quantity = parseFloat($(this).val());
                    amountProceduresTotal += (price * quantity);
                });

                var amountTotal = amountProceduresTotal - amountDiscount,
                        amountDept = amountTotal - amountPaid;

                amountTotalElement.val(amountTotal.toFixed(2));
                amountDeptElement.val(amountDept.toFixed(2));

            });

        });
    </script>
@stop