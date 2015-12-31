<div class="filter-form">
{!! Form::open(['method' => 'GET']) !!}
    <div class="form-group">
        <div class="col-sm-1">
            {!! Form::text('id', Request::input('id'),
            ['class' => 'form-control',
            'placeholder' => trans('common.id')]) !!}
        </div>
        <div class="col-sm-3">
            {!! Form::text('name', Request::input('name'),
            ['class' => 'form-control',
            'placeholder' => trans('common.name')]) !!}
        </div>
        <div class="col-sm-3">
            {!! Form::text('email', Request::input('email'),
            ['class' => 'form-control',
            'placeholder' => trans('common.email')]) !!}
        </div>
        <div class="col-sm-2">
            {!! Form::select('is_admin', [
                ''  => trans('user.is_admin.all'),
                '1' => trans('user.is_admin.true'),
                '0' => trans('user.is_admin.false'),
            ], Request::input('is_admin'),
            ['class' => 'form-control']) !!}
        </div>
        <div class="col-sm-3">
            {!! Form::submit(trans('common.search'),
            ['class' => 'btn btn-primary col-sm-12']) !!}
        </div>
    </div>
    <div class="clearfix"></div>
{!! Form::close() !!}
</div>
