{!! Form::open(['method' => 'POST',
    'url' => route('vote'), 'class' => 'poll-form']) !!}
    {!! Form::hidden('poll_id', $poll->id) !!}
    <h4>{{ $poll->title }}</h4>
    <p>{{ $poll->description }}</p>
    <ul class="nav">
        @foreach($poll->poll_answers as $answer)
            <li>
                {!! Form::radio('answer', $answer->id, false,
                ['id' => 'answer_' . $answer->id]) !!}
                {!! Form::label('answer_' . $answer->id, $answer->answer) !!}
            </li>
        @endforeach
    </ul>
    <div class="poll-error"></div>
    <div class="form-group">
        {!! Form::submit('Гласувай', ['class' => 'btn btn-primary']) !!}
    </div>
{!! Form::close() !!}