<?php

namespace App\Http\Livewire;

use App\Models\Buy;
use App\Models\Product;
use Livewire\Component;
use App\Models\Wishlist;
use Livewire\WithPagination;

class UserSale extends Component
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
        $products = Product::where('user_id', auth()->user()->id)->latest()->pluck('id')->toArray();
        $purchases = Buy::whereIn('product_id', $products)->latest()->paginate(1)->withQueryString();
        return view('livewire.user-product',[
            'wishlistCount' => $wishlistCount,
            'active'=>'sale',
            'user'=>$user,
            'products'=>$products,
            'purchases' => $purchases,
        ]);
    }
}
