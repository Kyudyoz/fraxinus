<div>
  @include('partials.navbar1')

  <section class="landing">
    <h2 id="text"><span>It's time for a new</span><br>Flowers</h2>
    <img src="/img/bird1.png" id="bird1">
    <img src="/img/bird2.png" id="bird2">
    <img src="/img/forest.png" id="forest">
    <a href="#scroll" id="btn" class="page-scroll">Explore</a>
    <img src="/img/rocks.png" id="rocks">
    <img src="/img/water.png" id="water">
  </section>
  
  <div class="main">
    <div class="main-containerr">
      
      <div class="categories" id="scroll">
        <a href="/home?category=Outdoors" class="out">
          <i class="fa-solid fa-sun fa-1x"></i>
          <p>Outdoors</p>
        </a>
        <a href="/home?category=Indoors" class="in">
          <i class="fa-solid fa-leaf fa-1x"></i>
          <p>Indoors</p>
        </a>
        <a href="/home?category=Seeds" class="seed">
          <i class="fa-solid fa-seedling fa-1x"></i>
          <p>Seeds</p>
        </a>
        <a href="/home?category=Fertilizers" class="fer">
          <i class="fa-solid fa-droplet fa-1x"></i>
          <p>Fertilizers</p>
        </a>
      </div>
      
      <div class="categories" id="items">
        <a href="/posts" class="comm">
          <i class="fa-solid fa-users fa-2x"></i>
          <p>Community</p>
        </a>
        @can('user')    
        <a href="/new" class="sell">
          <i class="fa-solid fa-circle-plus fa-2x"></i>
          <p>Sell Product</p>
        </a>
        @endcan
      </div>
  
      <div class="items" >
        <div class="container1">
     
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
      </div>
    </div>
  </div>
</div>
