@include('partials.header')

@include('partials.navbar')

<div class="row justify-content-center main3">
  <div class="col-lg-5 mt-3">
    <form action="/show/{{ $product->id }}" method="post" enctype="multipart/form-data">
      @method('put')
        @csrf
    <div class="form-floating text-dark text-muted"> 
        <input type="text" name="name" id="name" class="form-control" value="{{ $product->name }}" />
        <label for="name">Product Name</label>
    </div>
    <div class="form-floating text-dark text-muted">
        <input type="text" name="price" id="price" class="form-control" value="{{ $product->price }}" />
        <label for="price">Product Price</label>
    </div>
    <div class="form-floating text-dark text-muted">
        <input type="text" name="qty" id="qty" class="form-control" value="{{ $product->qty }}" />
        <label for="qty">Stock</label>
    </div>
    <div class="form-floating text-dark text-muted">
      <select name="category" id="category" class="form-select">
          <option value="Indoors" {{ old('category', $product->category) === 'Indoors' ? 'selected' : '' }}>Indoors</option>
          <option value="Outdoors" {{ old('category', $product->category) === 'Outdoors' ? 'selected' : '' }}>Outdoors</option>
          <option value="Seeds" {{ old('category', $product->category) === 'Seeds' ? 'selected' : '' }}>Seeds</option>
          <option value="Fertilizers" {{ old('category', $product->category) === 'Fertilizers' ? 'selected' : '' }}>Fertilizers</option>
      </select>
      <label for="category">Product Category</label>
  </div>
    <div class="text-white">
      <label for="image">Product Image</label>
      <input type="hidden" name="oldImage" value="{{ $product->image }}">
      <img src="{{ asset('storage/'. $product->image) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">

      <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
      @error('image')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
      @enderror
    </div>
    <div class="form-floating text-dark text-muted">
        <textarea name="description" id="description" class="form-control" style="height: max-content">{{ $product->description }}</textarea>
        <label for="description">Product Description</label>
    </div>
      <button type="submit" class="btn btn-primary mt-3 mb-3">Save Changes</button>
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
