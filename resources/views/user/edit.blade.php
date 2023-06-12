@extends('home.user')
@section('content')
<div class="container1">
    <form action="/user/{{ $user->id }}/update" method="post">
        @csrf
        @method('put')
        <input type="hidden" name="id" id="id" value="{{ $user->id }}" class="form-control">
        <div class="form-floating text-dark text-muted"> 
            <input type="text" name="name" id="name" value="{{ $user->name }}" class="form-control @error('name') is-invalid @enderror">
            <label for="name">Name</label>
            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-floating text-dark text-muted"> 
            <input type="email" name="email" id="email" value="{{ $user->email }}" class="form-control @error('email') is-invalid @enderror">
            <label for="email">Email</label>
            @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-floating text-dark text-muted"> 
            <input type="text" name="phone" id="phone" value="{{ $user->phone }}" class="form-control @error('phone') is-invalid @enderror">
            <label for="phone">Phone</label>
            @error('phone')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-floating text-dark text-muted"> 
            <input type="text" name="address" id="address" value="{{ $user->address }}" class="form-control @error('address') is-invalid @enderror">
            <label for="address">Address</label>
            @error('address')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-post mt-2 ms-auto">Save Changes</button>
    </form>
</div>
@endsection