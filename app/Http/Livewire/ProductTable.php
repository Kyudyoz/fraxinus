<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use App\Models\Wishlist;
use Livewire\WithPagination;

class ProductTable extends Component
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
        return view('livewire.product-table',[
            "products" =>Product::latest()
            ->when($this->search, function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%');
            })
            ->filter(request(['search','category']))
            ->paginate(3),
            "wishlistCount" => $wishlistCount
        ]);
    }

    public function updatingSearch()
    {
        $this->resetPage(); // Mereset halaman ke halaman pertama setiap kali pengguna mengubah nilai pencarian
    }


}
