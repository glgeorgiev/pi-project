@extends('backend')

@section('content')
    <div class="row-fluid">
        <section class="panel">
            <header class="panel-heading">
                <h3 class="pull-left">
                    {{ trans('poll.edit') }}
                </h3>
                <a class="pull-right btn btn-primary"
                   href="{{ route('admin.poll.index') }}">
                    {{ trans('poll.index') }}
                </a>
                <div class="clearfix"></div>
            </header>
            <div class="panel-body">
                {!! Form::model($poll, ['method' => 'PATCH', 'files' => true,
                    'url' => route('admin.poll.update', ['poll' => $poll])]) !!}
                    @include('backend.pages.poll._form')
                {!! Form::close() !!}
            </div>
        </section>
    </div>
@endsection
