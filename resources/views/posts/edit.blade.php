@include('partials.header')

@include('partials.navbar')

<div class="row justify-content-center main3">
  <div class="col-lg-8 mt-3">
    <form action="/posts/show/{{ $post->id }}/edit/update" method="post" enctype="multipart/form-data">
      @method('put')
        @csrf
    <div class="form-floating text-dark text-muted"> 
        <input type="text" name="title" id="title" class="form-control" value="{{ $post->title }}" />
        <label for="title">Title</label>
    </div>
    <div class="mt-2 mb-2 text-white">
      <label for="image">Post Image</label>
      <input type="hidden" name="oldImage" value="{{ $post->image }}">
      @if ($post->image)    
      <img src="{{ asset('storage/'. $post->image) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
      @else   
      <img class="img-preview img-fluid mb-3 col-sm-5"> 
      @endif
      <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
      @error('image')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
      @enderror
    </div>
    <div class="form-floating text-dark text-muted">
      @if ($post->url)    
      <input type="text" name="url" id="url" class="form-control @error('url') is-invalid @enderror" value="https://youtu.be/{{ $post->url }}"/>
      <label for="url">Link Video Youtube(nullable)</label>
      @error('url')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
      @enderror
      @else
      <input type="text" name="url" id="url" class="form-control @error('url') is-invalid @enderror" value="{{ $post->url }}"/>
      <label for="url">Link Video Youtube(nullable)</label>
      @error('url')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
      @enderror
      @endif 
  </div>
    <div class="mb-3 mt-2 text-white">
      <label for="body" class="form-label">Body</label>
        <input id="body" type="hidden" name="body" value="{{ $post->body }}">
        <trix-editor input="body"></trix-editor>
        @error('body')
          <p class="text-danger">
            {{ $message }}
          </p>
      @enderror
    </div>
      <button type="submit" class="btn btn-primary mt-3 mb-3" >Save Changes</button>
    </form>
  </div>
</div>


<script>
   document.addEventListener("trix-file-accept", function(e){
    e.preventDefault();
});
  function previewImage() {
  const image = document.querySelector("#image");
  const imgPreview = document.querySelector(".img-preview");

  imgPreview.style.display = 'block';

  const oFReader = new FileReader();
  oFReader.readAsDataURL(image.files[0]);
  oFReader.onload = function(oFREvent){
    imgPreview.src = oFREvent.target.result;
  }
}
</script>
@include('partials.footer1')
