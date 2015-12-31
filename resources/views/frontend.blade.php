<!DOCTYPE html>
<html>
<head>
    @include('frontend.partials.head')
</head>
<body>
@include('frontend.partials.header')
<div class="container">
    <div class="panel panel-default col-sm-9">
        <div class="panel-heading">Panel heading</div>
        <div class="panel-body">
            Panel content
        </div>
    </div>
    <div class="col-sm-3">
        @include('frontend.partials.sidebar')
    </div>
</div>
@include('frontend.partials.bottom')
</body>
</html>
