<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NelayanController;
use App\Http\Controllers\IkanController;
use App\Http\Controllers\KapalController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Auth;

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
Auth::routes();
Route::group(['middleware' => 'auth'], function(){
    Route::get('/', [NelayanController::class, 'index'])->name('nelayan.index');
});
Route::get('add', [NelayanController::class, 'create'])->name('nelayan.create');
Route::post('store', [NelayanController::class, 'store'])->name('nelayan.store');
Route::get('edit/{id}', [NelayanController::class, 'edit'])->name('nelayan.edit');
Route::post('update/{id}', [NelayanController::class, 'update'])->name('nelayan.update');
Route::post('delete/{id}', [NelayanController::class, 'delete'])->name('nelayan.delete');
Route::post('softdelete/{id}', [NelayanController::class, 'softDelete'])->name('nelayan.softDelete');
Route::get('restore', [NelayanController::class, 'restore'])->name('nelayan.restore');

Route::get('ikan/add', [IkanController::class, 'create'])->name('ikan.create');
Route::post('ikan/store', [IkanController::class, 'store'])->name('ikan.store');
Route::get('ikan/edit/{id}', [IkanController::class, 'edit'])->name('ikan.edit');
Route::post('ikan/update/{id}', [IkanController::class, 'update'])->name('ikan.update');
Route::post('ikan/delete/{id}', [IkanController::class, 'delete'])->name('ikan.delete');
Route::post('ikan/softdelete/{id}', [IkanController::class, 'softDelete'])->name('ikan.softDelete');
Route::get('ikan/restore', [IkanController::class, 'restore'])->name('ikan.restore');

Route::get('kapal/add', [KapalController::class, 'create'])->name('kapal.create');
Route::post('kapal/store', [KapalController::class, 'store'])->name('kapal.store');
Route::get('kapal/edit/{id}', [KapalController::class, 'edit'])->name('kapal.edit');
Route::post('kapal/update/{id}', [KapalController::class, 'update'])->name('kapal.update');
Route::post('kapal/delete/{id}', [KapalController::class, 'delete'])->name('kapal.delete');
Route::post('kapal/softdelete/{id}', [KapalController::class, 'softDelete'])->name('kapal.softDelete');
Route::get('kapal/restore', [KapalController::class, 'restore'])->name('kapal.restore');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

