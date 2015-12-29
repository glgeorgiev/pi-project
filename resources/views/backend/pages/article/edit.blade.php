@extends('backend')

@section('content')
    <div class="row-fluid">
        <section class="panel">
            <header class="panel-heading">
                <h3 class="pull-left">
                    {{ trans('article.edit') }}
                </h3>
                <a class="pull-right btn btn-primary"
                   href="{{ route('admin.article.index') }}">
                    {{ trans('article.index') }}
                </a>
                <div class="clearfix"></div>
            </header>
            <div class="panel-body">
                {!! Form::model($article, ['method' => 'PATCH', 'files' => true,
                    'url' => route('admin.article.update', ['article' => $article])]) !!}
                    @include('backend.pages.article._form')
                {!! Form::close() !!}
            </div>
        </section>
    </div>
@endsection
