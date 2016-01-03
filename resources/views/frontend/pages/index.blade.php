@extends('frontend')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">Последни статии</div>
        <div class="panel-body">
            @foreach($articles as $article)
                @if($article->section && $article->user)
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h2>
                                <a href="{{ route('article',
                                    ['section_slug' => $article->section->slug,
                                    'article_slug' => $article->slug]) }}">
                                    {{ $article->title }}
                                </a>
                            </h2>
                        </div>
                        <div class="panel-body">
                            <div class="col-sm-8 thumbnail">
                                <a href="{{ route('article',
                                    ['section_slug' => $article->section->slug,
                                    'article_slug' => $article->slug]) }}">
                                    @if($article->image)
                                        {!! HTML::image($article->image->url, $article->title) !!}
                                    @else
                                        {!! HTML::image('assets/img/no-image.png', $article->title) !!}
                                    @endif
                                </a>
                            </div>
                            <div class="col-sm-4">
                                <small>
                                    <i class="fa fa-calendar"></i> {{ $article->created_at->format('d.m.Y, l') }}
                                    <i class="fa fa-clock-o"></i> {{ $article->created_at->format('H:i') }}
                                </small>
                                <p>
                                    <a href="{{ route('section',
                                        ['section_slug' => $article->section->slug]) }}">
                                        {{ $article->section->title }}
                                    </a>
                                </p>
                                <p>
                                    Автор: {{ $article->user->name }}
                                </p>
                                <p>
                                    Прочитания: {{ $article->views }}
                                    <i class="fa fa-thumbs-up"></i> {{ $article->likes }}
                                    <i class="fa fa-thumbs-down"></i> {{ $article->dislikes }}
                                </p>
                                <p>
                                    @foreach($article->tags as $tag)
                                        <a href="{{ route('tag', ['tag_slug' => $tag->slug]) }}"
                                            class="label label-default">
                                            {{ $tag->title }}
                                        </a>&nbsp;
                                    @endforeach
                                </p>
                            </div>
                            <div class="col-sm-12">
                                <p>{{ $article->description }}</p>
                                <a href="{{ route('article',
                                    ['section_slug' => $article->section->slug,
                                    'article_slug' => $article->slug]) }}">
                                    Прочети повече
                                </a>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
@endsection
