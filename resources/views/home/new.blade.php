@include('partials.header')

@include('partials.navbar')

<div class="row justify-content-center">
  <div class="col-lg-5">
    <form action="/newproduct" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-floating text-dark text-muted"> 
        <input type="text" name="name" id="name" class="form-control"/>
        <label for="name">Product Name</label>
    </div>
    <div class="form-floating text-dark text-muted">
        <input type="text" name="price" id="price" class="form-control"/>
        <label for="price">Product Price</label>
    </div>
    <div class="form-floating text-dark text-muted">
        {{-- <input type="text" name="category" id="category" class="form-control"/> --}}
        <select name="category" id="category" class="form-control">
          <option value="Indoors">Indoors</option>
          <option value="Outdoors">Outdoors</option>
          <option value="Seeds">Seeds</option>
          <option value="Fertilizers">Fertilizers</option>
        </select>
        <label for="category">Product Category</label>
    </div>
    <div class="form-floating text-dark text-muted">
        <input type="text" name="image" id="image" class="form-control"/>
        <label for="url">Product Image Url</label>
    </div>
    <div class="form-floating text-dark text-muted">
        <textarea name="description" id="description" class="form-control" style="height: max-content"></textarea>
        <label for="description">Product Description</label>
    </div>
      <button type="submit" class="btn btn-primary mt-3 mb-3">Add Product</button>
    </form>
    <a style="margin-bottom: 1rem; color:#cc501c" href="/home" class="text-decoration-none mb-2">All Products</a>
  </div>
</div>

@include('partials.footer1')
