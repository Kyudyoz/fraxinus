@extends('home.user')
@section('content')
<div class="container1">
    @if ($purchases->count())
        @foreach ($purchases as $purchase)
            <div class="card mb-3" style="max-width: 100%;">
                <div class="row g-0">
                    <div class="col-md-3">
                        <img src="{{ asset('storage/' . $purchase->product->image) }}" class="img-fluid rounded-start" alt="img" style="height: 100%">
                    </div>
                    <div class="col-md-9">
                        <div class="card-body">
                        <h5 class="card-title">{{ $purchase->product->name }}</h5>
                        <p class="card-text"><small class="text-body-secondary">{{ $purchase->created_at->diffForHumans() }}</small></p>
                        <a href="https://wa.me/{{ $purchase->product->user->phone }}" class="card-text text-decoration-none text-body-secondary">Seller : <small class="text-white btn btn-post"> <i class="fa-brands fa-whatsapp"></i> {{ $purchase->product->user->name }}</small></a>
                        @if ($purchase->delivery == 'yes')
                        <p class="card-text text-capitalize"><small class="text-body-secondary">Delivery Service : Yes</small></p>
                        @else
                        <p class="card-text text-capitalize"><small class="text-body-secondary">Delivery Service : No</small></p>
                        @endif
                        <p class="card-text"><small class="text-body-secondary">Total Price : {{ $purchase->total }}</small></p>
                        <p class="card-text">
                            <small class="text-body-secondary">Status :
                                @if ($purchase->status == 'Deliver')    
                                <button class="btn btn-warning" disabled="disabled">
                                    <i class="fa-solid fa-truck"> {{ $purchase->status }}</i>
                                </button>
                                @else
                                <button class="btn btn-info" disabled="disabled">
                                    <i class="fa-solid fa-truck"> {{ $purchase->status }}</i> <i class="fa-solid fa-check"></i>
                                </button>
                                @endif 
                            </small>
                        </p>
                        @if ($purchase->status == 'Deliver') 
                            <form action="/purchase/done/{{ $purchase->id }}" method="post" class="d-inline">
                                @method('put')
                                @csrf
                                <button type="submit" class="btn btn-post"><i class="fa-solid fa-check"> Done</i></button>
                            </form>
                        @endif 
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @else
      <p class="text-center mt-2 mb-4 fs-4 text-dark">No Purchases</p>
    @endif
    <div class="d-flex justify-content-center">
        {{ $purchases->links() }}
    </div>
</div>
@endsection