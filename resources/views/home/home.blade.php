@include('partials.header')
@include('partials.navbar')

<section>
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
      <a href="/new" class="sell">
        <i class="fa-solid fa-circle-plus fa-2x"></i>
        <p>Sell Product</p>
      </a>
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
        </div>
        @else
        <p class="text-center mt-4 fs-4 text-white">Product Not Found</p>  
        @endif
      </div>
    </div>
    <div class="d-flex justify-content-center">
        {{ $products->links() }}
    </div>
  </div>
</div>


<script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
<script>

$('.page-scroll').on('click', function(e){
  e.preventDefault();
  let href = $(this).attr('href');
  let elementHref = $(href);
  $('html, body').animate({
    scrollTop: elementHref.offset().top - 20
  }, 1000);
});
  
  let text = document.getElementById('text');
  let bird1 = document.getElementById('bird1');
  let bird2 = document.getElementById('bird2');
  let btn = document.getElementById('btn');
  let rocks = document.getElementById('rocks');
  let forest = document.getElementById('forest');
  let water = document.getElementById('water');

  window.addEventListener('scroll', function(){
    let value = window.scrollY;
    text.style.top = 50 + value * -0.2 + '%';
    bird1.style.top = value * -1.5 + '%';
    bird1.style.left = value * 2 + '%';
    bird2.style.top = value * -1.5 + '%';
    bird2.style.left = value * -5 + '%';
    btn.style.marginTop = value * 1.5 + 'px';
    rocks.style.top = value * -0.12 + 'px';
    forest.style.top = value * 0.25 + 'px';
  });
   
// Memanggil fungsi untuk mengatur scroll hanya ketika URL memenuhi kriteria
window.addEventListener("load", function() {
  // Mengecek URL halaman
  if (window.location.href != "http://localhost:8000") {
    // Mendapatkan elemen kontainer dengan ID "items"
    var container = document.getElementById("items");

    // Mendapatkan posisi top kontainer sebelum pindah halaman
    var previousTop = container.getBoundingClientRect().top + window.pageYOffset;

    // Mengatur posisi scroll ke posisi top sebelumnya
    window.scrollTo({
      top: previousTop + 50,
      behavior: "instant" // Menggunakan "instant" untuk menghilangkan animasi scroll
    });
  }
});

  
  
</script>
@include('partials.footer1')
