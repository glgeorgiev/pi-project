@extends('backend')

@section('content')
    <div class="row-fluid">
        <section class="panel">
            <header class="panel-heading">
                <h3 class="pull-left">
                    {{ trans('user.edit') }}
                </h3>
                <a class="pull-right btn btn-primary"
                   href="{{ route('admin.user.index') }}">
                    {{ trans('user.index') }}
                </a>
                <div class="clearfix"></div>
            </header>
            <div class="panel-body">
                {!! Form::model($user, ['method' => 'PATCH', 'files' => true,
                    'url' => route('admin.user.update', ['user' => $user]),
                    'class' => 'user-form']) !!}
                    @include('backend.pages.user._form')
                {!! Form::close() !!}
            </div>
        </section>
    </div>
    @include('backend.partials.modals.select_image')
    @include('backend.partials.modals.upload_image')
@endsection
