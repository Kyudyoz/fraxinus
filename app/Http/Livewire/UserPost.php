<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;
use App\Models\Wishlist;
use Livewire\WithPagination;

class UserPost extends Component
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
        return view('livewire.user-post',[
            'wishlistCount' => $wishlistCount,
            'active'=>'My Posts',
            'user'=>$user,
            'posts' => Post::where('user_id', auth()->user()->id)->latest()->paginate(3)->withQueryString()
        ]);
    }
}
