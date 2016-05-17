<div class="col-sm-9">
    @include('backend.partials.errors')

    <div class="form-group">
        {!! Form::text('name', null,
        ['class' => 'form-control', 'required' => 'required',
        'placeholder' => trans('page.fields.title')]) !!}
    </div>

    @if(isset($page))


        <ul class="nav nav-tabs">
            @foreach ($languages as $i => $language)
                <li @if($i === 0) class="active" @endif>
                    <a href="#tab-{{ $i }}" data-toggle="tab">
                        {{ $language->name }}
                    </a>
                </li>
            @endforeach
        </ul>
        <div class="tab-content">
            @foreach ($languages as $i => $language)
                <div id="tab-{{ $i }}" class="tab-pane fade
                {{ $i === 0 ? 'in active' : '' }}">
                    <br>
                    <div class="form-group">
                        {!! Form::label('title', trans('page.fields.title'),
                        ['class' => 'control-label col-sm-3 text-right']) !!}
                        <div class="col-sm-9">
                            {!! Form::text('sync_data[' . $language->id . '][title]',
                            isset($form_data[$language->id]->pivot->title) ?
                            $form_data[$language->id]->pivot->title : null,
                            ['class' => 'form-control', 'required' => 'required']) !!}
                        </div>
                        <div class="clearfix"></div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('description', trans('page.fields.description'),
                        ['class' => 'control-label col-sm-3 text-right']) !!}
                        <div class="col-sm-9">
                            {!! Form::textarea('sync_data[' . $language->id . '][description]',
                            isset($form_data[$language->id]->pivot->description) ?
                            $form_data[$language->id]->pivot->description : null,
                            ['class' => 'form-control', 'rows' => '3']) !!}
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            @endforeach
        </div>


        <div class="form-group">
            {!! Form::submit(trans('page.edit'),
            ['class' => 'btn btn-warning col-sm-12']) !!}
        </div>
    @else
        <div class="form-group">
            {!! Form::submit(trans('page.create'),
            ['class' => 'btn btn-success col-sm-12']) !!}
        </div>
    @endif
</div>
<div class="col-sm-3 well">
    @include('backend.partials.right_form', isset($page) ? ['record' => $page] : [])
</div>
