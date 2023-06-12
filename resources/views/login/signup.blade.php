@include('partials.header')
<div class="forms main4">
    <div class="forms-containerr mt-4">
      <div class="box1 my-4"></div>
      <div class="box2 my-4">
        <h1>Sign Up</h1>
        <form action="/signup" method="post">
        @csrf
          <input type="text" name="name" id="name" placeholder="Name" />
          <input type="text" name="phone" id="phone" placeholder="Phone Number" />
          <input type="email" name="email" id="email" placeholder="Email" />
          <input type="address" name="address" id="address" placeholder="Address" />
          <input
            type="password"
            name="password"
            id="password"
            placeholder="Password"
          />
          <button type="submit">Sign Up</button>
        </form>
        <hr />
        <div class="logins">
          <div class="box">
            <a href=""><i class="fa-brands fa-facebook fa-3x"></i></a>
            <a href=""><i class="fa-brands fa-google fa-3x"></i></a>
            <a href=""><i class="fa-brands fa-apple fa-3x"></i></a>
          </div>
          <a href="/signin">Already have an account? Sign In</a>
        </div>
      </div>
    </div>
  </div>
  <script>
    document.getElementById("phone").addEventListener("input", function() {
  var input = this.value;
  input = input.replace(/\+|-/g, ""); // Menghapus tanda "+" atau "-"
  input = input.replace(/[^\d]/g, ""); // Menghapus karakter selain digit
  
  // Memastikan angka pertama tidak diisi dengan 0 dan diganti dengan 62
  if (input.startsWith("0")) {
    input = "62" + input.substr(1);
  }
  
  this.value = input;
});

  </script>