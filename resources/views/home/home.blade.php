@include('partials.header')
@include('partials.navbar')

{{-- <div class="home">
  <video class="video-slide active" src="/css/indoor.mp4" autoplay muted loop></video>
  <video class="video-slide" src="/css/Outdoor.mp4" autoplay muted loop></video>
  <video class="video-slide" src="/css/fertilizers.mp4" autoplay muted loop></video>
  <video class="video-slide" src="/css/seeds.mp4" autoplay muted loop></video>
  <div class="content active">
    <h1>Indoor</h1>
    <p>Tanaman indoor biasanya membutuhkan perawatan yang relatif mudah, termasuk penyiraman teratur, pemupukan sesekali, dan penempatan di tempat yang sesuai dengan tingkat cahaya yang tepat. Mereka dapat memberikan manfaat yang positif bagi kesehatan dan kesejahteraan, seperti meningkatkan kualitas udara dan mengurangi stres. </p>
    <a href="#">Explore</a>
  </div>
  <div class="content">
      <h1>Outdoor</h1>
      <p>Tanaman outdoor tidak hanya memberikan keindahan visual, tetapi juga dapat menciptakan lingkungan yang sejuk, menarik serangga penyerbuk, menyediakan tempat perlindungan untuk satwa liar, serta memberikan udara segar dan sumber makanan yang sehat. Dengan merencanakan taman outdoor dengan bijak dan memilih tanaman yang sesuai, Anda dapat menciptakan ruang hijau yang menyenangkan dan alami di luar ruangan Anda.</p>
      <a href="#">Explore</a>
    </div>
    <div class="content">
      <h1>Fertilizers</h1>
      <p>Fertilizers dapat diterapkan dalam berbagai bentuk, termasuk granul, serbuk, cairan, atau tusuk. Mereka biasanya digunakan untuk melengkapi tingkat nutrisi dalam tanah, terutama ketika sumber nutrisi alami tidak mencukupi atau ketika tanaman mengalami kekurangan nutrisi tertentu. Penerapan yang tepat dari fertilizer melibatkan mengikuti petunjuk yang tertera pada label produk, mempertimbangkan kebutuhan khusus tanaman, dan menghindari pemupukan berlebihan yang dapat menyebabkan polusi lingkungan atau kerusakan pada tanaman.</p>
      <a href="#">Explore</a>
    </div>
    <div class="content">
      <h1>Seeds</h1>
      <p>Biji tanaman hias adalah awal dari keindahan dan keunikan tanaman hias. Dengan menanam biji yang dipilih dengan cermat, Anda dapat mengembangkan berbagai varietas tanaman hias yang indah di taman atau di dalam rumah Anda. Tumbuhkan biji tanaman hias dengan cinta dan perhatian, dan nikmati kegembiraan melihat mereka tumbuh dan berkembang menjadi tanaman yang menakjubkan.</p>
      <a href="#">Explore</a>
    </div>
  <div class="slide-navigation">
      <div class="nav-btn active"></div>
      <div class="nav-btn"></div>
      <div class="nav-btn"></div>
      <div class="nav-btn"></div>
  </div>
</div>
<script type="text/JavaScript">  
  //JS for video slider navigation
  const btns = document.querySelectorAll(".nav-btn");
  const slides = document.querySelectorAll(".video-slide");
  const contents = document.querySelectorAll(".content");
  var sliderNav = function(manual){
      btns.forEach((btn)=>{
          btn.classList.remove("active");
      });
      slides.forEach((slide)=>{
          slide.classList.remove("active");
      });
      contents.forEach((content)=>{
          content.classList.remove("active");
      });
      btns[manual].classList.add("active");
      slides[manual].classList.add("active");
      contents[manual].classList.add("active");
  }
  btns.forEach((btn, i) => {
      btn.addEventListener("click", () => {
          sliderNav(i);
      });
  });
</script> --}}
<section>
  <h2 id="text"><span>It's time for a new</span><br>Flowers</h2>
  <img src="/img/bird1.png" id="bird1">
  <img src="/img/bird2.png" id="bird2">
  <img src="/img/forest.png" id="forest">
  <a href="#" id="btn">Explore</a>
  <img src="/img/rocks.png" id="rocks">
  <img src="/img/water.png" id="water">
</section>
<script>
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
  })
  
</script>


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
    <div class="categories">
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
    
    <div class="categories">
      <a href="/posts" class="comm">
        <i class="fa-solid fa-users fa-2x"></i>
        <p>Community</p>
      </a>
      <a href="/new" class="sell">
        <i class="fa-solid fa-circle-plus fa-2x"></i>
        <p>Sell Product</p>
      </a>
    </div>

    <div class="items">
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
        <p class="text-center mt-4 fs-4">Produk Tidak Ditemukan</p>  
        @endif
      </div>
    </div>
    <div class="d-flex justify-content-center">
        {{ $products->links() }}
    </div>
  </div>
</div>

@include('partials.footer1')
