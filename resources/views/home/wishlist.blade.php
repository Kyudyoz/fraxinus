@include('partials.header')
@include('partials.navbar-wishlist')



<div class="main3">
    
    <div class="row d-flex justify-content-center">
        @if (session()->has('berhasil'))
        <div class="alert alert-success col-lg-10 mt-3" role="alert">
            {{ session('berhasil') }}
        </div>
        @endif
    </div>
    @if ($wishlists->isEmpty())
        <h3 class="text-center text-white" style="padding-top: 14%">You don't have a wishlist yet</h3>
        @include('partials.footer')
    @else
    <h1 class="text-center text-white pt-2">Wishlist</h1>
    <div class="container">
        <div class="row">
            @foreach ($wishlists as $p)
            <div class="col-md-4 mb-2">
                <form action="/wishlist/{{ $p->id }}" method="post" id="deleteForm{{ $p->id }}">
                    @method('delete')
                    @csrf
                    <div class="position-absolute bg-transparent px-1 py-1" style="z-index:99;">
                        <input type="hidden" name="confirmed" id="deleteConfirmed{{ $p->id }}" value="0">
                        <button type="button" style="background-color: red; border:none; padding:10px; text-align:start;border-radius:10px" onclick="openConfirmationModal({{ $p->id }})">
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
          <div class="d-flex justify-content-center">
            {{ $wishlists->links() }}
        </div>
        </div>
    </div>


        <!-- Modal Penghapusan -->
<div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmationModalLabel">Konfirmasi Penghapusan Wishlist</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Apakah Anda yakin ingin menghapus wishlist ini?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-danger" onclick="deleteWishlist()">Hapus</button>
            </div>
        </div>
    </div>
</div>

<script>
    let deleteId;

    function openConfirmationModal(id) {
        deleteId = id;
        $('#confirmationModal').modal('show');
    }

    function deleteWishlist() {
        // Tandai penghapusan dikonfirmasi
        document.getElementById('deleteConfirmed' + deleteId).value = '1';
        // Submit form penghapusan
        document.getElementById('deleteForm' + deleteId).submit();
    }
</script>
          @include('partials.footer1')
    @endif