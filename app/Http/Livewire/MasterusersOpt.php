<?php

namespace App\Http\Livewire;

use App\Models\Masteruser;
use Livewire\Component;

class MasterusersOpt extends Component
{
    public function render()
    {
        return view('livewire.masterusers-opt',[
            'masteruser' => Masteruser::where("masterusers_name","!=","SuperAdmin")->get()
        ]);
    }
}
