<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FullCalendarEventMasterController;

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

require __DIR__.'/auth.php';

//fullcalender
Route::get('/fullcalendareventmaster', [FullCalendarEventMasterController::class, 'index']);
Route::post('/fullcalendareventmaster/create',[FullCalendarEventMasterController::class, 'create']);
Route::post('/fullcalendareventmaster/update',[FullCalendarEventMasterController::class, 'update']);
Route::post('/fullcalendareventmaster/delete',[FullCalendarEventMasterController::class, 'destroy']);