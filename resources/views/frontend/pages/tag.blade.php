@extends('frontend')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            @include('frontend.partials.heading', ['record' => $tag])
        </div>
        <div class="panel-body">
            @include('frontend.partials.articles')
        </div>
    </div>
@endsection
