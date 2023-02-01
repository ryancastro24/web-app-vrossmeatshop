<?php

use App\Http\Controllers\APIController;
use App\Http\Controllers\ProfileController;
use App\Models\Masteruser;
use App\Models\Order;
use App\Models\User;
use App\Providers\AppServiceProvider;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::post('/orderdata',[APIController::class,'savedata'])->name('savedata');


Route::get('/', function () {
    return view('welcome');
})->name('index');




Route::get('/dashboard',function (){
    $data = Masteruser::join('announcements', "masterusers.id", "announcements.user_id")
    ->select("*")
    ->get();
    return view("dashboard",compact("data"));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/announcement', function () {
    return view('announcement');
})->middleware(['auth', 'verified'])->name('announcement');

Route::get('/mycart', function () {
    $data = Order::latest()->get();
    return view('mycart',compact('data'));
})->middleware(['auth', 'verified'])->name('mycart');



Route::get('/products', function () {
    return view('products');
})->middleware(['auth', 'verified'])->name('products');

Route::get('/access_control', function () {
    $data = User::join('masterusers', "users.masteruser_id", "masterusers.id")->select("*", 'users.id as my_id')->orderBy('masterusers.id', 'ASC')->get();
    return view('accessControl',compact('data'));
})->middleware(['auth', 'verified'])->name('accessControl');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
