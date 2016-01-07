@extends('frontend')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h1 class="main-heading">{{ $article->title }}</h1>
        </div>
        <div class="panel-body">
            @if($article->image)
                <div class="main-article-image thumbnail">
                    {!! HTML::image($article->image->url, $article->title) !!}
                </div>
            @endif
            <div class="col-sm-12 well">
                <div class="col-sm-4">
                    <i class="fa fa-calendar"></i>
                    {{ $article->created_at->format('d.m.Y') }}
                    <i class="fa fa-clock-o"></i>
                    {{ $article->created_at->format('H:i') }}
                </div>
                <div class="col-sm-4">
                    <a href="{{ route('section',
                    ['section_slug' => $article->section->slug]) }}">
                        {{ $article->section->title }}
                    </a>
                </div>
                @if($article->user)
                    <div class="col-sm-4">
                        Написана от {{ $article->user->name }}
                    </div>
                @endif
            </div>
            <div class="thumbnail">
                <div class="article-description">
                    {{ $article->description }}
                </div>
                <div class="article-content">
                    {{ $article->content }}
                </div>
            </div>
            <div class="well col-sm-12">
                <div class="col-sm-4">
                    <i class="fa fa-eye"></i> {{ $article->views }} прегледа
                </div>
                <div class="col-sm-4">
                    {{--TODO FB SHARE--}}
                </div>
                <div class="col-sm-4 text-right like-dislike-forms">
                    {!! Form::open(['url' => route('rate'), 'method' => 'POST']) !!}
                        {!! Form::hidden('article_id', $article->id) !!}
                        {!! Form::hidden('like', 1) !!}
                        <div class="col-sm-6 like-dislike-btns">
                            {!! Form::button('<i class="fa fa-thumbs-up"></i>
                            <span class="article-likes">' . $article->likes . '</span>',
                            ['type' => 'submit', 'class' => 'form-control']) !!}
                        </div>
                    {!! Form::close() !!}
                    {!! Form::open(['url' => route('rate'), 'method' => 'POST']) !!}
                        {!! Form::hidden('article_id', $article->id) !!}
                        {!! Form::hidden('like', 0) !!}
                        <div class="col-sm-6 like-dislike-btns">
                            {!! Form::button('<i class="fa fa-thumbs-down"></i>
                            <span class="article-dislikes">' . $article->dislikes . '</span>',
                            ['type' => 'submit', 'class' => 'form-control']) !!}
                        </div>
                    {!! Form::close() !!}
                    <div class="article-likes-dislikes-error"></div>
                </div>
            </div>
            @if(isset($tags) && count($tags))
                <div>
                    Етикети:
                    <ul class="nav nav-tabs article-tags">
                        @foreach($tags as $tag)
                            <li>
                                <a href="{{ route('tag',
                                    ['tag_slug' => $tag->slug]) }}">
                                    {{ $tag->title }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="panel panel-default article-comments">
                <div class="panel-heading">
                    <h4>Коментари</h4>
                </div>
                <div class="panel-body">
                    @if(Auth::check())
                        @include('frontend.partials.comment_form')
                    @else
                        <div class="col-sm-12 text-center">
                            <strong>Трябва да сте логнати в профила си за да коментирате!</strong>
                        </div>
                        <div class="col-sm-12">
                            <a class="col-sm-4 btn btn-success"
                               href="{{ route('login', ['redirect_url' => Request::fullUrl()]) }}">
                                Вход
                            </a>
                            <a class="col-sm-4 col-sm-offset-4 btn btn-info"
                               href="{{ route('register', ['redirect_url' => Request::fullUrl()]) }}">
                                Регистрация
                            </a>
                        </div>
                    @endif
                    <div class="article-comments-container">
                        @include('frontend.partials.comments')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
