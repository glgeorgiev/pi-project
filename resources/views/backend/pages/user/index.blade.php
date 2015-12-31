@extends('backend')

@section('content')
    <div class="row-fluid">
        <section class="panel">
            <header class="panel-heading">
                <h3 class="pull-left">
                    {{ trans('user.index') }}
                </h3>
                <a class="pull-right btn btn-success"
                    href="{{ route('admin.user.create') }}">
                    {{ trans('user.create') }}
                </a>
                <div class="clearfix"></div>
            </header>
            <div class="panel-body">
                @include('backend.pages.user._filter')
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>{{ trans('common.id') }}</th>
                        <th>{{ trans('user.fields.name') }}</th>
                        <th>{{ trans('user.fields.email') }}</th>
                        <th>{{ trans('user.fields.is_admin') }}</th>
                        <th>{{ trans('common.updated_at') }}</th>
                        <th>{{ trans('common.options') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @if($user->isAdmin())
                                    <span class="label label-primary">
                                        {{ trans('user.is_admin.true') }}
                                    </span>
                                @else
                                    <span class="label label-default">
                                        {{ trans('user.is_admin.false') }}
                                    </span>
                                @endif
                            </td>
                            <td>{{ $user->updated_at->toRfc2822String() }}</td>
                            <td>
                                <a class="btn btn-sm btn-info"
                                    href="{{ route('admin.user.show',
                                    ['user' => $user->id]) }}">
                                    <i class="fa fa-eye"></i>
                                </a>

                                <a class="btn btn-sm btn-warning"
                                    href="{{ route('admin.user.edit',
                                    ['user' => $user->id]) }}">
                                    <i class="fa fa-edit"></i>
                                </a>

                                {!! Form::model($user,
                                    ['url' => route('admin.user.destroy',
                                    ['user' => $user->id]),
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
                    {!! $users->appends(Request::all())->render() !!}
                </div>
            </div>
        </section>
    </div>
@endsection
