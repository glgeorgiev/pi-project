<title>{{ isset($title) ? $title : 'Georgi Georgiev\'s blog' }}</title>

<meta charset="utf-8">
<meta name="description" content="{{ isset($meta_description) ? $meta_description : '' }}">

{!! HTML::style('assets/css/bootstrap.journal.theme.min.css') !!}
{!! HTML::style('https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css') !!}
{!! HTML::style('assets/css/frontend.css') !!}
