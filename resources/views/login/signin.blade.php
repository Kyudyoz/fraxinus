@include('partials.header')

<section class="forms">
    <div class="forms-containerr">
      <div class="box1"></div>
      <div class="box2">
        <h1>Sign In</h1>
        @if(session()->has('loginError'))

            <div class="alert alert-danger col-lg-12" role="alert">
                {{ session('loginError') }}
            </div>
        @endif
        @if(session()->has('success'))

        <div class="alert alert-success col-lg-12" role="alert">
            {{ session('success') }}
        </div>
    @endif
        <form action="/signin" method="post">
            @csrf
          <input type="email" name="email" id="email" placeholder="email" />
          <input
            type="password"
            name="password"
            id="password"
            placeholder="password"
          />
          <button type="submit">Sign In</button>
        </form>
        <hr />
        <div class="logins">
          <div class="box">
            <a href=""><i class="fa-brands fa-facebook fa-3x"></i></a>
            <a href=""><i class="fa-brands fa-google fa-3x"></i></a>
            <a href=""><i class="fa-brands fa-apple fa-3x"></i></a>
          </div>
          <a href="/signup">Don't have an account? Sign Up</a>
        </div>
      </div>
    </div>
  </section>