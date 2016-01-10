@include('backend.partials.errors')

<div class="form-group">
    {!! Form::text('title', null,
    ['class' => 'form-control', 'required' => 'required',
    'placeholder' => trans('menu.fields.title')]) !!}
</div>

<div class="form-group">
    {!! Form::text('url', null,
    ['class' => 'form-control', 'required' => 'required',
    'placeholder' => trans('menu.fields.url')]) !!}
</div>

<div class="form-group">
    {!! Form::number('order', null,
    ['class' => 'form-control', 'min' => '1', 'max' => '999', 'required' => 'required',
    'placeholder' => trans('menu.fields.order')]) !!}
</div>

@if(isset($menu))
    <div class="form-group">
        {!! Form::submit(trans('menu.edit'),
        ['class' => 'btn btn-warning col-sm-12']) !!}
    </div>
@else
    <div class="form-group">
        {!! Form::submit(trans('menu.create'),
        ['class' => 'btn btn-success col-sm-12']) !!}
    </div>
@endif

@section('footer_script')
    <script>
        jQuery(function($) {
            $('.menu-form').validate({
                rules: {
                    title: {
                        required: true,
                        maxlength: 255
                    },
                    url: {
                        required: true,
                        maxlength: 255
                    },
                    order: {
                        required: true,
                        digits: true
                    }
                }
            });
        });
    </script>
@endsection
