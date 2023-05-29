@include('partials.header')
@include('partials.navbar')

<div class="main">
                <div class="card" style="width:80%">
                   @if ($post->image)    
                <img src="{{ asset('storage/'. $post->image) }}" class="card-img-top" alt="{{ $post->title }}" style="max-width:1300px;min-height:350px;max-height:350px;">
                @endif
                    <div class="mx-3 mt-3">
                        @auth        
                        @if (auth()->user()->name == $post->user->name)
                        <a href="/posts/show/{{ $post->id }}/edit" class="btn btn-warning" style="vertical-align:bottom"><i class="fa-solid fa-pen-to-square" style="color: #000000;"></i> Edit</a>
                        <form action="delete/{{ $post->id }}" method="post" class="d-inline">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are You Sure?')" style="vertical-align: bottom"><i class="fa-solid fa-trash" style="color: #000000;"></i> Hapus</button>
                          </form>
                        @endif 
                        @endauth 
                    </div>
                    <div class="card-body">
                        <h2 class="card-title mb-3">{{ $post->title }}</h2> 

                        <p class="card-text">
                            <small class="text-muted"> By 
                                <strong>{{ $post->user->name}}</strong>
                                {{ $post->created_at->diffForHumans() }}
                            </small>
                        </p>
                        <hr/>
              @if ($post->url)    
              <iframe width="320" height="240" src="https://www.youtube.com/embed/{{ $post->url }}">
                </iframe>
                @endif
                        <article class="my-3 fs-6">
                            {!! $post->body !!}
                        </article>
                    </div>
                    <a href="/posts" class=" mt-2 mb-2 mx-3 btn btn-primary">Back to posts</a>
                </div>
</div>
@include('partials.footer1')
