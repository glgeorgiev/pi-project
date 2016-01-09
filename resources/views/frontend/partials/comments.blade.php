<div class="col-sm-12 article-comments">
    @forelse($article->comments as $comment)
        @if($comment->user)
            <div class="col-sm-12 article-comment">
                <div class="col-sm-3">
                    <div class="col-sm-12 text-left">
                        {{ $comment->user->name }}
                    </div>
                    <div class="col-sm-12 text-right">
                        {{ $comment->created_at->diffForHumans() }}
                    </div>
                </div>
                <div class="col-sm-9">
                    {{ $comment->comment }}
                </div>
            </div>
        @endif
    @empty
        <div class="col-sm-12 text-center">
            <strong>Статията все още няма коментари!</strong>
        </div>
    @endforelse
</div>