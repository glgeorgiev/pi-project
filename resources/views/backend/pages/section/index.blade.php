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
                @include('backend.pages.section._filter')
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>{{ trans('common.id') }}</th>
                        <th>{{ trans('section.fields.title') }}</th>
                        <th>{{ trans('section.fields.slug') }}</th>
                        <th>{{ trans('section.fields.order') }}</th>
                        <th>{{ trans('common.updated_at') }}</th>
                        <th>{{ trans('common.options') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($sections as $section)
                        <tr>
                            <td>{{ $section->id }}</td>
                            <td>{{ $section->title }}</td>
                            <td>{{ $section->slug }}</td>
                            <td>{{ $section->order }}</td>
                            <td>{{ $section->updated_at->toRfc2822String() }}</td>
                            <td>
                                <a class="btn btn-sm btn-info"
                                    href="{{ route('admin.section.show',
                                    ['section' => $section->id]) }}">
                                    <i class="fa fa-eye"></i>
                                </a>

                                <a class="btn btn-sm btn-warning"
                                    href="{{ route('admin.section.edit',
                                    ['section' => $section->id]) }}">
                                    <i class="fa fa-edit"></i>
                                </a>

                                {!! Form::model($section,
                                    ['url' => route('admin.section.destroy',
                                    ['section' => $section->id]),
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
                <div class="text-center">
                    {!! $sections->appends(Request::all())->render() !!}
                </div>
            </div>
        </section>
    </div>
@endsection
