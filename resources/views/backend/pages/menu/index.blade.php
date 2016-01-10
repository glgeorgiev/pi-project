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
                @if(count($menus))
                    <ul class="sortable">
                        @foreach($menus as $menu)
                            <li data-menu_id="{{ $menu->id }}">
                                <div class="col-sm-12">
                                    <div class="col-sm-1">
                                        {{ $menu->id }}
                                    </div>
                                    <div class="col-sm-3">
                                        {{ $menu->title }}
                                    </div>
                                    <div class="col-sm-3">
                                        {{ $menu->url }}
                                    </div>
                                    <div class="col-sm-3">
                                        {{ $menu->updated_at->toRfc2822String() }}
                                    </div>
                                    <div class="col-sm-2">
                                        <a class="btn btn-sm btn-info"
                                           href="{{ route('admin.menu.show',
                                        ['menu' => $menu->id]) }}">
                                            <i class="fa fa-eye"></i>
                                        </a>

                                        <a class="btn btn-sm btn-warning"
                                           href="{{ route('admin.menu.edit',
                                        ['menu' => $menu->id]) }}">
                                            <i class="fa fa-edit"></i>
                                        </a>

                                        <a class="btn btn-sm btn-danger"
                                           href="#destroyModal" data-toggle="modal"
                                           data-url="{{ route('admin.menu.destroy',
                                        ['menu' => $menu->id]) }}"
                                           data-text="{{ trans('common.destroy_menu',
                                        ['id' => $menu->id, 'title' => $menu->title]) }}">
                                            <i class="fa fa-trash-o"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </li>
                        @endforeach
                    </ul>
                    <a href="javascript:void(0);" class="btn btn-success save-order">
                        {{ trans('common.save_order') }}
                    </a>
                @endif
            </div>
        </section>
    </div>
    @include('backend.partials.modals.destroy')
@endsection

@section('footer_script')
    <script>
        jQuery(function($) {
            $('.save-order').on('click', function() {
                $.ajax({
                    method: 'POST',
                    url: '{{ route('admin.menu.order') }}',
                    data: {
                        _token: '{{ csrf_token() }}',
                        order: $( ".sortable" ).sortable('toArray', {attribute: 'data-menu_id'})
                    }
                });
            });
        });
    </script>
@endsection
