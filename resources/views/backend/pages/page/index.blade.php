@extends('backend')

@section('content')
    <div class="row-fluid">
        <section class="panel">
            <header class="panel-heading">
                <h3 class="pull-left">
                    {{ trans('page.index') }}
                </h3>
                <a class="pull-right btn btn-success"
                    href="{{ route('admin.page.create') }}">
                    {{ trans('page.create') }}
                </a>
                <div class="clearfix"></div>
            </header>
            <div class="panel-body">
                @include('backend.pages.page._filter')
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>{{ trans('common.id') }}</th>
                        <th>{{ trans('page.fields.title') }}</th>
                        <th>{{ trans('page.fields.slug') }}</th>
                        <th>{{ trans('common.updated_at') }}</th>
                        <th>{{ trans('common.options') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($pages as $page)
                        <tr>
                            <td>{{ $page->id }}</td>
                            <td>{{ $page->title }}</td>
                            <td>{{ $page->slug }}</td>
                            <td>{{ $page->updated_at->toRfc2822String() }}</td>
                            <td>
                                <a class="btn btn-sm btn-info"
                                    href="{{ route('admin.page.show',
                                    ['page' => $page->id]) }}">
                                    <i class="fa fa-eye"></i>
                                </a>

                                <a class="btn btn-sm btn-warning"
                                    href="{{ route('admin.page.edit',
                                    ['page' => $page->id]) }}">
                                    <i class="fa fa-edit"></i>
                                </a>

                                <a class="btn btn-sm btn-danger"
                                   href="#destroyModal" data-toggle="modal"
                                   data-url="{{ route('admin.page.destroy',
                                    ['page' => $page->id]) }}"
                                   data-text="{{ trans('common.destroy_page',
                                   ['id' => $page->id, 'title' => $page->title]) }}">
                                    <i class="fa fa-trash-o"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="text-center">
                    {!! $pages->appends(Request::all())->render() !!}
                </div>
            </div>
        </section>
    </div>
    @include('backend.partials.modals.destroy')
@endsection
