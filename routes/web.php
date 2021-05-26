<?php

use App\Http\Controllers\PublicationController;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReportController;
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

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('faculties', FacultyController::class);

Route::resource('publications', PublicationController::class)->middleware('auth');

Route::get('reports', [ReportController::class, 'create'])->middleware(('auth'))->name('report');

Route::get('export', [ReportController::class, 'export'])->middleware(('auth'))->name('export');
