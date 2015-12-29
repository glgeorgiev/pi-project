@extends('auth')

@section('content')
    <div class="col-sm-6 col-sm-offset-3" style="padding-top: 20px;">
        {!! Form::open(['method' => 'POST']) !!}
        {!! Form::hidden('remember', '1') !!}

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
            {!! Form::submit(trans('common.login'),
            ['class' => 'btn btn-success col-sm-12']) !!}
        </div>
        {!! Form::close() !!}
    </div>
@endsection
