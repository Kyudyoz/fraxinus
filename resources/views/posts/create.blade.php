@include('partials.header')

@include('partials.navbar')

<div class="row justify-content-center">
  <div class="col-lg-5">
    <form action="/store" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-floating text-dark text-muted"> 
        <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}"/>
        <label for="title">Title</label>
        @error('title')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
        @enderror
    </div>
    <div class="mb-3 mt-2 text-dark text-muted">
      <label for="image" class="form-label">Post Image(nullable)</label>
      <img class="img-preview img-fluid mb-3 col-sm-5">
      <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
      @error('image')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
      @enderror
    </div>
    <div class="form-floating text-dark text-muted"> 
      <input type="text" name="url" id="url" class="form-control @error('url') is-invalid @enderror" value="{{ old('url') }}"/>
      <label for="url">Link Video Youtube(nullable)</label>
      @error('url')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
      @enderror
  </div>
    <div class="mb-3 mt-2 text-dark text-muted">
      <label for="body" class="form-label">Body</label>
        <input id="body" type="hidden" name="body" value="{{ old('body') }}">
        <trix-editor input="body"></trix-editor>
        @error('body')
          <p class="text-danger">
            {{ $message }}
          </p>
      @enderror
    </div>
      <button type="submit" class="btn btn-primary mt-3 mb-3">Create Post</button>
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
