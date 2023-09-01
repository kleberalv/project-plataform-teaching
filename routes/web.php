<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CursosController;
use App\Http\Controllers\AlunosController;

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

Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);

Route::middleware(['auth'])->group(function () {

    Route::get('admin', function () {
        return view('admin');
    })->name('admin');

    Route::get('admin/cursos', [CursosController::class, 'index'])->name('admin.cursos');
    
    Route::get('admin/alunos', [AlunosController::class, 'index'])->name('admin.alunos');

    Route::get('admin/matriculas', function () {
        return view('matriculas');
    })->name('admin.matriculas');

    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
});