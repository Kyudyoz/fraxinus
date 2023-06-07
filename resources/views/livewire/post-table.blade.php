<div>
    <div class="items">
        <div class="container1">
        <nav class="navbar sticky-top bg-transparent p-0" style="border-radius: 50%">
          <div class="search">
            <div class="wrapper">
              <form action="/posts">
                <input
                  type="text"
                  name="searchPost"
                  id="searchPost"
                  placeholder="Search Post..."
                  autocomplete="off"
                wire:model="search"/>
                <button type="submit">
                  <i class="fa-solid fa-magnifying-glass fa-3xs"></i>
                </button>
              </form>
            </div>
          </div>
        </nav>
          <a href="/create" class="btn btn-primary mt-3 mb-3"><i class="fa-solid fa-plus" style="color: #ffffff;"></i> New Post</a>
          @if ($posts->count())
          <div class="row mt-2">
              @foreach ($posts as $post)
            <div class="col-md-12 mb-2">
            <a class="nav-link" href="/posts/show/{{ $post->id }}">
              <div class="card item" style="overflow:hidden;">
              <div class="card-body">
                <h2 class="card-title">{{ $post->title }}</h2>
                <small class="card-text text-muted">By <strong>{{ $post->user->name }}</strong> {{ $post->created_at->diffForHumans() }}</small>
                <hr/>
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
          <p class="text-center mt-4 fs-4 text-white">Post Not Found</p>  
          @endif
        </div>
        <div class="d-flex justify-content-center">
            {{ $posts->links() }}
        </div>
      </div>
</div>