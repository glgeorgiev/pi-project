@include('backend.partials.errors')

<div class="form-group">
    {!! Form::text('title', null,
    ['class' => 'form-control',
    'placeholder' => trans('section.fields.title')]) !!}
</div>

<div class="form-group">
    {!! Form::text('slug', null,
    ['class' => 'form-control',
    'placeholder' => trans('section.fields.slug')]) !!}
</div>

<div class="form-group">
    {!! Form::textarea('description', null,
    ['class' => 'form-control', 'rows' => '5',
    'placeholder' => trans('section.fields.description')]) !!}
</div>

<div class="form-group">
    {!! Form::number('order', null,
    ['class' => 'form-control', 'min' => '1', 'max' => '999',
    'placeholder' => trans('section.fields.order')]) !!}
</div>

@if(isset($section))
    <div class="form-group">
        {!! Form::submit(trans('section.edit'),
        ['class' => 'btn btn-warning col-sm-12']) !!}
    </div>
@else
    <div class="form-group">
        {!! Form::submit(trans('section.create'),
        ['class' => 'btn btn-success col-sm-12']) !!}
    </div>
@endif
