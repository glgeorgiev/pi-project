<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ route('index') }}">
                {!! HTML::image('logo.png', 'logo') !!}
            </a>
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
            <ul class="nav navbar-nav navbar-right">
                @if(Auth::check())
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle profile-btn"
                            data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="{{ route('profile',
                                    ['redirect_url' => Request::fullUrl()]) }}">
                                    Профил
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('logout',
                                    ['redirect_url' => Request::fullUrl()]) }}">
                                    Изход
                                </a>
                            </li>
                        </ul>
                    </li>
                @else
                    <li>
                        <a class="login-btn" href="{{ route('login',
                            ['redirect_url' => Request::fullUrl()]) }}">
                            Вход
                        </a>
                    </li>
                    <li>
                        <a class="register-btn" href="{{ route('register',
                            ['redirect_url' => Request::fullUrl()]) }}">
                            Регистрация
                        </a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>