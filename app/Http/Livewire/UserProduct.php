<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use App\Models\Wishlist;
use Livewire\WithPagination;

class UserProduct extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public function render()
    {
        if (auth()->check()) {
            $wishlistCount = Wishlist::where('user_id', auth()->user()->id)->count();
        } else {
            $wishlistCount = "";
        }
        $user = auth()->user();
        return view('livewire.user-product',[
            'wishlistCount' => $wishlistCount,
            'active'=>'My Products',
            'user'=>$user,
            'products' => Product::where('user_id', auth()->user()->id)->latest()->paginate(3)->withQueryString()
        ]);
    }
}
