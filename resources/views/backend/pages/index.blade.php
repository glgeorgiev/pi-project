@extends('backend')

@section('content')
    <div class="col-sm-6">
        <section class="panel">
            <header class="panel-heading">
                <h3>{{ trans('common.latest_articles') }}</h3>
            </header>
            <div class="panel-body">
                @foreach($articles as $article)
                    <a href="{{ route('admin.article.edit', ['article' => $article->id]) }}">
                        <div class="col-sm-12 bordered-div">
                            <div class="col-sm-4">
                                @if($article->image)
                                    {!! HTML::image($article->image->url,
                                    $article->title, ['class' => 'thumbnail col-sm-12']) !!}
                                @else
                                    {!! HTML::image('assets/img/no-image.png',
                                    $article->title, ['class' => 'thumbnail col-sm-12']) !!}
                                @endif
                                <small>{{ $article->updated_at->diffForHumans() }}</small>
                            </div>
                            <div class="col-sm-8">
                                <h4>{{ $article->title }}</h4>
                                <p>{{ $article->description }}</p>
                                @if($article->section)
                                    <p>
                                        {{ trans('common.section') }}:
                                        {{ $article->section->title }}
                                    </p>
                                @endif
                                @if($article->user)
                                    <p>
                                        {{ trans('common.author') }}:
                                        {{ $article->user->name }}
                                    </p>
                                @endif
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </section>
    </div>
    <div class="col-sm-6">
        <section class="panel">
            <header class="panel-heading">
                <h3>{{ trans('common.latest_comments') }}</h3>
            </header>
            <div class="panel-body">
                @foreach($comments as $comment)
                    @if($comment->user && $comment->article)
                        <div class="col-sm-12 bordered-div">
                            <div class="col-sm-4">
                                @if($comment->user->avatar_ext)
                                    {!! HTML::image($comment->user->avatar_url,
                                    $comment->user->email, ['class' => 'thumbnail col-sm-12']) !!}
                                @else
                                    {!! HTML::image('assets/img/no-image.png',
                                    $comment->user->email, ['class' => 'thumbnail col-sm-12']) !!}
                                @endif

                                <small>{{ $comment->created_at->diffForHumans() }}</small>
                            </div>
                            <div class="col-sm-8">
                                <a href="{{ route('admin.article.edit',
                                    ['article' => $comment->article->id]) }}">
                                    <h4>
                                        {{ $comment->article->title }}
                                    </h4>
                                </a>
                                <a href="{{ route('admin.user.edit',
                                    ['user' => $comment->user->id]) }}">
                                    <p>
                                        {{ $comment->user->name }}
                                        <br>
                                        ({{ $comment->user->email }})
                                    </p>
                                </a>
                                <p class="bordered-p">
                                    {{ $comment->comment }}
                                </p>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </section>
    </div>
@endsection
