@include('backend.partials.errors')

<div class="form-group">
    {!! Form::text('name', null,
    ['class' => 'form-control', 'required' => 'required',
    'placeholder' => trans('user.fields.title')]) !!}
</div>

<div class="form-group">
    {!! Form::text('email', null,
    ['class' => 'form-control', 'required' => 'required',
    'placeholder' => trans('user.fields.slug')]) !!}
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
        {!! Form::submit(trans('user.edit'),
        ['class' => 'btn btn-warning col-sm-12']) !!}
    </div>
@else
    <div class="form-group">
        {!! Form::submit(trans('user.create'),
        ['class' => 'btn btn-success col-sm-12']) !!}
    </div>
@endif
