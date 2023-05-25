@include('partials.header')

@include('partials.navbar')

<div class="row justify-content-center">
  <div class="col-lg-5">
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
        <input type="text" name="category" id="category" class="form-control" value="{{ $product->category }}" />
        <label for="category">Product Category</label>
    </div>
    <div class="form-floating text-dark text-muted">
        <input type="text" name="image" id="image" class="form-control" value="{{ $product->image }}" />
        <label for="url">Product Image Url</label>
    </div>
    <div class="form-floating text-dark text-muted">
        <textarea name="description" id="description" class="form-control" style="height: max-content">{{ $product->description }}</textarea>
        <label for="description">Product Description</label>
    </div>
      <button type="submit" class="btn btn-primary mt-3 mb-3">Save Changes</button>
    </form>
    <a style="margin-bottom: 1rem; color:#cc501c" href="/home" class="text-decoration-none mb-2">All Products</a>
    <a href="/show/{{ $product->id }}" class="text-decoration-none mx-4 mb-2" style="color: #cc501c">Back</a>
  </div>
</div>

@include('partials.footer1')
