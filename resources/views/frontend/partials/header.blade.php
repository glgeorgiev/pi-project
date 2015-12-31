<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Brand</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
            <ul class="nav navbar-nav">
                @foreach($menu as $element)
                    <li
                        @if(Request::url() == $element->url ||
                            Request::fullUrl() == $element->url ||
                            Request::path() == $element->url)
                            class="active"
                        @endif
                    >
                        <a href="{{ $element->url }}">{{ $element->title }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</nav>