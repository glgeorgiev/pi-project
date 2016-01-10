<div class="col-sm-9">
    @include('backend.partials.errors')

    <div class="form-group">
        {!! Form::text('title', null,
        ['class' => 'form-control', 'required' => 'required',
        'placeholder' => trans('section.fields.title')]) !!}
    </div>

    <div class="form-group">
        {!! Form::text('slug', null,
        ['class' => 'form-control', 'required' => 'required',
        'placeholder' => trans('section.fields.slug')]) !!}
    </div>

    <div class="form-group">
        {!! Form::textarea('description', null,
        ['class' => 'form-control', 'rows' => '5',
        'placeholder' => trans('section.fields.description')]) !!}
    </div>

    <div class="form-group">
        {!! Form::number('order', null,
        ['class' => 'form-control', 'min' => '1', 'max' => '999', 'required' => 'required',
        'placeholder' => trans('section.fields.order')]) !!}
    </div>

    @if(isset($section))
        <div class="form-group">
            {!! Form::submit(trans('section.edit'),
            ['class' => 'btn btn-warning col-sm-12']) !!}
        </div>
    @else
        <div class="form-group">
            {!! Form::submit(trans('section.create'),
            ['class' => 'btn btn-success col-sm-12']) !!}
        </div>
    @endif
</div>
<div class="col-sm-3 well">
    @include('backend.partials.right_form', isset($section) ? ['record' => $section] : [])
</div>

@section('footer_script')
    {!! HTML::script('assets/js/images.js') !!}
    <script>
        jQuery(function($) {
            $('.section-form').validate({
                rules: {
                    title: {
                        required: true,
                        maxlength: 255
                    },
                    slug: {
                        required: true,
                        maxlength: 255,
                        remote: '{{ route('admin.validate.section.slug') }}'
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
