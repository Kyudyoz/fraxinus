<div>
    @if ($products->count())
    <div class="row">
      @foreach ($products as $p)
      <div class="col-md-4 mb-2">
      <a class="nav-link" href="/show/{{ $p->id }}">
        <div class="card item" style="overflow:hidden;">
          <img src="{{ asset('storage/' . $p->image) }}" alt="img" class="card-img-top" style="min-height:200px;max-height:200px;"/>
        
        <div class="card-body">
          <h4 class="card-title">{{ $p->name }}</h4>
          <h5 class="card-text">Rp. {{ $p->price }}</h5>
          <hr />
          <h5 class="card-text">{{ $p->category }}</h5>
          <p class="card-text">{{ $p->user->name }}</p>
          <p class="card-text" style="min-height: 50px;max-height:50px; overflow:hidden;display: -webkit-box;
          -webkit-line-clamp: 2;
          -webkit-box-orient: vertical; text-overflow:ellipsis; ">{{ $p->description }}</p>
        </div>
        </div>
      </a>
    </div>
      @endforeach
      @else
      <p class="text-center mt-4 fs-4 text-white">Product Not Found</p>  
      @endif
      <div class="d-flex justify-content-center">
          {{ $products->links() }}
      </div>
    </div>
    
</div>
