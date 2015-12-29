@extends('backend')

@section('content')
    <div class="row-fluid">
        <section class="panel">
            <header class="panel-heading">
                <h3 class="pull-left">
                    {{ trans('section.index') }}
                </h3>
                <a class="pull-right btn btn-success"
                    href="{{ route('admin.section.create') }}">
                    {{ trans('section.create') }}
                </a>
                <div class="clearfix"></div>
            </header>
            <div class="panel-body">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>{{ trans('common.id') }}</th>
                        <th>{{ trans('section.tag.title') }}</th>
                        <th>{{ trans('section.tag.slug') }}</th>
                        <th>{{ trans('section.tag.updated_at') }}</th>
                        <th>{{ trans('common.options') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($tags as $tag)
                        <tr>
                            <td>{{ $tag->id }}</td>
                            <td>{{ $tag->title }}</td>
                            <td>{{ $tag->slug }}</td>
                            <td>{{ $tag->updated_at->toRfc2822String() }}</td>
                            <td>
                                <a class="btn btn-sm btn-info"
                                    href="{{ route('admin.tag.show',
                                    ['tag' => $tag->slug]) }}">
                                    <i class="fa fa-eye"></i>
                                </a>

                                <a class="btn btn-sm btn-warning"
                                    href="{{ route('admin.tag.edit',
                                    ['tag' => $tag->slug]) }}">
                                    <i class="fa fa-edit"></i>
                                </a>

                                {!! Form::model($tag,
                                    ['url' => route('admin.tag.destroy',
                                    ['tag' => $tag->slug]),
                                    'method' => 'DELETE',
                                    'class' => 'inline-form']) !!}
                                    {!! Form::button('<i class="fa fa-trash-o"></i>',
                                        ['class' => 'btn btn-sm btn-danger',
                                        'type' => 'submit']) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </section>
    </div>
@endsection
