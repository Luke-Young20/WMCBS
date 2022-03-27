<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FullCalendarEventMasterController;
use App\Http\Controllers\FullCalendarEventMasterController1;
use App\Http\Controllers\MainController;


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

//fullcalender
Route::get('fullcalender', [FullCalenderController::class, 'index']);
Route::post('fullcalenderAjax', [FullCalenderController::class, 'ajax']);

Route::get('/fullcalendareventmaster', [FullCalendarEventMasterController::class, 'index']);
Route::post('/fullcalendareventmaster/create',[FullCalendarEventMasterController::class, 'create']);
Route::post('/fullcalendareventmaster/update',[FullCalendarEventMasterController::class, 'update']);
Route::post('/fullcalendareventmaster/delete',[FullCalendarEventMasterController::class, 'destroy']);

Route::get('/main', [MainController::class, 'index']);
Route::post('/main/checklogin', [MainController::class, 'checklogin']);
Route::get('main/successlogin', [MainController::class, 'successlogin']);
Route::get('main/logout', [MainController::class, 'logout']);
