@extends('backend')

@section('content')
    <div class="row-fluid">
        <section class="panel">
            <header class="panel-heading">
                <h3 class="pull-left">
                    {{ trans('ban_ip.index') }}
                </h3>
                <a class="pull-right btn btn-success"
                    href="{{ route('admin.ban_ip.create') }}">
                    {{ trans('ban_ip.create') }}
                </a>
                <div class="clearfix"></div>
            </header>
            <div class="panel-body">
                @include('backend.pages.ban_ip._filter')
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>{{ trans('common.id') }}</th>
                        <th>{{ trans('ban_ip.fields.ip') }}</th>
                        <th>{{ trans('ban_ip.fields.until') }}</th>
                        <th>{{ trans('common.updated_at') }}</th>
                        <th>{{ trans('common.options') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($ban_ips as $ban_ip)
                        <tr>
                            <td>{{ $ban_ip->id }}</td>
                            <td>{{ $ban_ip->ip }}</td>
                            <td>
                                @if($ban_ip->until)
                                    {{ $ban_ip->until->toRfc2822String() }}
                                @else
                                    <span class="label label-danger">
                                        {{ trans('common.permanent_ban') }}
                                    </span>
                                @endif
                            </td>
                            <td>{{ $ban_ip->updated_at->toRfc2822String() }}</td>
                            <td>
                                <a class="btn btn-sm btn-danger"
                                   href="#destroyModal" data-toggle="modal"
                                   data-url="{{ route('admin.ban_ip.destroy',
                                    ['ban_ip' => $ban_ip->id]) }}"
                                   data-text="{{ trans('common.destroy_ban_ip',
                                    ['id' => $ban_ip->id]) }}">
                                    <i class="fa fa-trash-o"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="text-center">
                    {!! $ban_ips->appends(Request::all())->render() !!}
                </div>
            </div>
        </section>
    </div>
    @include('backend.partials.modals.destroy')
@endsection
