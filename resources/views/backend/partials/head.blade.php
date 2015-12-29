<title>{{ isset($title) ? $title : 'Georgi Georgiev\'s blog' }}</title>
<meta charset="UTF-8">

{!! HTML::style('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css',
    ['integrity' => 'sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7',
    'crossorigin' => 'anonymous']) !!}

{!! HTML::style('assets/css/bootstrap-reset.css') !!}

{!! HTML::style('https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css') !!}

{!! HTML::style('http://code.jquery.com/ui/1.11.3/themes/redmond/jquery-ui.css') !!}

{!! HTML::style('assets/css/fileinput.css') !!}
{!! HTML::style('assets/css/style.css') !!}
{!! HTML::style('assets/css/style-responsive.css') !!}
{!! HTML::style('assets/css/custom.css') !!}
