<!DOCTYPE html>
<html>
<head>
    @include('frontend.partials.head')
</head>
<body>
@include('frontend.partials.header')
<div class="container">
    <div class="col-sm-9">
        @yield('content')
    </div>
    <div class="col-sm-3">
        @include('frontend.partials.sidebar')
    </div>
</div>
@include('frontend.partials.bottom')
</body>
</html>
