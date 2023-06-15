<nav class="navbar sticky-top">
      <div class="logo">
        <img src="/img/fraxinus_logo.png" alt="logo" />
        <a href="/">Fraxinus</a>
      </div>
      <div class="links ms-auto">
        <a href="/home"><i class="fa-solid fa-house fa-2xl"></i><small class="hilang"> Home</small></a>
        <a href="/posts" class="comm"><i class="fa-solid fa-users fa-2xl"></i><small class="hilang"> Community</small></a>
        @can('user')
        <a href="/wishlist"><i class="fa-solid fa-heart fa-2xl"></i>
          @if ($wishlistCount > 0)
          <span class="wishlist-count">{{ $wishlistCount }} <small class="hilang"> Wishlist</small></span>
          @else
          <span class="wishlist-count"><small class="hilang"> Wishlist</small></span>
          @endif
        </a>
        @endcan
        @if (auth()->check())
        @can('user')
          <a href="/userPosts"><i class="fa-solid fa-user fa-2xl"></i><small class="hilang"> Profile</small></a>
          @elsecan('admin')
          <a href="/delivReq"><i class="fa-solid fa-user fa-2xl"></i><small class="hilang"> Profile</small></a>
        @endcan
        @else
        <a href="/signin"><i class="fa-solid fa-right-to-bracket fa-2xl"></i><small class="hilang"> Login</small></a>
        @endif


      </div>
  </nav>
