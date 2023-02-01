<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class Mycart extends Component
{
    use WithPagination;



    public function remove($id)
    {
        $removeId = Order::find($id);
        $removeId->delete();
        session()->flash('rmmessage', 'Order successfully Deleted.');
    }

    public function render()
    {   
        $orders = Order::latest()->paginate(10);
        
        return view('livewire.mycart',[
            'orders' => $orders,
            
        ]);
    }
}
