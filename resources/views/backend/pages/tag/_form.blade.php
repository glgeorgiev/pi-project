<div class="col-sm-9">
    @include('backend.partials.errors')

    <div class="form-group">
        {!! Form::text('title', null,
        ['class' => 'form-control', 'required' => 'required',
        'placeholder' => trans('tag.fields.title')]) !!}
    </div>

    <div class="form-group">
        {!! Form::text('slug', null,
        ['class' => 'form-control', 'required' => 'required',
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
</div>
<div class="col-sm-3 well">
    @include('backend.partials.right_form', isset($tag) ? ['record' => $tag] : [])
</div>

@section('footer_script')
    {!! HTML::script('assets/js/images.js') !!}
@endsection
