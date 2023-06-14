<?php

namespace App\Http\Livewire;

use App\Models\Buy;
use Livewire\Component;
use App\Models\Wishlist;
use Livewire\WithPagination;

class AdminDelivery extends Component
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
        return view('livewire.admin-delivery',[
            'wishlistCount' => $wishlistCount,
            'user'=>$user,
            "active" => "Delivery Requests",
            'purchases' => Buy::where('delivery', 'yes')->latest()->paginate(1)
        ]);
    }
}
