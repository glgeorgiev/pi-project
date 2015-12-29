<aside>
    <div id="sidebar" class="nav-collapse">
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                <li>
                    <a href="{{ route('admin.section.index') }}"
                        @if(Request::segment(2) == 'section')
                            class="active"
                        @endif>
                        {!! trans('sidebar.section') !!}
                    </a>
                </li>
            </ul>
        </div>
    </div>
</aside>
