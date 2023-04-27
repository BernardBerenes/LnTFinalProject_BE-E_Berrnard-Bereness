<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\AdminController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::resource('/item', ItemController::class);
});

Route::middleware('admin')->group(function(){
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/item/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/item/admin/create', [AdminController::class, 'create']);
    Route::post('/item/admin/store', [AdminController::class, 'store']);
    Route::get('/item/{id}/admin/edit', [AdminController::class, 'edit']);
    Route::put('/item/{id}/admin/update', [AdminController::class, 'update']);
    Route::delete('/item/{id}/admin/delete', [AdminController::class, 'destroy']);
});

require __DIR__.'/auth.php';
