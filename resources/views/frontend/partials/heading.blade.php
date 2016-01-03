<div class="col-sm-9">
    <h1 class="main-heading">{{ $record->title }}</h1>
    <p>{{ $record->description }}</p>
</div>
@if($record->image)
    <div class="col-sm-3 thumbnail">
        {!! HTML::image($record->image->url, $record->title) !!}
    </div>
@endif
<div class="clearfix"></div>
