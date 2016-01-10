@extends('backend')

@section('content')
    <div class="row-fluid">
        <section class="panel">
            <header class="panel-heading">
                <h3 class="pull-left">
                    {{ trans('image.create') }}
                </h3>
                <a class="pull-right btn btn-primary"
                   href="{{ route('admin.image.index') }}">
                    {{ trans('image.index') }}
                </a>
                <div class="clearfix"></div>
            </header>
            <div class="panel-body">
                {!! Form::open(['method' => 'POST', 'files' => true,
                    'url' => route('admin.image.store'),
                    'class' => 'image-form']) !!}
                    @include('backend.pages.image._form')
                {!! Form::close() !!}
            </div>
        </section>
    </div>
@endsection
