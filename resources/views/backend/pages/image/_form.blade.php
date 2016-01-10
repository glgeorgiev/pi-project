@include('backend.partials.errors')

<div class="form-group">
    {!! Form::text('title', null,
    ['class' => 'form-control', 'required' => 'required',
    'placeholder' => trans('image.fields.title')]) !!}
</div>

@if(isset($image))
    <div class="form-group thumbnail col-sm-6">
        {!! HTML::image($image->url, $image->title) !!}
    </div>

    <div class="form-group">
        {!! Form::submit(trans('image.edit'),
        ['class' => 'btn btn-warning col-sm-12']) !!}
    </div>
@else
    <div class="form-group">
        {!! Form::file('file') !!}
    </div>

    <div class="form-group">
        {!! Form::submit(trans('image.create'),
        ['class' => 'btn btn-success col-sm-12']) !!}
    </div>
@endif

@section('footer_script')
    <script>
        jQuery(function($) {
            $('.image-form').validate({
                rules: {
                    title: {
                        required: true,
                        maxlength: 255
                    }
                }
            });
        });
    </script>
@endsection
