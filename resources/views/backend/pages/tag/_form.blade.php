<div class="col-sm-9">
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
</div>
<div class="col-sm-3 well">
    <div class="form-group">
        <a href="#selectImageModal" data-toggle="modal" class="btn btn-info col-sm-12">
            {{ trans('common.select_image') }}
        </a>
        <div class="clearfix"></div>
    </div>
    <div class="form-group">
        <a href="#uploadImageModal" data-toggle="modal" class="btn btn-info col-sm-12">
            {{ trans('common.upload_image') }}
        </a>
        <div class="clearfix"></div>
    </div>
    <div class="form-group">
        <div class="thumbnail col-sm-12">
            @if(isset($tag) && $tag->image)
                {!! HTML::image($tag->image->url, 'selected image') !!}
            @else
                {!! HTML::image('assets/img/no-image.png', 'selected image') !!}
            @endif
        </div>
        <div class="clearfix"></div>
    </div>
    {!! Form::hidden('image_id', isset($tag) ? $tag->image_id : null) !!}
</div>
