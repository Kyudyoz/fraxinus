@include('partials.header')
@include('partials.navbar')

<div class="main2">
  <div class="main-containerr">
    @if (session()->has('berhasil'))

    <div class="alert alert-success col-lg-12" role="alert">
      {{ session('berhasil') }}
    </div>
    @endif
    @if (session()->has('gagal'))

<div class="alert alert-danger col-lg-12" role="alert">
  {{ session('gagal') }}
</div>
@endif

    @livewire('post-table')
  </div>
</div>

@include('partials.footer1')
