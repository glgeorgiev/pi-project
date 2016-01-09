<h4>{{ $poll->title }}</h4>
<p>{{ $poll->description }}</p>
<ul class="nav">
    @foreach($poll_answers as $poll_answer)
        <li class="clearfix">
            <span class="pull-left">
                {{ $poll_answer->answer }}
            </span>
            <span class="pull-right">
                {{ trans_choice('frontend.poll_votes',
                isset($poll_votes[$poll_answer->id]) ?
                $poll_votes[$poll_answer->id] : 0) }}
            </span>
        </li>
    @endforeach
</ul>
@if(isset($too_many_votes))
    <div class="alert alert-danger">
        Вашият глас не беше отчетен, тъй като надвишава
        броят на позволените гласувания за IP адрес
    </div>
@endif
