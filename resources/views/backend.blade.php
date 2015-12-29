<!DOCTYPE html>
<html>
<head>
    @include('backend.partials.head')
</head>
<body>
<section id="container">
    @include ('backend.partials.header')

    @include ('backend.partials.sidebar')

    <div id="main-content">
        <section class="wrapper">
            @yield('content')
        </section>
    </div>
</section>

@include('backend.partials.bottom')
@yield('footer_script')
</body>
</html>
