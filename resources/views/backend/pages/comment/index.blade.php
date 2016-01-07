@extends('backend')

@section('content')
    <div class="row-fluid">
        <section class="panel">
            <header class="panel-heading">
                <h3 class="pull-left">
                    {{ trans('comment.index') }}
                </h3>
                <div class="clearfix"></div>
            </header>
            <div class="panel-body">
                @include('backend.pages.comment._filter')
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>{{ trans('common.id') }}</th>
                        <th>{{ trans('comment.fields.comment') }}</th>
                        <th>{{ trans('comment.fields.article') }}</th>
                        <th>{{ trans('comment.fields.user') }}</th>
                        <th>{{ trans('common.created_at') }}</th>
                        <th>{{ trans('common.options') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($comments as $comment)
                        <tr>
                            <td>{{ $comment->id }}</td>
                            <td>
                                <a class="comment-text edit-comment"
                                    href="javascript:void(0);"
                                    data-comment_id="{{ $comment->id }}">
                                    {{ str_limit($comment->comment, 50) }}
                                </a>
                                <div id="edit-comment-{{ $comment->id }}" style="display: none;">
                                    {!! Form::open(['method' => 'PATCH',
                                        'class' => 'edit-comment-form',
                                        'url' => route('admin.comment.update',
                                        ['comment' => $comment->id])]) !!}
                                        {!! Form::hidden('article_id', $comment->article_id) !!}
                                        <div class="form-group">
                                            {!! Form::textarea('comment', $comment->comment,
                                            ['class' => 'form-control', 'rows' => '5']) !!}
                                        </div>
                                        <div class="form-group">
                                            {!! Form::submit(trans('comment.update'),
                                            ['class' => 'col-sm-12 btn btn-warning']) !!}
                                        </div>
                                    {!! Form::close() !!}
                                </div>
                            </td>
                            <td>
                                @if($comment->article)
                                    <a href="{{ route('admin.article.edit',
                                        ['article' => $comment->article->id]) }}">
                                        {{ $comment->article->title }}
                                    </a>
                                @else
                                    -
                                @endif
                            </td>
                            <td>
                                @if($comment->user)
                                    <a href="{{ route('admin.user.edit',
                                        ['user' => $comment->user->id]) }}">
                                        {{ $comment->user->name }}
                                    </a>
                                @else
                                    -
                                @endif
                            </td>
                            <td>{{ $comment->created_at->toRfc2822String() }}</td>
                            <td>
                                <a class="btn btn-sm btn-warning edit-comment"
                                    href="javascript:void(0);"
                                    data-comment_id="{{ $comment->id }}">
                                    <i class="fa fa-edit"></i>
                                </a>

                                <a class="btn btn-sm btn-danger"
                                   href="#destroyModal" data-toggle="modal"
                                   data-url="{{ route('admin.comment.destroy',
                                    ['comment' => $comment->id]) }}"
                                   data-text="{{ trans('common.destroy_comment',
                                   ['id' => $comment->id, 'title' => $comment->title]) }}">
                                    <i class="fa fa-trash-o"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="text-center">
                    {!! $comments->appends(Request::all())->render() !!}
                </div>
            </div>
        </section>
    </div>
    @include('backend.partials.modals.destroy')
@endsection

@section('footer_script')
    <script>
        jQuery(function($) {
            $('.edit-comment').on('click', function() {
                $('#edit-comment-' + $(this).attr('data-comment_id')).toggle();
            });
            $('.edit-comment-form').on('submit', function(e) {
                e.preventDefault();
                var $this = $(this);
                $.ajax({
                    method: $this.attr('method'),
                    url: $this.attr('action'),
                    data: $this.serialize(),
                    success: function(data) {
                        if (data.hasOwnProperty('comment')) {
                            var comment = data.comment;
                            if (comment.length > 50) {
                                comment = comment.substr(0, 50) + '...';
                            }
                            $this.parent().parent().find('.comment-text').text(comment);
                        }
                        $this.parent().hide();
                    }
                });
            })
        });
    </script>
@endsection