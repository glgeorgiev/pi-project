@extends('auth')

@section('content')
    <div class="col-sm-6 col-sm-offset-3" style="padding-top: 20px;">
        {!! Form::open(['method' => 'POST']) !!}
        {!! Form::hidden('token', $token) !!}

        @include('backend.partials.errors')

        <div class="form-group">
            {!! Form::email('email', null,
            ['class' => 'form-control',
            'placeholder' => trans('validation.attributes.email')]) !!}
        </div>

        <div class="form-group">
            {!! Form::password('password',
            ['class' => 'form-control',
            'placeholder' => trans('validation.attributes.password')]) !!}
        </div>

        <div class="form-group">
            {!! Form::password('password_confirmation',
            ['class' => 'form-control',
            'placeholder' => trans('validation.attributes.password')]) !!}
        </div>

        <div class="form-group">
            {!! Form::submit(trans('common.reset'),
            ['class' => 'btn btn-success col-sm-12']) !!}
        </div>
        {!! Form::close() !!}
    </div>
@endsection
