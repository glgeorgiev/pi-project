@extends('backend')

@section('content')
    <div class="row-fluid">
        <section class="panel">
            <header class="panel-heading">
                <h3 class="pull-left">
                    {{ trans('ban_user.create') }}
                </h3>
                <a class="pull-right btn btn-primary"
                   href="{{ route('admin.ban_user.index') }}">
                    {{ trans('ban_user.index') }}
                </a>
                <div class="clearfix"></div>
            </header>
            <div class="panel-body">
                {!! Form::open(['method' => 'POST', 'files' => true,
                    'url' => route('admin.ban_user.store')]) !!}
                    @include('backend.pages.ban_user._form')
                {!! Form::close() !!}
            </div>
        </section>
    </div>
@endsection
