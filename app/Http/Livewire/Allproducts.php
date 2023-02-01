<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class Allproducts extends Component
{

    use WithPagination;
    public function render()
    {
        $allproducts = Product::latest()->paginate(6);
        return view('livewire.allproducts',[
            "allproducts" => $allproducts
        ]);
    }
}
