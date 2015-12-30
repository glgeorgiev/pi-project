<div class="col-sm-9">
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
</div>
<div class="col-sm-3 well">
    <div class="form-group">
        <a href="#selectImageModal" class="btn btn-info col-sm-12">
            {{ trans('common.select_image') }}
        </a>
        <div class="clearfix"></div>
    </div>
    <div class="form-group">
        <a href="#uploadImageModal" class="btn btn-info col-sm-12">
            {{ trans('common.upload_image') }}
        </a>
        <div class="clearfix"></div>
    </div>
    <div class="form-group">
        <div class="thumbnail col-sm-12">
            @if(isset($section) && $section->image)
                {!! HTML::image($section->image->url, 'selected image') !!}
            @else
                {!! HTML::image('assets/img/no-image.png', 'selected image') !!}
            @endif
        </div>
        <div class="clearfix"></div>
    </div>
    {!! Form::hidden('image_id', isset($section) ? $section->image_id : null) !!}
</div>
