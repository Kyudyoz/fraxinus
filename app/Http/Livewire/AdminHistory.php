<?php

namespace App\Http\Livewire;

use App\Models\Buy;
use Livewire\Component;
use App\Models\Wishlist;
use Livewire\WithPagination;

class AdminHistory extends Component
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
        return view('livewire.admin-history',[
            'wishlistCount' => $wishlistCount,
            'user'=>$user,
            "active" => "Transaction History",
            'purchases' => Buy::orderByRaw("CASE WHEN status = 'Deliver' THEN 0 ELSE 1 END")
            ->orderBy('status')->latest()->paginate(1)
        ]);
    }
}
