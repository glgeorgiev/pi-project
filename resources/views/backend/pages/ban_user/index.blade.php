@extends('backend')

@section('content')
    <div class="row-fluid">
        <section class="panel">
            <header class="panel-heading">
                <h3 class="pull-left">
                    {{ trans('ban_user.index') }}
                </h3>
                <a class="pull-right btn btn-success"
                   href="{{ route('admin.ban_user.create') }}">
                    {{ trans('ban_user.create') }}
                </a>
                <div class="clearfix"></div>
            </header>
            <div class="panel-body">
                @include('backend.pages.ban_user._filter')
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>{{ trans('common.id') }}</th>
                        <th>{{ trans('user.field.name') }}</th>
                        <th>{{ trans('user.field.email') }}</th>
                        <th>{{ trans('ban_user.fields.until') }}</th>
                        <th>{{ trans('common.updated_at') }}</th>
                        <th>{{ trans('common.options') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($ban_users as $ban_user)
                        <tr>
                            <td>{{ $ban_user->id }}</td>
                            <td>{{ $ban_user->user ? $ban_user->user->name : '-' }}</td>
                            <td>{{ $ban_user->user ? $ban_user->user->email : '-' }}</td>
                            <td>
                                @if($ban_user->until)
                                    {{ $ban_user->until->toRfc2822String() }}
                                @else
                                    <span class="label label-danger">
                                        {{ trans('common.permanent_ban') }}
                                    </span>
                                @endif
                            </td>
                            <td>{{ $ban_user->updated_at->toRfc2822String() }}</td>
                            <td>
                                <a class="btn btn-sm btn-danger"
                                   href="#destroyModal" data-toggle="modal"
                                   data-url="{{ route('admin.ban_user.destroy',
                                    ['ban_user' => $ban_user->id]) }}"
                                   data-text="{{ trans('common.destroy_ban_user',
                                    ['id' => $ban_user->id]) }}">
                                    <i class="fa fa-trash-o"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="text-center">
                    {!! $ban_users->appends(Request::all())->render() !!}
                </div>
            </div>
        </section>
    </div>
    @include('backend.partials.modals.destroy')
@endsection
