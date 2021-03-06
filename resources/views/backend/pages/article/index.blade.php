@extends('backend')

@section('content')
    <div class="row-fluid">
        <section class="panel">
            <header class="panel-heading">
                <h3 class="pull-left">
                    {{ trans('article.index') }}
                </h3>
                <a class="pull-right btn btn-success"
                    href="{{ route('admin.article.create') }}">
                    {{ trans('article.create') }}
                </a>
                <div class="clearfix"></div>
            </header>
            <div class="panel-body">
                @include('backend.pages.article._filter')
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>{{ trans('common.id') }}</th>
                        <th>{{ trans('article.fields.title') }}</th>
                        <th>{{ trans('article.fields.slug') }}</th>
                        <th>{{ trans('article.fields.section') }}</th>
                        <th>{{ trans('article.fields.views') }}</th>
                        <th>{{ trans('article.fields.likes_dislikes') }}</th>
                        <th>{{ trans('common.updated_at') }}</th>
                        <th>{{ trans('common.options') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($articles as $article)
                        <tr>
                            <td>{{ $article->id }}</td>
                            <td>
                                <a href="{{ route('admin.article.edit',
                                    ['article' => $article->id]) }}">
                                    {{ $article->title }}
                                </a>
                            </td>
                            <td>
                                @if($article->section && $article->section->slug && $article->slug)
                                    <a href="{{ route('article',
                                        ['section_slug' => $article->section->slug,
                                        'article_slug' => $article->slug]) }}">
                                        {{ $article->slug }}
                                    </a>
                                @else
                                    {{ $article->slug }}
                                @endif
                            </td>
                            <td>
                                @if($article->section)
                                    <a href="{{ route('admin.section.edit',
                                        ['section' => $article->section->id]) }}">
                                        {{ $article->section->title }}
                                    </a>
                                @else
                                    -
                                @endif
                            </td>
                            <td>{{ $article->views }}</td>
                            <td>
                                <i class="fa fa-thumbs-up"></i> {{ $article->likes }}
                                <i class="fa fa-thumbs-down"></i> {{ $article->dislikes }}
                            </td>
                            <td>{{ $article->updated_at->toRfc2822String() }}</td>
                            <td>
                                <a class="btn btn-sm btn-info"
                                    href="{{ route('admin.article.show',
                                    ['article' => $article->id]) }}">
                                    <i class="fa fa-eye"></i>
                                </a>

                                <a class="btn btn-sm btn-warning"
                                    href="{{ route('admin.article.edit',
                                    ['article' => $article->id]) }}">
                                    <i class="fa fa-edit"></i>
                                </a>

                                <a class="btn btn-sm btn-danger"
                                   href="#destroyModal" data-toggle="modal"
                                   data-url="{{ route('admin.article.destroy',
                                    ['article' => $article->id]) }}"
                                   data-text="{{ trans('common.destroy_article',
                                   ['id' => $article->id, 'title' => $article->title]) }}">
                                    <i class="fa fa-trash-o"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="text-center">
                    {!! $articles->appends(Request::all())->render() !!}
                </div>
            </div>
        </section>
    </div>
    @include('backend.partials.modals.destroy')
@endsection
