<?php

use App\Http\Controllers\ComissariosController;
use App\Http\Controllers\EventosController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
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

Route::get('/logout', function () {
    Auth::logout();
    session()->flush();
    return Redirect::to('login');
})->middleware('auth');


Route::middleware(['auth'])->group(function () {

    Route::get('/home', [HomeController::class, 'index'])->name('home');
    
    # Eventos
    Route::get('/eventos', [EventosController::class, 'index'])->name('eventos');
    Route::get('/cadastro-evento', [EventosController::class, 'create'])->name('cadastro-evento');
    Route::post('/cadastrar-evento', [EventosController::class, 'store'])->name('cadastrar-evento');
    Route::get('/deletar-evento/{id}', [EventosController::class, 'destroy'])->name('deletar-evento');
    Route::get('/ativar-evento/{id}', [EventosController::class, 'ativaEvento'])->name('ativar-evento');
    Route::get('/editar-evento/{id}', [EventosController::class, 'edit'])->name('editar-evento');
    Route::post('/alterar-evento/{id}', [EventosController::class, 'update'])->name('alterar-evento');
    
    # Comissários
    Route::get('/comissarios', [ComissariosController::class, 'index'])->name('comissarios');
    Route::get('/cadastro-comissario', [ComissariosController::class, 'create'])->name('cadastro-comissario');
    Route::post('/cadastrar-comissario', [ComissariosController::class, 'store'])->name('cadastrar-comissario');
    Route::get('/editar-comissario/{id}', [ComissariosController::class, 'edit'])->name('editar-comissario');
    Route::post('/alterar-comissario/{id}', [ComissariosController::class, 'update'])->name('alterar-comissario');
    Route::get('/deletar-comissario/{id}', [ComissariosController::class, 'destroy'])->name('deletar-comissario');

});