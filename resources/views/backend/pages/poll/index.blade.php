@extends('backend')

@section('content')
    <div class="row-fluid">
        <section class="panel">
            <header class="panel-heading">
                <h3 class="pull-left">
                    {{ trans('poll.index') }}
                </h3>
                <a class="pull-right btn btn-success"
                    href="{{ route('admin.poll.create') }}">
                    {{ trans('poll.create') }}
                </a>
                <div class="clearfix"></div>
            </header>
            <div class="panel-body">
                @include('backend.pages.poll._filter')
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>{{ trans('common.id') }}</th>
                        <th>{{ trans('poll.fields.title') }}</th>
                        <th>{{ trans('poll.fields.show_in_sidebar') }}</th>
                        <th>{{ trans('poll.fields.answers') }}</th>
                        <th>{{ trans('common.updated_at') }}</th>
                        <th>{{ trans('common.options') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($polls as $poll)
                        <tr>
                            <td>{{ $poll->id }}</td>
                            <td>{{ $poll->title }}</td>
                            <td>
                                @if($poll->show_in_sidebar)
                                    <i class="fa fa-check-circle"></i>
                                @else
                                    <i class="fa fa-times-circle"></i>
                                @endif
                            </td>
                            <td>{{ count($poll->poll_answers) }}</td>
                            <td>{{ $poll->updated_at->toRfc2822String() }}</td>
                            <td>
                                <a class="btn btn-sm btn-info"
                                    href="{{ route('admin.poll.show',
                                    ['poll' => $poll->id]) }}">
                                    <i class="fa fa-eye"></i>
                                </a>

                                <a class="btn btn-sm btn-warning"
                                    href="{{ route('admin.poll.edit',
                                    ['poll' => $poll->id]) }}">
                                    <i class="fa fa-edit"></i>
                                </a>

                                <a class="btn btn-sm btn-danger"
                                   href="#destroyModal" data-toggle="modal"
                                   data-url="{{ route('admin.poll.destroy',
                                    ['poll' => $poll->id]) }}"
                                   data-text="{{ trans('common.destroy_poll',
                                    ['id' => $poll->id, 'title' => $poll->title]) }}">
                                    <i class="fa fa-trash-o"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="text-center">
                    {!! $polls->appends(Request::all())->render() !!}
                </div>
            </div>
        </section>
    </div>
    @include('backend.partials.modals.destroy')
@endsection
