<div class="filter-form">
{!! Form::open(['method' => 'GET']) !!}
    <div class="form-group">
        <div class="col-sm-3">
            {!! Form::text('id', Request::input('id'),
            ['class' => 'form-control',
            'placeholder' => trans('common.id')]) !!}
        </div>
        <div class="col-sm-6">
            {!! Form::text('title', Request::input('title'),
            ['class' => 'form-control',
            'placeholder' => trans('common.title')]) !!}
        </div>
        <div class="col-sm-3">
            {!! Form::submit(trans('common.search'),
            ['class' => 'btn btn-primary col-sm-12']) !!}
        </div>
    </div>
{!! Form::close() !!}
</div>
