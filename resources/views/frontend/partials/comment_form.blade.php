<div class="col-sm-12">
    {!! Form::open(['url' => route('comment'),
    'method' => 'POST', 'class' => 'comment-form']) !!}
        {!! Form::hidden('article_id', $article->id) !!}
        <div class="form-group">
            {!! Form::textarea('comment', null,
            ['class' => 'form-control', 'rows' => 3]) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('Коментирай',
            ['class' => 'btn btn-success col-sm-4 col-sm-offset-4']) !!}
        </div>
    {!! Form::close() !!}
</div>
<div class="article-comment-error"></div>
