@include('backend.partials.errors')

<div class="form-group">
    {!! Form::text('title', null,
    ['class' => 'form-control',
    'placeholder' => trans('image.fields.title')]) !!}
</div>

@if(isset($image))
    <div class="form-group thumbnail">
        {!! HTML::image($image->url, $image->title) !!}
    </div>

    <div class="form-group">
        {!! Form::submit(trans('image.edit'),
        ['class' => 'btn btn-warning col-sm-12']) !!}
    </div>
@else
    {!! Form::file('file') !!}

    <div class="form-group">
        {!! Form::submit(trans('image.create'),
        ['class' => 'btn btn-success col-sm-12']) !!}
    </div>
@endif
