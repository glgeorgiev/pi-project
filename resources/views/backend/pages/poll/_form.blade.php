@include('backend.partials.errors')

<div class="form-group">
    {!! Form::text('title', null,
    ['class' => 'form-control', 'required' => 'required',
    'placeholder' => trans('poll.fields.title')]) !!}
</div>

<div class="form-group">
    {!! Form::textarea('description', null,
    ['class' => 'form-control', 'rows' => '3',
    'placeholder' => trans('poll.fields.description')]) !!}
</div>

<div class="form-group">
    {!! Form::hidden('show_in_sidebar', 0) !!}
    {!! Form::checkbox('show_in_sidebar', 1, null, ['id' => 'show_in_sidebar']) !!}
    {!! Form::label('show_in_sidebar', trans('poll.fields.show_in_sidebar')) !!}
</div>

<h4>{{ trans('poll.answers') }}</h4>

@if(isset($poll))
    @foreach($poll->poll_answers as $poll_answer)
        <div class="form-group poll-answer">
            {!! Form::text('poll_answers[' . $poll_answer->id . ']',
            $poll_answer->answer,
            ['class' => 'form-control', 'required' => 'required',
            'placeholder' => trans('poll.answer')]) !!}
        </div>
    @endforeach

    <div class="form-group">
        {!! Form::submit(trans('poll.edit'),
        ['class' => 'btn btn-warning col-sm-12']) !!}
    </div>
@else
    <div class="form-group poll-answer">
        <div class="col-sm-9 row">
            {!! Form::text('poll_answers[]', null,
            ['class' => 'form-control', 'required' => 'required',
            'placeholder' => trans('poll.answer')]) !!}
        </div>
        <div class="col-sm-3">
            <a class="btn btn-danger poll-answer-remove"
                href="javascript:void(0);">
                <i class="fa fa-minus"></i>
            </a>
            <a class="btn btn-success poll-answer-add"
                href="javascript:void(0);">
                <i class="fa fa-plus"></i>
            </a>
        </div>
        <div class="clearfix"></div>
    </div>

    <div class="form-group">
        {!! Form::submit(trans('poll.create'),
        ['class' => 'btn btn-success col-sm-12']) !!}
    </div>
@endif

@section('footer_script')
    <script>
        jQuery(function($) {
            $('body').on('click', '.poll-answer-remove', function() {
                var $this = $(this);
                if ($('.poll-answer').size() > 1) {
                    $this.parents('.poll-answer').remove();
                }
            }).on('click', '.poll-answer-add', function() {
                var $this = $(this);
                $this.parents('.poll-answer').after(
                        $this.parents('.poll-answer').get(0).outerHTML
                );
            });
            $('.poll-form').validate({
                rules: {
                    title: {
                        required: true,
                        maxlength: 255
                    }
                }
            });
        });
    </script>
@endsection
