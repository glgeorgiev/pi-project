@extends('backend')

@section('content')
    <div class="row-fluid">
        <section class="panel">
            <header class="panel-heading">
                <h3 class="pull-left">
                    {{ trans('image.index') }}
                </h3>
                <a class="pull-right btn btn-success"
                    href="{{ route('admin.image.create') }}">
                    {{ trans('image.create') }}
                </a>
                <div class="clearfix"></div>
            </header>
            <div class="panel-body">
                <div class="col-sm-12">
                    @foreach($images as $image)
                        <div class="thumbnail col-sm-3">
                            {!! HTML::image($image->url, $image->title) !!}
                            
                            <p><span class="label label-default">{{ $image->title }}</span></p>
                            
                            <a class="btn btn-sm btn-info"
                               href="{{ route('admin.image.show',
                                    ['image' => $image->id]) }}">
                                <i class="fa fa-eye"></i>
                            </a>

                            <a class="btn btn-sm btn-warning"
                               href="{{ route('admin.image.edit',
                                    ['image' => $image->id]) }}">
                                <i class="fa fa-edit"></i>
                            </a>

                            {!! Form::model($image,
                                ['url' => route('admin.image.destroy',
                                ['image' => $image->id]),
                                'method' => 'DELETE',
                                'class' => 'inline-form']) !!}
                            {!! Form::button('<i class="fa fa-trash-o"></i>',
                                ['class' => 'btn btn-sm btn-danger',
                                'type' => 'submit']) !!}
                            {!! Form::close() !!}
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    </div>
@endsection
