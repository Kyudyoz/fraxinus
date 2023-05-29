@include('partials.header')
@include('partials.navbar')

@if (session()->has('berhasil'))

<div class="alert alert-success col-lg-12" role="alert">
  {{ session('berhasil') }}
</div>
@endif
<h1 class="text-center">Wishlist</h1>
    @if ($wishlists->isEmpty())
        <h3 class="text-center">Belum ada produk dalam Wishlist Anda.</h3>
        @include('partials.footer')
    @else
    <div class="container">
        <div class="row justify-content-center">
            @foreach ($wishlists as $p)
            <div class="col-md-8 mb-2 mx-2">
                <form action="/wishlist/{{ $p->id }}" method="post">
                    @method('delete')
                    @csrf
                    <div class="position-absolute bg-transparent px-1 py-1" style="z-index:99;">
                        <button type="submit" style="background-color: red; border:none; padding:10px; text-align:start;border-radius:10px">
                            <i class="fa-solid fa-trash fa-2xl" style="color: white"></i>
                        </button>
                    </div>
                </form>
            <a class="nav-link" href="/show/{{ $p->product->id }}" >
              <div class="card item" style="overflow:hidden;">
                <img src="{{ $p->product->image }}" alt="img" class="card-img-top" style="min-height:200px;max-height:200px;"/>
              
              <div class="card-body">
                <h4 class="card-title">{{ $p->product->name }}</h4>
                <h5 class="card-text">Rp. {{ $p->product->price }}</h5>
                <hr />
                <h5 class="card-text">{{ $p->product->category }}</h5>
                <p class="card-text">{{ $p->product->user->name }}</p>
                <p class="card-text" style="max-height: 50px; overflow:hidden;display: -webkit-box;
                -webkit-line-clamp: 2;
                -webkit-box-orient: vertical; text-overflow:ellipsis; ">{{ $p->product->description }}</p>
              </div>
              </div>
            </a>
          </div>
            @endforeach
          </div>
        </div>
          @include('partials.footer1')
    @endif