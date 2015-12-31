@extends('backend')

@section('content')
    <div class="row-fluid">
        <section class="panel">
            <header class="panel-heading">
                <h3 class="pull-left">
                    {{ trans('tag.index') }}
                </h3>
                <a class="pull-right btn btn-success"
                    href="{{ route('admin.tag.create') }}">
                    {{ trans('tag.create') }}
                </a>
                <div class="clearfix"></div>
            </header>
            <div class="panel-body">
                @include('backend.pages.tag._filter')
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>{{ trans('common.id') }}</th>
                        <th>{{ trans('tag.fields.title') }}</th>
                        <th>{{ trans('tag.fields.slug') }}</th>
                        <th>{{ trans('common.updated_at') }}</th>
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
                                    ['tag' => $tag->id]) }}">
                                    <i class="fa fa-eye"></i>
                                </a>

                                <a class="btn btn-sm btn-warning"
                                    href="{{ route('admin.tag.edit',
                                    ['tag' => $tag->id]) }}">
                                    <i class="fa fa-edit"></i>
                                </a>

                                <a class="btn btn-sm btn-danger"
                                   href="#destroyModal" data-toggle="modal"
                                   data-url="{{ route('admin.tag.destroy',
                                    ['tag' => $tag->id]) }}"
                                   data-text="alabala">
                                    <i class="fa fa-trash-o"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="text-center">
                    {!! $tags->appends(Request::all())->render() !!}
                </div>
            </div>
        </section>
    </div>
@endsection
