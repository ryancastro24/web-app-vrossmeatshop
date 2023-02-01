<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class DashboardProducts extends Component
{
    use WithPagination;
    public $data;

public function edit($id)
{
    $this->data = Product::find($id);
    return $this->data;
}

    public function render()
    {   $allproducts = Product::latest()->paginate(6);
        $latestproducts = Product::latest()->take(4)->get();
        return view('livewire.dashboard-products',
        [   'displayProducts' => $latestproducts ,
            'data' => $this->data,
            'allproducts' => $allproducts
        ]
    );
    }
}
