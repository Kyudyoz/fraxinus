@include('partials.header')
@include('partials.navbar')

<div class="main">
  <div class="main-containerr">
    <form action="/signout" method="post">
        @csrf
        <h3>{{ auth()->user()->name }}</h3>
        <h5>{{ auth()->user()->email }}</h5>
        <p>+{{ auth()->user()->phone }}</p>
        <button class="nav-link text-decoration-none text-black" style="font-weight: 400;"><i class="fa-solid fa-right-from-bracket fa-md"></i>&nbsp;&nbsp;Logout</button>
    </form>
  </div>
</div>

@include('partials.footer')
