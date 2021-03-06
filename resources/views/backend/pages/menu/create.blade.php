@extends('backend')

@section('content')
    <div class="row-fluid">
        <section class="panel">
            <header class="panel-heading">
                <h3 class="pull-left">
                    {{ trans('menu.create') }}
                </h3>
                <a class="pull-right btn btn-primary"
                   href="{{ route('admin.menu.index') }}">
                    {{ trans('menu.index') }}
                </a>
                <div class="clearfix"></div>
            </header>
            <div class="panel-body">
                {!! Form::open(['method' => 'POST', 'files' => true,
                    'url' => route('admin.menu.store'),
                    'class' => 'menu-form']) !!}
                    @include('backend.pages.menu._form')
                {!! Form::close() !!}
            </div>
        </section>
    </div>
@endsection
