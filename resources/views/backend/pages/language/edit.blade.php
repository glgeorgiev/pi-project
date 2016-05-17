@extends('backend')

@section('content')
    <div class="row-fluid">
        <section class="panel">
            <header class="panel-heading">
                <h3 class="pull-left">
                    {{ trans('language.edit') }}
                </h3>
                <a class="pull-right btn btn-primary"
                   href="{{ route('admin.language.index') }}">
                    {{ trans('language.index') }}
                </a>
                <div class="clearfix"></div>
            </header>
            <div class="panel-body">
                {!! Form::model($language, ['method' => 'PATCH', 'files' => true,
                    'url' => route('admin.language.update', ['language' => $language]),
                    'class' => 'language-form']) !!}
                    @include('backend.pages.language._form')
                {!! Form::close() !!}
            </div>
        </section>
    </div>
    @include('backend.partials.modals.select_image')
    @include('backend.partials.modals.upload_image')
@endsection
