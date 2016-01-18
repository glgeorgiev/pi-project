<div class="footer">
    2015 - {{ date('Y') }} &copy;
    OpenSource Проект,
    <a href="https://github.com/glgeorgiev/pi-project">код в GitHub</a>
    {{--<ul class="nav nav-pills nav-footer pull-right">--}}
        {{--<li>--}}
            {{--<a href="#">Едно</a>--}}
        {{--</li>--}}
        {{--<li>--}}
            {{--<a href="#">Две</a>--}}
        {{--</li>--}}
        {{--<li>--}}
            {{--<a href="#">Три</a>--}}
        {{--</li>--}}
        {{--<li>--}}
            {{--<a href="#">Четири</a>--}}
        {{--</li>--}}
    {{--</ul>--}}
    <div class="clearfix"></div>
</div>

{!! HTML::script('//code.jquery.com/jquery-1.11.3.min.js') !!}

{!! HTML::script('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js',
    ['integrity' => 'sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS',
    'crossorigin' => 'anonymous']) !!}
{!! HTML::script('assets/js/fileinput.js') !!}
{!! HTML::script('assets/js/jquery.validate.min.js') !!}
{!! HTML::script('assets/js/jquery.validate.messages_bg.min.js') !!}

{!! HTML::script('assets/js/frontend.js') !!}