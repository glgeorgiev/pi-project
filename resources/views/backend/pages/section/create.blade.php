@extends('backend')

@section('content')
    <div class="row-fluid">
        <section class="panel">
            <header class="panel-heading">
                <h1 class="pull-left">
                    {{ trans('section.create') }}
                </h1>
                <a class="pull-right btn btn-primary"
                   href="{{ route('admin.section.index') }}">
                    {{ trans('section.index') }}
                </a>
            </header>
            <div class="panel-body">
                {!! Form::open(['method' => 'POST', 'files' => true,
                    'url' => route('admin.section.store')]) !!}
                    @include('backend.pages.section._form')
                {!! Form::close() !!}
            </div>
        </section>
    </div>
@endsection
