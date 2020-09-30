<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BasicController;
use App\Http\Controllers\RestController;

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

Route::prefix("user")->group(function(){
    Route::get("age/{age?}", [BasicController::class, "getUserAge"])->middleware("verifyAge");
    Route::get("name/{name}", [BasicController::class, "getUserName"]);
});

Route::resource('phrases', RestController::class)->only([
    'index', 'show'
]);;