<div class="panel panel-success">
    <div class="panel-heading">
        <h3 class="panel-title">Секции</h3>
    </div>
    <div class="panel-body">
        <ul class="nav">
            @foreach($sections as $section)
                <li>
                    <a href="{{ route('section',
                        ['section_slug' => $section->slug]) }}">
                        @if($section->image)
                            {!! HTML::image($section->image->url,
                            $section->title, ['class' => 'sm-image']) !!}
                        @else
                            {!! HTML::image('assets/img/no-image.png',
                            $section->title, ['class' => 'sm-image']) !!}
                        @endif
                        {{ $section->title }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</div>
@if(isset($poll))
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Анкета</h3>
        </div>
        <div class="panel-body">
            <h4>{{ $poll->title }}</h4>
            <p>{{ $poll->description }}</p>
            @foreach($poll->poll_answers as $answer)
                {!! Form::checkbox('answer', $answer->id, false,
                ['id' => 'answer_' . $answer->id]) !!}
                {!! Form::label('answer_' . $answer->id, $answer->answer) !!}
            @endforeach
        </div>
    </div>
@endif
<div class="panel panel-success">
    <div class="panel-heading">
        <h3 class="panel-title">Етикети</h3>
    </div>
    <div class="panel-body">
        @foreach($sidebar_tags as $sidebar_tag)
            <a href="{{ route('tag', ['tag_slug' => $sidebar_tag->slug]) }}"
                class="label label-success">
                {{ $sidebar_tag->title }}
            </a>&nbsp;
        @endforeach
    </div>
</div>
@if(isset($most_read_articles) && count($most_read_articles))
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Най-четени статии за последния месец</h3>
        </div>
        <div class="panel-body">
            <ul class="nav">
                @foreach($most_read_articles as $most_read_article)
                    @if($most_read_article->section)
                        <li>
                            <a href="{{ route('article', [
                                'section_slug' => $most_read_article->section->slug,
                                'article_slug' => $most_read_article->slug,
                            ]) }}">
                                @if($most_read_article->image)
                                    {!! HTML::image($most_read_article->image->url,
                                    $most_read_article->title, ['class' => 'sm-image']) !!}
                                @else
                                    {!! HTML::image('assets/img/no-image.png',
                                    $most_read_article->title, ['class' => 'sm-image']) !!}
                                @endif
                                {{ $most_read_article->title }}
                            </a>
                        </li>
                    @endif
                @endforeach
            </ul>
        </div>
    </div>
@endif
@if(isset($most_read_articles) && count($most_read_articles))
    <div class="panel panel-success">
        <div class="panel-heading">
            <h3 class="panel-title">Най-харесвани статии</h3>
        </div>
        <div class="panel-body">
            <ul class="nav">
                @foreach($most_liked_articles as $most_liked_article)
                    @if($most_liked_article->section)
                        <li>
                            <a href="{{ route('article', [
                                'section_slug' => $most_liked_article->section->slug,
                                'article_slug' => $most_liked_article->slug,
                            ]) }}">
                                @if($most_liked_article->image)
                                    {!! HTML::image($most_liked_article->image->url,
                                    $most_liked_article->title, ['class' => 'sm-image']) !!}
                                @else
                                    {!! HTML::image('assets/img/no-image.png',
                                    $most_liked_article->title, ['class' => 'sm-image']) !!}
                                @endif
                                {{ $most_liked_article->title }}
                            </a>
                        </li>
                    @endif
                @endforeach
            </ul>
        </div>
    </div>
@endif
