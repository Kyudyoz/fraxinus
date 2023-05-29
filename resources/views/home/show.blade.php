@include('partials.header')
@include('partials.navbar')


<div class="itemz-desc showz">
  <div class="itemz-desc-containerr">
    <div class="box1">
      <img src="{{ asset('storage/' . $product->image) }}" alt="img" style="height: 100%; width:100%" />
    </div>
    <div class="box2">
      <h1>{{ $product->name }}</h1>
      <h2>Rp. {{ $product->price }}</h2>
      <hr />
      <p>Category: {{ $product->category }}</p>
      <p>Seller: {{ $product->user->name }}</p>
      <hr />
      <p>{{ $product->description }}</p>
      @if (auth()->user()->name != $product->user->name)
      <div class="phone">
        <a href="https://wa.me/{{ $product->user->phone }}">
        <h1><i class="fa-brands fa-whatsapp"></i>Hubungi Penjual</h1>
        </a>
      </div>
      <form action="/wishlist/{{ $product->id }}" method="post">
      @csrf
      <div class="actions mb-2" >
        <button type="submit"><i class="fa-solid fa-heart"></i>Wishlist</button>
      </div>
      </form>
      @endif
      @auth        
      @if (auth()->user()->name == $product->user->name)
      <div class="actions">
        <form action="/show/{{ $product->id }}" method="post">
            @method('delete')
            @csrf
          <button type="submit">Delete Product</button>
        </form>
      </div>
      <a href="/show/{{ $product->id }}/edit" class="mt-3">Edit This Product</a>
      @endif
      @endauth

      <a href="/home" class="mt-3">All Products</a>
    </div>
  </div>
</div>

@include('partials.footer1')
