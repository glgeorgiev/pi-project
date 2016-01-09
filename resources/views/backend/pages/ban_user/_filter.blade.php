<div class="filter-form">
{!! Form::open(['method' => 'GET']) !!}
    <div class="form-group">
        <div class="col-sm-3">
            {!! Form::text('id', Request::input('id'),
            ['class' => 'form-control',
            'placeholder' => trans('common.id')]) !!}
        </div>
        <div class="col-sm-6">
            {!! Form::select('user_id',
            ['' => trans('common.user')] + $user_list,
            Request::input('user_id'),
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
