<?php

namespace App\Http\Livewire;

use App\Models\Buy;
use Livewire\Component;
use App\Models\Wishlist;
use Livewire\WithPagination;

class UserPurchase extends Component
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
            'active'=>'purchase',
            'user'=>$user,
            'purchases' => Buy::where('user_id', $user->id)->latest()->paginate(1)->withQueryString()
        ]);
    }
}
