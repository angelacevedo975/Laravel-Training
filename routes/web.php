<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

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
    $mytime = Carbon\Carbon::now();
    return view('home',["date"=>$mytime->toDateTimeString()]);
    
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::prefix('login')->group(function () {
    Route::get('{social}', [LoginController::class, 'redirectToProvider'])->middleware('socialite');
    Route::get('{social}/callback', [LoginController::class, 'handleProviderCallback']);
});