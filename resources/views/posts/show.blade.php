@include('partials.header')
@include('partials.navbar-post')

<div class="main" style="min-height: 70vh">
                <div class="card my-3" style="width:80%">
                   @if ($post->image)    
                <img src="{{ asset('storage/'. $post->image) }}" class="card-img-top" alt="{{ $post->title }}" style="max-width:1300px;min-height:350px;max-height:350px;">
                @endif
                    <div class="mx-3 mt-3">
                        @auth        
                        @if (auth()->user()->name == $post->user->name)
                        <a href="/posts/show/{{ $post->id }}/edit" class="btn btn-warning" style="vertical-align:bottom"><i class="fa-solid fa-pen-to-square" style="color: #000000;"></i> Edit</a>
                        <form action="delete/{{ $post->id }}" method="post" class="d-inline" id="deleteForm">
                            @method('delete')
                            @csrf
                            <input type="hidden" name="confirmed" id="deleteConfirmed" value="0">
                            <button type="button" class="btn btn-danger" onclick="confirmDelete(event)" style="vertical-align: bottom"><i class="fa-solid fa-trash" style="color: #000000;"></i> Delete</button>
                          </form>
                        @endif 
                        @endauth 
                    </div>
                    <div class="card-body">
                        <h2 class="card-title mb-3">{{ $post->title }}</h2> 

                        <p class="card-text">
                            <small class="text-muted"> By 
                                <strong>{{ $post->user->name}}</strong>
                                {{ $post->created_at->diffForHumans() }}
                            </small>
                        </p>
                        <hr/>
              @if ($post->url)    
              <iframe style="margin-left: 25%;" width="50%" height="300" src="https://www.youtube.com/embed/{{ $post->url }}">
                </iframe>
                @endif
                        <article class="my-3 fs-6">
                            {!! $post->body !!}
                        </article>
                    </div>
                    <a href="/posts" class=" mt-2 mb-2 mx-3 btn btn-post">Back to posts</a>
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
                <p>Are you sure you want to delete this post?</p>
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
