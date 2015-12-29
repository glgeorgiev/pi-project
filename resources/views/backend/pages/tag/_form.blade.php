@include('backend.partials.errors')

<div class="form-group">
    {!! Form::text('title', null,
    ['class' => 'form-control',
    'placeholder' => trans('tag.fields.title')]) !!}
</div>

<div class="form-group">
    {!! Form::text('slug', null,
    ['class' => 'form-control',
    'placeholder' => trans('tag.fields.slug')]) !!}
</div>

<div class="form-group">
    {!! Form::textarea('description', null,
    ['class' => 'form-control', 'rows' => '5',
    'placeholder' => trans('tag.fields.description')]) !!}
</div>

@if(isset($tag))
    <div class="form-group">
        {!! Form::submit(trans('tag.edit'),
        ['class' => 'btn btn-warning col-sm-12']) !!}
    </div>
@else
    <div class="form-group">
        {!! Form::submit(trans('tag.create'),
        ['class' => 'btn btn-success col-sm-12']) !!}
    </div>
@endif
