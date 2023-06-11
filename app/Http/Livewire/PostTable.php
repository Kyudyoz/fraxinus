<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;
use App\Models\Wishlist;
use Livewire\WithPagination;

class PostTable extends Component
{
    public $search = '';
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public function render()
    {
        if (auth()->check()) {
            $wishlistCount = Wishlist::where('user_id', auth()->user()->id)->count();
        } else {
            $wishlistCount = "";
        }
        return view('livewire.post-table',[
            "posts" =>Post::latest()
            ->when($this->search, function ($query) {
                $query->where('title', 'like', '%' . $this->search . '%');
            })
            ->filter(request(['searchPost']))
            ->paginate(3)
            ->withQueryString(),
            "wishlistCount"=>$wishlistCount
        ]);
    }
    
    public function updatingSearch()
    {
        $this->resetPage(); // Mereset halaman ke halaman pertama setiap kali pengguna mengubah nilai pencarian
    }
}
