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
        
        @livewire('product-table')
      </div>
    </div>
  </div>
</div>



@include('partials.footer1')
