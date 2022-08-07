<?php

use App\Http\Controllers\ComissariosController;
use App\Http\Controllers\EventosController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});


Route::middleware(['auth'])->group(function () {

    Route::get('/home', [HomeController::class, 'index'])->name('home');
    
    Route::get('/eventos', [EventosController::class, 'index'])->name('eventos');
    
    # Eventos
    Route::get('/cadastro-evento', [EventosController::class, 'create'])->name('cadastro-evento');
    Route::post('/cadastrar-evento', [EventosController::class, 'store'])->name('cadastrar-evento');
    Route::get('/deletar-evento/{id}', [EventosController::class, 'destroy'])->name('deletar-evento');
    Route::get('/ativar-evento/{id}', [EventosController::class, 'ativaEvento'])->name('ativar-evento');
    
    # Comissários
    Route::get('/comissarios', [ComissariosController::class, 'index'])->name('comissarios');


});