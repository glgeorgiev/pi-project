@extends('backend')

@section('content')
    <div class="row-fluid">
        <section class="panel">
            <header class="panel-heading">
                <h3 class="pull-left">
                    {{ trans('section.edit') }}
                </h3>
                <a class="pull-right btn btn-primary"
                   href="{{ route('admin.section.index') }}">
                    {{ trans('section.index') }}
                </a>
                <div class="clearfix"></div>
            </header>
            <div class="panel-body">
                {!! Form::model($section, ['method' => 'PATCH', 'files' => true,
                    'url' => route('admin.section.update', ['section' => $section])]) !!}
                    @include('backend.pages.section._form')
                {!! Form::close() !!}
            </div>
        </section>
    </div>
@endsection
