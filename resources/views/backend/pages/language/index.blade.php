@extends('backend')

@section('content')
    <div class="row-fluid">
        <section class="panel">
            <header class="panel-heading">
                <h3 class="pull-left">
                    {{ trans('language.index') }}
                </h3>
                <a class="pull-right btn btn-success"
                    href="{{ route('admin.language.create') }}">
                    {{ trans('language.create') }}
                </a>
                <div class="clearfix"></div>
            </header>
            <div class="panel-body">
                @include('backend.pages.language._filter')
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>{{ trans('common.id') }}</th>
                        <th>{{ trans('language.fields.title') }}</th>
                        <th>{{ trans('language.fields.slug') }}</th>
                        <th>{{ trans('common.updated_at') }}</th>
                        <th>{{ trans('common.options') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($languages as $language)
                        <tr>
                            <td>{{ $language->id }}</td>
                            <td>{{ $language->title }}</td>
                            <td>{{ $language->slug }}</td>
                            <td>{{ $language->updated_at->toRfc2822String() }}</td>
                            <td>
                                <a class="btn btn-sm btn-info"
                                    href="{{ route('admin.language.show',
                                    ['language' => $language->id]) }}">
                                    <i class="fa fa-eye"></i>
                                </a>

                                <a class="btn btn-sm btn-warning"
                                    href="{{ route('admin.language.edit',
                                    ['language' => $language->id]) }}">
                                    <i class="fa fa-edit"></i>
                                </a>

                                <a class="btn btn-sm btn-danger"
                                   href="#destroyModal" data-toggle="modal"
                                   data-url="{{ route('admin.language.destroy',
                                    ['language' => $language->id]) }}"
                                   data-text="{{ trans('common.destroy_language',
                                   ['id' => $language->id, 'title' => $language->title]) }}">
                                    <i class="fa fa-trash-o"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="text-center">
                    {!! $languages->appends(Request::all())->render() !!}
                </div>
            </div>
        </section>
    </div>
    @include('backend.partials.modals.destroy')
@endsection
