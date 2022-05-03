<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FullCalendarController;


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
})->middleware(['auth'])->name('dashboard');

Route::get('rooms', function () {
    return view('rooms');
});

require __DIR__.'/auth.php';

Route::get('fullcalendar/{id}', [FullCalendarController::class, 'index'])->middleware(['auth']);

Route::post('fullcalendar/action', [FullCalendarController::class, 'action']); 
