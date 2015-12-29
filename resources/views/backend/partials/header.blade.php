<header class="header fixed-top clearfix">
    <div class="brand">
        <a href="#" class="logo">
            {{--{!! HTML::image('http://ladyshand.com/web/images/logo.png', 'Logo') !!}--}}
        </a>
        <div class="sidebar-toggle-box">
            <div class="fa fa-bars"></div>
        </div>
    </div>

    <div class="top-nav clearfix">
        <ul class="nav pull-right top-menu">
            <li>
                {{--<a href="{{ route('profile') }}">--}}
                    {{--{{ trans('common.welcome',--}}
                    {{--['name' => Auth::user()->name]) }}--}}
                {{--</a>--}}
            </li>
            <li>
                {{--<a href="{{ route('logout') }}">--}}
                    {{--{{ trans('common.logout') }}--}}
                {{--</a>--}}
            </li>
        </ul>
    </div>
</header>
