<?php

namespace Database\Seeders;

use App\Models\Masteruser;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class masteruserseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $masteruser = [
            [
                'masterusers_name' => 'SuperAdmin'
            ],
            [
                'masterusers_name' => 'Admin'
            ],
            [
                'masterusers_name' => 'Employee'
            ],
            [
                'masterusers_name' => 'Customer'
            ],
            
        ];
        
        foreach($masteruser as $key => $value){
            Masteruser::create($value);
        }
    }
}
