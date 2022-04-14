<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuperheroController;


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

Route::get('/superheros/create', [SuperheroController::class, 'create'])->name('superheros.create');
Route::post('/superheros/store', [SuperheroController::class, 'store'])->name('superheros.store');
