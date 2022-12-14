<?php

use App\Http\Controllers\ArsipController;
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

// Route::get('/', function () {
//     return view('welcome');
// });  
Route::get('/', fn () => redirect('/arsip'));

Route::get('/arsip/downlaod/{id}', [ArsipController::class, 'download'])->name('arsip.download');
Route::resource('arsip', ArsipController::class);
Route::get('/about', function () {
    return view('about');
})->name('about');
