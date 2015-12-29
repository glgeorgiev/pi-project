@include('backend.partials.errors')

<div class="form-group">
    {!! Form::text('title', null,
    ['class' => 'form-control',
    'placeholder' => trans('menu.fields.title')]) !!}
</div>

<div class="form-group">
    {!! Form::text('url', null,
    ['class' => 'form-control',
    'placeholder' => trans('menu.fields.url')]) !!}
</div>

<div class="form-group">
    {!! Form::number('order', null,
    ['class' => 'form-control', 'min' => '1', 'max' => '999',
    'placeholder' => trans('menu.fields.order')]) !!}
</div>

@if(isset($menu))
    <div class="form-group">
        {!! Form::submit(trans('menu.edit'),
        ['class' => 'btn btn-warning col-sm-12']) !!}
    </div>
@else
    <div class="form-group">
        {!! Form::submit(trans('menu.create'),
        ['class' => 'btn btn-success col-sm-12']) !!}
    </div>
@endif
