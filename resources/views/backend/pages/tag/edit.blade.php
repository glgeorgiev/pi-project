@extends('backend')

@section('content')
    <div class="row-fluid">
        <section class="panel">
            <header class="panel-heading">
                <h3 class="pull-left">
                    {{ trans('tag.edit') }}
                </h3>
                <a class="pull-right btn btn-primary"
                   href="{{ route('admin.tag.index') }}">
                    {{ trans('tag.index') }}
                </a>
                <div class="clearfix"></div>
            </header>
            <div class="panel-body">
                {!! Form::model($tag, ['method' => 'PATCH', 'files' => true,
                    'url' => route('admin.tag.update', ['tag' => $tag])]) !!}
                    @include('backend.pages.tag._form')
                {!! Form::close() !!}
            </div>
        </section>
    </div>
@endsection
