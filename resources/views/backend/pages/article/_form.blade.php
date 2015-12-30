<div class="col-sm-9">
    @include('backend.partials.errors')

    <div class="form-group">
        {!! Form::text('title', null,
        ['class' => 'form-control', 'required' => 'required',
        'placeholder' => trans('article.fields.title')]) !!}
    </div>

    <div class="form-group">
        {!! Form::text('slug', null,
        ['class' => 'form-control', 'required' => 'required',
        'placeholder' => trans('article.fields.slug')]) !!}
    </div>

    <div class="form-group">
        {!! Form::textarea('description', null,
        ['class' => 'form-control', 'rows' => '5',
        'placeholder' => trans('article.fields.description')]) !!}
    </div>

    <div class="form-group">
        {!! Form::textarea('content', null,
        ['class' => 'form-control', 'rows' => '10',
        'placeholder' => trans('article.fields.content')]) !!}
    </div>

    <div class="form-group">
        {!! Form::select('section_id', $section_list, null,
        ['class' => 'form-control',  'required' => 'required']) !!}
    </div>

    <div class="form-group">
        {!! Form::text('tag_list', null,
        ['class' => 'form-control',
        'placeholder' => trans('article.fields.tags')]) !!}
    </div>

    @if(isset($article))
        <div class="form-group">
            {!! Form::submit(trans('article.edit'),
            ['class' => 'btn btn-warning col-sm-12']) !!}
        </div>
    @else
        <div class="form-group">
            {!! Form::submit(trans('article.create'),
            ['class' => 'btn btn-success col-sm-12']) !!}
        </div>
    @endif
</div>
<div class="col-sm-3 well">
    @include('backend.partials.right_form', isset($article) ? ['record' => $article] : [])
</div>

@section('footer_script')
    {!! HTML::script('assets/js/images.js') !!}
    <script>
        jQuery(function($) {
            $(':input[name="tag_list"]').tagsInput({
                width:'auto',
                defaultText: '{{ trans('article.field.tags') }}',
                minChars: 2
            });
        });
    </script>
@endsection
