<aside>
    <div id="sidebar" class="nav-collapse">
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                <li>
                    <a href="{{ route('admin.article.index') }}"
                        @if(Request::segment(2) == 'article')
                            class="active"
                        @endif>
                        {!! trans('sidebar.article') !!}
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.comment.index') }}"
                       @if(Request::segment(2) == 'comment')
                       class="active"
                            @endif>
                        {!! trans('sidebar.comment') !!}
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.image.index') }}"
                        @if(Request::segment(2) == 'image')
                            class="active"
                        @endif>
                        {!! trans('sidebar.image') !!}
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.section.index') }}"
                        @if(Request::segment(2) == 'section')
                            class="active"
                        @endif>
                        {!! trans('sidebar.section') !!}
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.tag.index') }}"
                        @if(Request::segment(2) == 'tag')
                        class="active"
                        @endif>
                        {!! trans('sidebar.tag') !!}
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.user.index') }}"
                       @if(Request::segment(2) == 'user')
                       class="active"
                            @endif>
                        {!! trans('sidebar.user') !!}
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.menu.index') }}"
                       @if(Request::segment(2) == 'menu')
                       class="active"
                            @endif>
                        {!! trans('sidebar.menu') !!}
                    </a>
                </li>
            </ul>
        </div>
    </div>
</aside>
