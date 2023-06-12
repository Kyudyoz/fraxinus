@include('partials.header')
@include('partials.navbar')

<div class="itemz-desc showz main3">
    <div class="itemz-desc-containerr mt-4">
        <div class="box1">
            <img src="{{ asset('storage/' . $product->image) }}" alt="img" style="height: 100%; width:100%" />
        </div>
        <div class="box2">
            <h1>{{ $product->name }}</h1>
            <h2>Rp. {{ $product->price }}</h2>
            <hr />
            <p>Category: {{ $product->category }}</p>
            <p>Seller: {{ $product->user->name }}</p>
            <p>Stock: {{ $product->qty }}</p>
            <hr />
            <p>{{ $product->description }}</p>
            @if (auth()->user()->name != $product->user->name && !auth()->user()->is_admin)
            <div class="phone">
                <a href="https://wa.me/{{ $product->user->phone }}">
                    <h1><i class="fa-brands fa-whatsapp"></i>Contact Seller</h1>
                </a>
            </div>
            <form action="/wishlist/{{ $product->id }}" method="post">
                @csrf
                <div class="actions mb-2">
                    <button type="submit"><i class="fa-solid fa-heart"></i>Wishlist</button>
                </div>
            </form>
            @if ($product->qty > 0)    
            <div class="actions mb-2">
                <a href="/buy/{{ $product->id }}" class="my-2"><button><i class="fa-solid fa-cart-shopping"></i>Buy Now</button></a>
            </div>
            @else
            <div class="actions mb-2">
                <button disabled='disabled'><i class="fa-solid fa-cart-shopping"></i> No Stock</button>
            </div>
            @endif
            
            @endif
            @if (auth()->user()->name == $product->user->name || auth()->user()->is_admin)
            <div class="actions">
                <form action="/show/{{ $product->id }}" method="post" id="deleteForm">
                    @method('delete')
                    @csrf
                    <!-- Tambahkan field hidden untuk melewatkan konfirmasi penghapusan -->
                    <input type="hidden" name="confirmed" id="deleteConfirmed" value="0">
                    <button type="button" class="btn btn-danger" onclick="confirmDelete(event)">Delete Product</button>
                </form>
            </div>
            @endif
            @if (auth()->user()->name == $product->user->name)
            <a href="/show/{{ $product->id }}/edit" class="mt-3">Edit This Product</a>
            @endif
            <a href="/home" class="mt-3">All Products</a>
        </div>
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
                <p>Are you sure you want to delete this product?</p>
            </div>
            <div class="modal-footer">
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
