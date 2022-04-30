<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Dashbord;
// use App\Http\Controllers\EmailController;
use App\Http\Controllers\HodimlarController;
use App\Http\Controllers\OmborxonaController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SotuvOfisi;
use App\Http\Controllers\sklad;
use App\Http\Controllers\Sotuvlar;
use App\Models\Sotuv_Royxati;
use App\Http\Controllers\QarzController;
use App\Http\Controllers\ShaxsiyQarzController;
use App\Http\Controllers\TaminotchiCantroller;
use App\Models\ShaxsiyQarz;
use App\Http\Controllers\Hodims;
// use App\Models\Product;
// use App\Models\Category;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('index',function(){
    return view('admin.index');
})->name('admin.index');
// dashbord
Route::get('dashbord',[Dashbord::class,"index"])->name('dashbord');
// Kategoriya route
Route::resource('category',CategoryController::class)->names('category');
Route::resource('product',ProductController::class)->names('product');
// Sotuv
Route::get('shopping',[SotuvOfisi::class,'index'])->name('shop-index');
Route::post('productsearch',[SotuvOfisi::class,'productsearch'])->name('productsearch');
Route::post('create_db',[SotuvOfisi::class,'create_vaqtincha'])->name('create_vaqtincha');
Route::post('hisoblash',[SotuvOfisi::class,'hisoblash'])->name('hisoblash');
Route::post('fullhisob',[SotuvOfisi::class,'fullHisob'])->name('fullhisob');

Route::get('product-id',[SotuvOfisi::class,'productid'])->name('product-id');
Route::get('show-cate',[SotuvOfisi::class,'showcate'])->name('shop-show-cate');
Route::post('sotish',[SotuvOfisi::class,'sotish'])->name('sotish');
Route::get('tozalash',[Sotuvofisi::class,'tozalash'])->name('tozalash');

// sklad
Route::get('omborxona',[sklad::class,'index'])->name('ombor');
Route::post('search',[sklad::class,'show'])->name('search');
Route::post('search' , [OmborxonaController::class , 'index'])->name('searchombor');
// users
Route::resource('users',HodimlarController::class)->names('users');
// sotuv royxati
Route::get('sotuv-royxat',[Sotuvlar::class,'index'])->name('sotuvlar')->middleware('role');
Route::get('sotuv-edit/{id}',[Sotuvlar::class,'edit'])->name('sotuvedit')->middleware('role');
Route::post('update/{id}',[Sotuvlar::class,'update'])->name('sotuvupdate')->middleware('role');
Route::delete('delete/{id}',[Sotuvlar::class,'destroy'])->name('sotuvdestroy')->middleware('role');

// email
Route::resource('qarz',QarzController::class)->names('qarz')->middleware('role');
// taminot
Route::resource('taminot',TaminotchiCantroller::class)->names('taminot')->middleware('role');
// shaxsiy qarz
Route::resource('shaxsiyqarz',ShaxsiyQarzController::class)->names('shaxsiyqarz');
// hodimlar
Route::get('hodim',[Hodims::class,'index'])->name('hodim.index');
Route::get('hodimcreate',[Hodims::class,'create'])->name('hodim.create');
Route::post('hodimstore',[Hodims::class,'store'])->name('hodim.store');
Route::get('hodimedit/{id}',[Hodims::class,'edit'])->name('hodim.edit');
Route::delete('hodimdelete/{id}',[Hodims::class,'destroy'])->name('hodim.destroy');
Route::get('hodimshow',[Hodims::class,'show'])->name('hodim.show');
Route::post('hodimsavdo',[Hodims::class,'savdo'])->name('hodim.savdo');
// hodim savdo
Route::POST('/savdodelete',[Hodims::class,'savdodelete'])->name('hodimsavdo.delete');
Route::get('showsavdo',[Hodims::class,'showsavdo'])->name('show.savdo');
