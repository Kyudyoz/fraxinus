@include('partials.header')
@include('partials.navbar')

<div class="main2">
  <div class="main-containerr">
    <form action="/signout" method="post" class="d-flex justify-content-center text-center">
        @csrf
        <div class="card bg-light mb-3" style="max-width: max-content;">
          <div class="card-header">{{ auth()->user()->name }}</div>
          <div class="card-body">
            <h5 class="card-title">{{ auth()->user()->email }}</h5>
            <p class="card-text">+{{ auth()->user()->phone }}</p>
            <button class="nav-link text-decoration-none text-black mx-auto" style="font-weight: 400;"><i class="fa-solid fa-right-from-bracket fa-md"></i>&nbsp;&nbsp;Logout</button>
          </div>
    </form>
  </div>
</div>

@include('partials.footer')
