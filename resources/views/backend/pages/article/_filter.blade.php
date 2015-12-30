<div class="filter-form">
{!! Form::open(['method' => 'GET']) !!}
    <div class="form-group">
        <div class="col-sm-2">
            {!! Form::text('id', Request::input('id'),
            ['class' => 'form-control',
            'placeholder' => trans('common.id')]) !!}
        </div>
        <div class="col-sm-4">
            {!! Form::text('title', Request::input('title'),
            ['class' => 'form-control',
            'placeholder' => trans('common.title')]) !!}
        </div>
        <div class="col-sm-4">
            {!! Form::select('section_id', $section_list,
            Request::input('section_id'), ['class' => 'form-control']) !!}
        </div>
        <div class="col-sm-3">
            {!! Form::submit(trans('common.search'),
            ['class' => 'btn btn-primary col-sm-12']) !!}
        </div>
    </div>
    <div class="clearfix"></div>
{!! Form::close() !!}
</div>
