<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonalRecordController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/ranking/{movementId}', [PersonalRecordController::class, 'getRanking']);
Route::post('/ranking/personal-records', [PersonalRecordController::class, 'store'])->name('ranking.store');
Route::get('/movements', [PersonalRecordController::class, 'index'])->name('moviments.index');;
Route::get('/ranking-top-10', [PersonalRecordController::class, 'indexRanking'])->name('ranking.index');;
