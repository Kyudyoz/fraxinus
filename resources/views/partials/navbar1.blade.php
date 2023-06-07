<nav class="navbar sticky-top">
      <div class="logo">
        <img src="/img/fraxinus_logo.png" alt="logo" />
        <a href="/">Fraxinus</a>
      </div>
      <div class="search">
        <div class="wrapper">
          <form action="/home">
            <input
              type="text"
              name="search"
              id="search"
              placeholder="Search product..."
              autocomplete="off"
              wire:model="search"/>
            <button type="submit">
              <i class="fa-solid fa-magnifying-glass fa-3xs"></i>
            </button>
          </form>
        </div>
      </div>
      <div class="links">
        <a href="/"><i class="fa-solid fa-house fa-2xl"></i></a>
        <a href="/posts" class="comm"><i class="fa-solid fa-users fa-2xl"></i></a>
        <a href="/wishlist"><i class="fa-solid fa-heart fa-2xl"></i>
          @if ($wishlistCount > 0)
          <span class="wishlist-count">{{ $wishlistCount }}</span>
          @else
          <span class="wishlist-count"></span>
          @endif
        </a>
        @if (auth()->check())
        <a href="/user"><i class="fa-solid fa-user fa-2xl"></i></a>
        @else
        <a href="/signin"><i class="fa-solid fa-right-to-bracket fa-2xl"></i></a>
        @endif

        
      </div>
  </nav>
  