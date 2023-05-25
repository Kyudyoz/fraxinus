@include('partials.header')
@include('partials.navbar')

<div class="main">
  <div class="main-containerr">
    <div class="categories">
      <a href="/home?category=Outdoors">
        <i class="fa-solid fa-sun fa-1x"></i>
        <p>Outdoors</p>
      </a>
      <a href="/home?category=Indoors">
        <i class="fa-solid fa-leaf fa-1x"></i>
        <p>Indoors</p>
      </a>
      <a href="/home?category=Seeds">
        <i class="fa-solid fa-seedling fa-1x"></i>
        <p>Seeds</p>
      </a>
      <a href="/home?category=Fertilizers">
        <i class="fa-solid fa-droplet fa-1x"></i>
        <p>Fertilizers</p>
      </a>
    </div>
    @if (session()->has('berhasil'))

    <div class="alert alert-success col-lg-12" role="alert">
      {{ session('berhasil') }}
    </div>
    @endif
    @if (session()->has('gagal'))

<div class="alert alert-danger col-lg-12" role="alert">
  {{ session('gagal') }}
</div>
@endif
    <div class="categories">
      <a href="/new">
        <i class="fa-solid fa-circle-plus fa-2x"></i>
        <p>Sell Product</p>
      </a>
    </div>

    <section class="items">
      <div class="container1">
        @if ($products->count())
        <div class="row">
          @foreach ($products as $p)
          <div class="col-md-4 mb-2">
          <a class="nav-link" href="/show/{{ $p->id }}">
            <div class="card item" style="overflow:hidden;">
              <img src="{{ $p->image }}" alt="img" class="card-img-top" style="min-height:200px;max-height:200px;"/>
            
            <div class="card-body">
              <h4 class="card-title">{{ $p->name }}</h4>
              <h5 class="card-text">Rp. {{ $p->price }}</h5>
              <hr />
              <h5 class="card-text">{{ $p->category }}</h5>
              <p class="card-text">{{ $p->user->name }}</p>
              <p class="card-text" style="max-height: 50px; overflow:hidden;display: -webkit-box;
              -webkit-line-clamp: 2;
              -webkit-box-orient: vertical; text-overflow:ellipsis; ">{{ $p->description }}</p>
            </div>
            </div>
          </a>
        </div>
          @endforeach
        </div>
        @else
        <p class="text-center mt-4 fs-4">Produk Tidak Ditemukan</p>  
        @endif
      </div>
    </section>
    <div class="d-flex justify-content-center">
        {{ $products->links() }}
    </div>
  </div>
</div>

@include('partials.footer1')
