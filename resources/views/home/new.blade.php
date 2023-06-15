@include('partials.header')

@include('partials.navbar')

<div class="row justify-content-center main3">
  <div class="col-lg-5 mt-3">
    <form action="/newproduct" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-floating text-dark text-muted"> 
        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}"/>
        <label for="name">Product Name</label>
        @error('name')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
        @enderror
    </div>
    <div class="form-floating text-dark text-muted">
        <input type="text" name="price" id="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price') }}"/>
        <label for="price">Product Price</label>
        @error('price')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
        @enderror
    </div>
    <div class="form-floating text-dark text-muted">
        <input type="text" name="qty" id="qty" class="form-control @error('qty') is-invalid @enderror" value="{{ old('qty') }}"/>
        <label for="qty">Stock</label>
        @error('qty')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
        @enderror
    </div>
    <div class="form-floating text-dark text-muted">
        <select name="category" id="category" class="form-select">
          <option value="Indoors">Indoors</option>
          <option value="Outdoors">Outdoors</option>
          <option value="Seeds">Seeds</option>
          <option value="Fertilizers">Fertilizers</option>
        </select>
        <label for="category">Product Category</label>
    </div>
    <div class="mb-3 text-white">
      <label for="image" class="form-label">Product Image</label>
      <img class="img-preview img-fluid mb-3 col-sm-5">
      <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
      @error('image')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
      @enderror
    </div>
    <div class="form-floating text-dark text-muted">
        <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" style="height: max-content">{{ old('description') }}</textarea>
        <label for="description">Product Description</label>
        @error('description')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
        @enderror
    </div>
      <button type="submit" class="btn btn-primary mt-3 mb-3">Add Product</button>
    </form>
  </div>
</div>

<script>
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
