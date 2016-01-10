@extends('frontend')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h1 class="main-heading">Регистрация</h1>
        </div>
        <div class="panel-body">
            {!! Form::open(['method' => 'POST', 'files' => true,
            'class' => 'register-form']) !!}
            @if(Request::has('redirect_url'))
                {!! Form::hidden('redirect_url',
                Request::input('redirect_url')) !!}
            @endif

            @include('frontend.partials.errors')

            <div class="form-group clearfix">
                {!! Form::label('email', 'Email',
                ['class' => 'col-sm-3 control-label text-right']) !!}
                <div class="col-sm-9">
                    {!! Form::email('email', null,
                    ['class' => 'form-control', 'required' => 'required']) !!}
                </div>
            </div>

            <div class="form-group clearfix">
                {!! Form::label('name', 'Име',
                ['class' => 'col-sm-3 control-label text-right']) !!}
                <div class="col-sm-9">
                    {!! Form::text('name', null,
                    ['class' => 'form-control', 'required' => 'required']) !!}
                </div>
            </div>

            <div class="form-group clearfix">
                {!! Form::label('password', 'Парола',
                ['class' => 'col-sm-3 control-label text-right']) !!}
                <div class="col-sm-9">
                    {!! Form::password('password',
                    ['class' => 'form-control', 'required' => 'required']) !!}
                </div>
            </div>

            <div class="form-group clearfix">
                {!! Form::label('password_confirmation', 'Парола (отново)',
                ['class' => 'col-sm-3 control-label text-right']) !!}
                <div class="col-sm-9">
                    {!! Form::password('password_confirmation',
                    ['class' => 'form-control', 'required' => 'required']) !!}
                </div>
            </div>

            <div class="form-group clearfix">
                {!! Form::label('avatar', 'Аватар',
                ['class' => 'col-sm-3 control-label text-right']) !!}
                <div class="col-sm-9">
                    {!! Form::file('avatar') !!}
                </div>
            </div>

            <div class="form-group clearfix">
                <div class="col-sm-offset-3 col-sm-9">
                    {!! Form::submit('Регистрирай се',
                    ['class' => 'btn btn-success col-sm-12']) !!}
                </div>
            </div>

            {!! Form::close() !!}
        </div>
    </div>
@endsection
