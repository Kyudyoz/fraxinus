@include('partials.header')
@include('partials.navbar')

<div class="main2">
    <div class="main-containerr">
        <div class="row bg-white mb-3 rounded">
            <div class="col-md-3 mt-2">
                <p>{{ auth()->user()->name }}</p>
                <p>+{{ auth()->user()->phone }}</p>
            </div>
            <div class="col-md-9 mt-2">
                <p>{{ auth()->user()->address }}</p>
            </div>
        </div>
        <div class="row mb-3 bg-white rounded">
            <table class="mx-2 table-responsive">
                <tr>
                    <th class="py-2">Products Ordered</th>
                    <th>Price</th>
                </tr>
                <tr>
                    <td class="py-2">Seller : {{ $product->user->name }}</td>
                </tr>
                <tr>
                    <td class="py-4">
                        <img src="{{ asset('storage/' . $product->image) }}" alt="product" width="50" class="img-thumbnail"> 
                        {{ $product->name }}
                    </td>
                    <td>Rp.{{ $product->price }}</td>
                </tr>
            </table>
        </div>
        <div class="row mb-3 " style="width: 102%;margin-left:0.3%">
            <div class="row mb-3">
                <form action="/buy/{{ $product->id }}/store" method="post">
                    @csrf
                    <input type="hidden" name="product_id" id="product_id" value="{{ $product->id }}">
                    <input type="hidden" name="user_id" id="user_id" value="{{ auth()->user()->id }}">
                    <select name="delivery" id="delivery" class="form-select form-select-md @error('delivery') is-invalid @enderror" style="width:104%; margin-left:-2%">
                        <option hidden selected disabled>Use Delivery Service?</option>
                        <option value="yes">Yes - Rp.20000</option>
                        <option value="no">No</option>
                    </select>
                    @error('delivery')
                        <div class="invalid-feedback" style="margin-left:-2%">
                            {{ $message }}
                        </div>
                    @enderror
            </div>
            <div class="row">
                <button type="submit" class="btn btn-post ms-auto" style="width:max-content; margin-right:-1%">Buy Now</button>
            </div>
                </form>
        </div>
    </div>
</div>

@include('partials.footer1')