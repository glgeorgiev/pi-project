@extends('frontend')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h1 class="main-heading">Анкети</h1>
        </div>
        <div class="panel-body">
            @foreach($polls as $poll)
                <div class="single-poll">
                    @include('frontend.partials.poll')
                </div>
            @endforeach

            {!! $polls->render() !!}
        </div>
    </div>
@endsection
