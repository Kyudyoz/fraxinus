<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class ProductTable extends Component
{
    public $search = '';
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public function render()
    {
        return view('livewire.product-table',[
            "products" =>Product::latest()->filter(request(['search','category']))->paginate(3)->withQueryString(),
        ]);
    }

    public function search()
    {
        $this->resetPage(); // Mereset halaman ke halaman pertama setelah setiap pencarian
    }

}
