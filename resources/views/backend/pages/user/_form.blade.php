@include('backend.partials.errors')

<div class="form-group">
    {!! Form::text('name', null,
    ['class' => 'form-control', 'required' => 'required',
    'placeholder' => trans('user.fields.name')]) !!}
</div>

<div class="form-group">
    {!! Form::text('email', null,
    ['class' => 'form-control', 'required' => 'required',
    'placeholder' => trans('user.fields.email')]) !!}
</div>

<div class="form-group">
    {!! Form::password('password',
    ['class' => 'form-control',
    'placeholder' => trans('user.fields.password')]) !!}
</div>

<div class="form-group">
    {!! Form::password('password_confirmation',
    ['class' => 'form-control',
    'placeholder' => trans('user.fields.password_confirmation')]) !!}
</div>

<div class="form-group">
    {!! Form::hidden('is_admin', 0) !!}
    {!! Form::checkbox('is_admin', 1, null,
    ['id' => 'is_admin']) !!}
    {!! Form::label('is_admin', trans('user.fields.is_admin')) !!}
</div>

<div class="form-group">
    {!! Form::file('avatar') !!}
</div>

@if(isset($user))
    <div class="form-group">
        @if($user->avatar_ext)
            {!! HTML::image($user->avatar_url,
            $user->email, ['class' => 'thumbnail col-sm-4']) !!}
        @else
            {!! HTML::image('assets/img/no-image.png',
            $user->email, ['class' => 'thumbnail col-sm-4']) !!}
        @endif
    </div>

    <div class="form-group">
        {!! Form::submit(trans('user.edit'),
        ['class' => 'btn btn-warning col-sm-12']) !!}
    </div>
@else
    <div class="form-group">
        {!! Form::submit(trans('user.create'),
        ['class' => 'btn btn-success col-sm-12']) !!}
    </div>
@endif

@section('footer_script')
    <script>
        jQuery(function($) {
            $('.user-form').validate({
                rules: {
                    name: {
                        required: true,
                        maxlength: 255
                    },
                    email: {
                        required: true,
                        email: true,
                        maxlength: 255,
                        remote: '{{ route('admin.validate.user.email') }}'
                    },
                    password: {
                        minlength: 6

                    },
                    password_confirmation: {
                        equalTo: 'input[name="password"]'
                    }
                }
            });
        });
    </script>
@endsection
