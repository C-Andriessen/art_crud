<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArtController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
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

Route::get('', [HomeController::class, 'index'])->name('index');
Route::get('{art}/detail', [ArtController::class, 'show'])->name('show');

Route::group(['as' => 'admin.', 'prefix' => 'admin', 'middleware' => ['auth']], function ()
{
    Route::get('', [AdminController::class, 'index'])->name('index');
    Route::group(['as' => 'profile.', 'prefix' => 'profile',], function ()
    {
        Route::get('', [ProfileController::class, 'edit'])->name('edit');
        Route::patch('', [ProfileController::class, 'update'])->name('update');
        Route::delete('', [ProfileController::class, 'destroy'])->name('destroy');
    });
    Route::group(['as' => 'art.', 'prefix' => 'kunst'], function ()
    {
        Route::get('', [ArtController::class, 'index'])->name('index');
        Route::get('create', [ArtController::class, 'create'])->name('create');
        Route::get('search', [ArtController::class, 'search'])->name('search');
        Route::post('store', [ArtController::class, 'store'])->name('store');
        Route::group(['prefix' => '{art}'], function ()
        {
            Route::get('edit', [ArtController::class, 'edit'])->name('edit');
            Route::put('update', [ArtController::class, 'update'])->name('update');
            Route::delete('destroy', [ArtController::class, 'destroy'])->name('destroy');
        });
    });
});

require __DIR__ . '/auth.php';
