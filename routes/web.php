<?php

use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



Route::get('/', [Controller::class, 'trangchu']);
Route::get('/login', [Controller::class, 'login'])->name('giaodien.login');
Route::get('index1111', [Controller::class, 'index']);
Route::get('123cd', [Controller::class, 'abc']);


// dang ki dang nhap
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::delete('/products/image/{id}', [ProductsController::class, 'deleteImage'])->name('products.deleteImage');
    Route::resource('products', ProductsController::class);
    Route::resource('categorys', CategoryController::class);
});


require __DIR__.'/auth.php';
