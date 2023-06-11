@extends('home.user')
@section('content')
<div class="container1">

    <a href="/create" class="btn btn-post mb-3"><i class="fa-solid fa-plus"
            style="color: #ffffff;"></i> New Post</a>
    @if($posts->count() > 0)
        <div class="row mt-2">
            @foreach($posts as $post)
                <div class="col-md-4 mb-2">
                    <a class="nav-link" href="/posts/show/{{ $post->id }}">
                        <div class="card item" style="overflow:hidden;">
                            <div class="card-body">
                                <h2 class="card-title">{{ $post->title }}</h2>
                                <small class="card-text text-muted">
                                    {{ $post->created_at->diffForHumans() }}</small>
                                <hr />
                                <p class="card-text" style="min-height: 50px;max-height:50px; overflow:hidden;display: -webkit-box;
-webkit-line-clamp: 2;
-webkit-box-orient: vertical; text-overflow:ellipsis; ">{{ strip_tags($post->body) }}</p>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    @else
        <p class="text-center mt-2 mb-4 fs-4 text-dark">You don't have any posts yet</p>
    @endif
</div>
<div class="d-flex justify-content-center mt-2">
    {{ $posts->links() }}
</div>
@endsection