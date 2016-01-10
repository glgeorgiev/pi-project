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
                @if(count($sections))
                    <ul class="sortable">
                        @foreach($sections as $section)
                            <li data-section_id="{{ $section->id }}">
                                <div class="col-sm-12">
                                    <div class="col-sm-1">
                                        {{ $section->id }}
                                    </div>
                                    <div class="col-sm-3">
                                        {{ $section->title }}
                                    </div>
                                    <div class="col-sm-3">
                                        {{ $section->url }}
                                    </div>
                                    <div class="col-sm-3">
                                        {{ $section->updated_at->toRfc2822String() }}
                                    </div>
                                    <div class="col-sm-2">
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

                                        <a class="btn btn-sm btn-danger"
                                           href="#destroyModal" data-toggle="modal"
                                           data-url="{{ route('admin.section.destroy',
                                        ['section' => $section->id]) }}"
                                           data-text="{{ trans('common.destroy_section',
                                        ['id' => $section->id, 'title' => $section->title]) }}">
                                            <i class="fa fa-trash-o"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </li>
                        @endforeach
                    </ul>
                    <div class="ajax-result"></div>
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
                    url: '{{ route('admin.section.order') }}',
                    data: {
                        _token: '{{ csrf_token() }}',
                        order: $( ".sortable" ).sortable('toArray', {attribute: 'data-section_id'})
                    },
                    success: function() {
                        $('.ajax-result').removeClass('alert-danger').addClass('alert alert-success')
                                .text('Подредбата беше успешно запазена!');
                    },
                    error: function() {
                        $('.ajax-result').removeClass('alert-success').addClass('alert alert-danger')
                                .text('Възникна грешка! Подредбата не беше запазена!');
                    }
                });
            });
        });
    </script>
@endsection
