<div class="panel panel-success">
    <div class="panel-heading">
        <h3 class="panel-title">Секции</h3>
    </div>
    <div class="panel-body">
        <ul class="nav nav-pills">
            @foreach($sections as $section)
                <li>
                    <a href="{{ route('section',
                        ['section_slug' => $section->slug]) }}">
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
        <h3 class="panel-title">Тагове</h3>
    </div>
    <div class="panel-body">
        Списък с последните тагове (10)
    </div>
</div>
<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">Най-четени статии</h3>
    </div>
    <div class="panel-body">
        Списък с най-четените статии (10)
    </div>
</div>
<div class="panel panel-success">
    <div class="panel-heading">
        <h3 class="panel-title">Най-харесвани статии</h3>
    </div>
    <div class="panel-body">
        Списък с най-харесваните статии (5)
    </div>
</div>
