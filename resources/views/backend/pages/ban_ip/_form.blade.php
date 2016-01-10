@include('backend.partials.errors')

<div class="form-group">
    {!! Form::text('ip', null,
    ['class' => 'form-control', 'required' => 'required',
    'placeholder' => trans('common.ip')]) !!}
</div>

<div class="form-group">
    {!! Form::checkbox('permanent_ban', 1, null, ['id' => 'permanent_ban']) !!}
    {!! Form::label('permanent_ban', trans('common.permanent_ban')) !!}
</div>

<div class="form-group">
    {!! Form::text('until', null,
    ['class' => 'form-control datepicker',
    'placeholder' => trans('ban_ip.fields.until')]) !!}
</div>

<div class="form-group">
    {!! Form::submit(trans('ban_ip.create'),
    ['class' => 'btn btn-success col-sm-12']) !!}
</div>

@section('footer_script')
    <script>
        jQuery(function() {
            $('#permanent_ban').on('change', function() {
                $(':input[name="until"]').attr('disabled', $(this).is(':checked'));
            });
            $('.ban_ip-form').validate({
                submitHandler: function(form) {
                    var $until = $(':input[name="until"]');
                    if ($until.val() === '') {
                        $until.attr('disabled', true);
                    }
                    form.submit();
                },
                rules: {
                    ip: {
                        required: true,
                        maxlength: 15
                    }
                }
            });
        });
    </script>
@endsection
