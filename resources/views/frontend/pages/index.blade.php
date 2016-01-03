@extends('frontend')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h1 class="main-heading">Последни новини</h1>
        </div>
        <div class="panel-body">
            @include('frontend.partials.articles')
        </div>
    </div>
@endsection
