<!DOCTYPE html>
<html>
<head>
    @include('partials.head')
</head>
<body>
<section id="container">
    @include ('partials.header')

    @include ('partials.sidebar')

    <div id="main-content">
        <section class="wrapper">
            @yield('content')
        </section>
    </div>
</section>

@include('partials.bottom')
</body>
</html>
