@extends('backend')

@section('content')
    <div class="row-fluid">
        <section class="panel">
            <header class="panel-heading">
                <h3 class="pull-left">
                    {{ trans('menu.index') }}
                </h3>
                <a class="pull-right btn btn-success"
                    href="{{ route('admin.menu.create') }}">
                    {{ trans('menu.create') }}
                </a>
                <div class="clearfix"></div>
            </header>
            <div class="panel-body">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>{{ trans('common.id') }}</th>
                        <th>{{ trans('menu.fields.title') }}</th>
                        <th>{{ trans('menu.fields.url') }}</th>
                        <th>{{ trans('menu.fields.order') }}</th>
                        <th>{{ trans('common.updated_at') }}</th>
                        <th>{{ trans('common.options') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($menus as $menu)
                        <tr>
                            <td>{{ $menu->id }}</td>
                            <td>{{ $menu->title }}</td>
                            <td>{{ $menu->url }}</td>
                            <td>{{ $menu->order }}</td>
                            <td>{{ $menu->updated_at->toRfc2822String() }}</td>
                            <td>
                                <a class="btn btn-sm btn-info"
                                    href="{{ route('admin.menu.show',
                                    ['menu' => $menu->slug]) }}">
                                    <i class="fa fa-eye"></i>
                                </a>

                                <a class="btn btn-sm btn-warning"
                                    href="{{ route('admin.menu.edit',
                                    ['menu' => $menu->slug]) }}">
                                    <i class="fa fa-edit"></i>
                                </a>

                                {!! Form::model($menu,
                                    ['url' => route('admin.menu.destroy',
                                    ['menu' => $menu->slug]),
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
