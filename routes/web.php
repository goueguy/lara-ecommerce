<?php
namespace App;

use App\Http\Livewire\CartComponent;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\ShopComponent;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\DetailsComponent;
use App\Http\Livewire\CheckoutComponent;
use App\Http\Livewire\Admin\AdminDashboard;
use App\Http\Livewire\User\UserDashboardComponent;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',HomeComponent::class);
Route::get('/shop',ShopComponent::class)->name('shop');
Route::get('/cart',CartComponent::class)->name('cart');
Route::get('/checkout',CheckoutComponent::class)->name('checkout');
Route::get('/product/{slug}',DetailsComponent::class)->name('detail-product');


// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

//For Normals Users Or Customers
Route::middleware(['auth:sanctum','verified'])->group(function(){

    Route::get('/user/dashboard',UserDashboardComponent::class)->name('user.dashboard');
});

//For Administrators
Route::middleware(['auth:sanctum','verified','authadmin'])->group(function(){

    Route::get('/admin/dashboard',AdminDashboard::class)->name('admin.dashboard');

});