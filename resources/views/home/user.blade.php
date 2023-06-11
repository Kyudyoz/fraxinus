@include('partials.header')
@include('partials.navbar-wishlist')

<div class="main2">
  <div class="main-containerr bg-white rounded pb-4 userBg">
    <div class="row mx-2 border-bottom border-black">
      <div class="col-md-3 my-2" style="overflow: hidden">
        <div class="pict">
          <form action="/userProfile/update" id="form" method="post" enctype="multipart/form-data" class="">
            @csrf
            @method('put')
            @if ($user->image)
            <div class="upload">
              <img src="{{ asset('storage/'. $user->image) }}" title="profile" width="125" height="125">
              <input type="hidden" name="id" value="{{ $user->id }}">
              <input type="hidden" name="name" value="{{ $user->name }}">
              <input type="hidden" name="oldImage" value="{{ $user->image }}">
              <div class="round">             
                <input type="file" name="image" id="image">
                <i class="fa-solid fa-camera fa-xl"></i>
              </div>
              @error('image')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            @else 
            <div class="upload">   
              <img src="/img/pp.jpg" title="profile" width="125" height="125">
              <input type="hidden" name="id" value="{{ $user->id }}">
              <input type="hidden" name="name" value="{{ $user->name }}">
              <div class="round">             
                <input type="file" name="image" id="image">
                <i class="fa-solid fa-camera fa-xl" style="color: #ffffff;"></i>
              </div>
              @error('image')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            @endif
          </form>
        </div>
      </div>
      <div class="col-md-9 my-2 d-flex">
        <div class="profile">
          <h5>{{ auth()->user()->name }}</h5>
          <h6>{{ auth()->user()->email }}</h6>
          <h6 style="font-size: 15px">+{{ auth()->user()->phone }}</h6>
          <h6 style="font-size: 15px">Alamat</h6>
        </div>
        <div class="logout ms-auto">
          <form action="/signout" method="post" class="ms-auto" style="width: max-content">
            @csrf
              <button class="nav-link text-decoration-none text-black" style="font-weight: 400;"><i class="fa-solid fa-right-from-bracket fa-md"></i>&nbsp;&nbsp;Logout</button> 
          </form>
        </div>
      </div>
    </div>
    <div class="row mx-4 mt-4">
      <div class="col-md-3 border-end border-black">
        <ul class="nav nav-underline my-2 d-flex flex-column" >
          <li class="nav-item" style="width: max-content">
            <a href="/userPosts" class="text-secondary nav-link {{ ($active === "My Posts") ? 'active' : '' }}"><i class="fa-solid fa-file-lines"></i> My Post</a>
          </li>
          <li class="nav-item" style="width: max-content">
            <a href="/userProducts" class="text-secondary nav-link {{ ($active === "My Products") ? 'active' : '' }}"><i class="fa-solid fa-tree"></i> My Product</a>
          </li>
          <li class="nav-item" style="width: max-content">
            <a href="/userPurchase" class="text-secondary nav-link {{ ($active === "purchase") ? 'active' : '' }}"><i class="fa-solid fa-cart-shopping"></i> Purchase</a>
          </li>
          <li class="nav-item" style="width: max-content">
            <a href="/userPurchase" class="text-secondary nav-link {{ ($active === "sale") ? 'active' : '' }}"><i class="fa-solid fa-money-bill-wave"></i> Sale</a>
          </li>
        </ul>
        
        
        
      </div>
      <div class="col-md-9">
        @yield('content')
      </div>
    </div>
  </div>
</div>

<script>
  document.getElementById('image').onchange =function(){
    document.getElementById('form').submit();
  }
</script>
@include('partials.footer1')
