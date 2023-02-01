<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class APIController extends Controller
{

   
    public function saveData(Request $request)
    {
      Order::create([
        "product_id" => $request->orderproductid,
        "user_id" => $request->orderuserid,
        "productname" => $request->orderproductname,
        "productprize" => $request->orderproductprize,
        "productimage" => $request->orderproductimage,
      ]);


      return redirect("mycart");
     
    }


}
