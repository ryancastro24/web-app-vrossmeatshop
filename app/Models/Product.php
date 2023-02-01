<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];
    
    public function saveData($data){
        return $this->create($data);
    }

    
    public function getData(){
        return $this->all();
    }
}
