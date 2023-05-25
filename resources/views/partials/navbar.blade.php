<nav class="navbar">
      <div class="logo">
        <img src="/img/fraxinus_logo.png" alt="logo" />
        <a href="/home">Fraxinus</a>
      </div>
      <div class="search">
        <div class="wrapper">
          <form action="/home">
            <input
              type="text"
              name="search"
              id="search"
              placeholder="Search here..."
              autocomplete="off"
            />
            <button type="submit">
              <i class="fa-solid fa-magnifying-glass fa-3xs"></i>
            </button>
          </form>
        </div>
      </div>
      <div class="links">
        <a href="/home"><i class="fa-solid fa-house fa-2xl"></i></a>
        <a href="/wishlist"><i class="fa-solid fa-heart fa-2xl"></i>
          @if ($wishlistCount > 0)
          <span class="wishlist-count">{{ $wishlistCount }}</span>
          @else
          <span class="wishlist-count"></span>
          @endif
        </a>
        <a href="/user"><i class="fa-solid fa-user fa-2xl"></i></a>
      </div>
  </nav>
  