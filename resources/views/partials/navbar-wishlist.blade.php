<nav class="navbar sticky-top">
      <div class="logo">
        <img src="/img/fraxinus_logo.png" alt="logo" />
        <a href="/">Fraxinus</a>
      </div>
      <div class="links ms-auto">
        <a href="/home"><i class="fa-solid fa-house fa-2xl"></i></a>
        <a href="/posts" class="comm"><i class="fa-solid fa-users fa-2xl"></i></a>
        <a href="/wishlist"><i class="fa-solid fa-heart fa-2xl"></i>
          @if ($wishlistCount > 0)
          <span class="wishlist-count">{{ $wishlistCount }}</span>
          @else
          <span class="wishlist-count"></span>
          @endif
        </a>
        @if (auth()->check())
        @can('user')
          <a href="/userPosts"><i class="fa-solid fa-user fa-2xl"></i></a>
          @elsecan('admin')
          <a href="/delivReq"><i class="fa-solid fa-user fa-2xl"></i></a>
        @endcan
        @else
        <a href="/signin"><i class="fa-solid fa-right-to-bracket fa-2xl"></i></a>
        @endif

        
      </div>
  </nav>
  