@extends('backend')

@section('content')
    <div class="row-fluid">
        <section class="panel">
            <header class="panel-heading">
                <h3 class="pull-left">
                    {{ trans('page.edit') }}
                </h3>
                <a class="pull-right btn btn-primary"
                   href="{{ route('admin.page.index') }}">
                    {{ trans('page.index') }}
                </a>
                <div class="clearfix"></div>
            </header>
            <div class="panel-body">
                {!! Form::model($page, ['method' => 'PATCH', 'files' => true,
                    'url' => route('admin.page.update', ['page' => $page]),
                    'class' => 'page-form']) !!}
                    @include('backend.pages.page._form')
                {!! Form::close() !!}
            </div>
        </section>
    </div>
    @include('backend.partials.modals.select_image')
    @include('backend.partials.modals.upload_image')
@endsection
