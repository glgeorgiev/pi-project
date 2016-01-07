<div class="filter-form">
{!! Form::open(['method' => 'GET']) !!}
    <div class="form-group">
        <div class="col-sm-2">
            {!! Form::text('id', Request::input('id'),
            ['class' => 'form-control',
            'placeholder' => trans('common.id')]) !!}
        </div>
        <div class="col-sm-3">
            {!! Form::text('comment', Request::input('comment'),
            ['class' => 'form-control',
            'placeholder' => trans('common.comment')]) !!}
        </div>
        <div class="col-sm-2">
            {!! Form::text('after', Request::input('after'),
            ['class' => 'form-control datepicker',
            'placeholder' => trans('common.after')]) !!}
        </div>
        <div class="col-sm-2">
            {!! Form::text('before', Request::input('before'),
            ['class' => 'form-control datepicker',
            'placeholder' => trans('common.after')]) !!}
        </div>
        <div class="col-sm-3">
            {!! Form::submit(trans('common.search'),
            ['class' => 'btn btn-primary col-sm-12']) !!}
        </div>
    </div>
    <div class="clearfix"></div>
{!! Form::close() !!}
</div>
