@include('backend.partials.errors')

<div class="form-group">
    {!! Form::select('user_id', $user_list, null,
    ['class' => 'form-control', 'required' => 'required']) !!}
</div>

<div class="form-group">
    {!! Form::checkbox('permanent_ban', 1, null, ['id' => 'permanent_ban']) !!}
    {!! Form::label('permanent_ban', trans('common.permanent_ban')) !!}
</div>

<div class="form-group">
    {!! Form::text('until', null,
    ['class' => 'form-control datepicker',
    'placeholder' => trans('ban_user.fields.until')]) !!}
</div>

<div class="form-group">
    {!! Form::submit(trans('ban_user.create'),
    ['class' => 'btn btn-success col-sm-12']) !!}
</div>

@section('footer_script')
    <script>
        jQuery(function() {
            $('#permanent_ban').on('change', function() {
                $(':input[name="until"]').attr('disabled', $(this).is(':checked'));
            });
            $('form').on('submit', function() {
                if ($(':input[name="until"]').val() === '') {
                    $(':input[name="until"]').attr('disabled', true);
                }
            });
        });
    </script>
@endsection
