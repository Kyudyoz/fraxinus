@include('partials.header')
@include('partials.navbar')

@if (session()->has('berhasil'))

<div class="alert alert-success col-lg-12" role="alert">
  {{ session('berhasil') }}
</div>
@endif
<h1 class="text-center">Wishlist</h1>
    @if ($wishlists->isEmpty())
        <h3 class="text-center">Belum ada produk dalam Wishlist Anda.</h3>
        @include('partials.footer')
    @else
    <div class="container">
        <div class="row justify-content-center">
            @foreach ($wishlists as $p)
            <div class="col-md-8 mb-2 mx-2">
                <form action="/wishlist/{{ $p->id }}" method="post" id="deleteForm">
                    @method('delete')
                    @csrf
                    <div class="position-absolute bg-transparent px-1 py-1" style="z-index:99;">
                      <input type="hidden" name="confirmed" id="deleteConfirmed" value="0">
                        <button type="button" style="background-color: red; border:none; padding:10px; text-align:start;border-radius:10px" onclick="confirmDelete(event)">
                            <i class="fa-solid fa-trash fa-2xl" style="color: white"></i>
                        </button>
                    </div>
                </form>
            <a class="nav-link" href="/show/{{ $p->product->id }}" >
              <div class="card item" style="overflow:hidden;">
                <img src="{{ asset('storage/'.$p->product->image) }}" alt="img" class="card-img-top" style="min-height:200px;max-height:200px;"/>
              
              <div class="card-body">
                <h4 class="card-title">{{ $p->product->name }}</h4>
                <h5 class="card-text">Rp. {{ $p->product->price }}</h5>
                <hr />
                <h5 class="card-text">{{ $p->product->category }}</h5>
                <p class="card-text">{{ $p->product->user->name }}</p>
                <p class="card-text" style="max-height: 50px; overflow:hidden;display: -webkit-box;
                -webkit-line-clamp: 2;
                -webkit-box-orient: vertical; text-overflow:ellipsis; ">{{ $p->product->description }}</p>
              </div>
              </div>
            </a>
          </div>
            @endforeach
          </div>
        </div>
        <!-- Modal Konfirmasi Delete -->
<div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmDeleteModalLabel">Confirmation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this wishlist?</p>
            </div>
            <div class="modal-footer">
                <input type="hidden" name="confirmed" id="deleteConfirmed" value="0">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                    onclick="setDeleteConfirmed(0)">Cancel</button>
                <button type="button" class="btn btn-danger" onclick="setDeleteConfirmed(1)"
                    data-bs-dismiss="modal">Delete</button>
            </div>
        </div>
    </div>
</div>


<script>
    // Fungsi untuk mengatur nilai konfirmasi penghapusan
    function setDeleteConfirmed(value) {
        document.getElementById('deleteConfirmed').value = value;
    }

    // Fungsi untuk menampilkan modal konfirmasi penghapusan
    function confirmDelete(event) {
        event.preventDefault();

        // Tampilkan modal konfirmasi
        $('#confirmDeleteModal').modal('show');

        // Tambahkan event listener untuk menangani konfirmasi penghapusan
        $('#confirmDeleteModal').on('hidden.bs.modal', function (e) {
            // Dapatkan nilai konfirmasi
            const confirmed = $('#deleteConfirmed').val();

            // Lanjutkan dengan penghapusan jika dikonfirmasi
            if (confirmed === '1') {
                document.getElementById('deleteForm').submit();
            }
        });
    }
</script>
          @include('partials.footer1')
    @endif