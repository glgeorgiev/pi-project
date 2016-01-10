@extends('backend')

@section('content')
    <div class="row-fluid">
        <section class="panel">
            <header class="panel-heading">
                <h3 class="pull-left">
                    {{ trans('ban_ip.create') }}
                </h3>
                <a class="pull-right btn btn-primary"
                   href="{{ route('admin.ban_ip.index') }}">
                    {{ trans('ban_ip.index') }}
                </a>
                <div class="clearfix"></div>
            </header>
            <div class="panel-body">
                {!! Form::open(['method' => 'POST', 'files' => true,
                    'url' => route('admin.ban_ip.store'),
                    'class' => 'ban_ip-form']) !!}
                    @include('backend.pages.ban_ip._form')
                {!! Form::close() !!}
            </div>
        </section>
    </div>
@endsection
