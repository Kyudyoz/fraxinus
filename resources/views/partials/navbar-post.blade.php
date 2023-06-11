<nav class="navbar">
      <div class="logo">
        <img src="/img/fraxinus_logo.png" alt="logo" />
        <a href="/">Fraxinus</a>
      </div>
      <div class="search">
        <div class="wrapper">
          <form action="/posts">
            <input
              type="text"
              name="searchPost"
              id="searchPost"
              placeholder="Search Post..."
              autocomplete="off"
            wire:model="search"/>
            <button type="submit">
              <i class="fa-solid fa-magnifying-glass fa-3xs"></i>
            </button>
          </form>
        </div>
      </div>
      <div class="links">
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
        <a href="/userPosts"><i class="fa-solid fa-user fa-2xl"></i></a>
        @else
        <a href="/signin"><i class="fa-solid fa-right-to-bracket fa-2xl"></i></a>
        @endif

        
      </div>
  </nav>
  