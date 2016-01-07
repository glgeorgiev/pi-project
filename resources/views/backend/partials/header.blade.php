<header class="header fixed-top clearfix">
    <div class="brand">
        <a href="{{ route('admin.index') }}" class="logo">
            {!! HTML::image('logo.jpg', 'Logo') !!}
        </a>
        <div class="sidebar-toggle-box">
            <div class="fa fa-bars"></div>
        </div>
    </div>

    <div class="top-nav clearfix">
        <ul class="nav pull-left nav-pills">
            <li>
                <a href="{{ route('index') }}">
                    {{ trans('common.view_site') }}
                </a>
            </li>
        </ul>
        <ul class="nav pull-right nav-pills">
            <li>
                <a href="javascript:void(0);">
                    {{ trans('common.welcome', ['name' => Auth::user()->name]) }}
                </a>
            </li>
            <li>
                <a href="{{ route('profile',
                    ['redirect_url' => Request::fullUrl()]) }}">
                    {{ trans('common.profile') }}
                </a>
            </li>
            <li>
                <a href="{{ route('logout') }}">
                    {{ trans('common.logout') }}
                </a>
            </li>
        </ul>
    </div>
</header>
