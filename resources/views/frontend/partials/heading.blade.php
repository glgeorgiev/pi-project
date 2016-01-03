<h1 class="main-heading">
    {{ $record->title }}
</h1>
@if($record->image)
    <div class="col-sm-3 thumbnail">
        {!! HTML::image($record->image->url, $record->title) !!}
    </div>
@endif
@if($record->description)
    <div class="col-sm-9">
        {{ $record->description }}
    </div>
@endif
<div class="clearfix"></div>
