<div class="col-sm-9">
    @include('backend.partials.errors')

    <div class="form-group">
        {!! Form::text('name', null,
        ['class' => 'form-control', 'required' => 'required',
        'placeholder' => trans('language.fields.title')]) !!}
    </div>

    @if(isset($language))
        <div class="form-group">
            {!! Form::submit(trans('language.edit'),
            ['class' => 'btn btn-warning col-sm-12']) !!}
        </div>
    @else
        <div class="form-group">
            {!! Form::submit(trans('language.create'),
            ['class' => 'btn btn-success col-sm-12']) !!}
        </div>
    @endif
</div>
<div class="col-sm-3 well">
    @include('backend.partials.right_form', isset($language) ? ['record' => $language] : [])
</div>
