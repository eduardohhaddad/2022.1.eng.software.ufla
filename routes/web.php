<?php

use App\Http\Controllers\ComissariosController;
use App\Http\Controllers\EventosController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RelatoriosController;
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

    Route::get('/eventos/comissarios/listar/{id}', [EventosController::class, 'indexComissarios'])->name('listar-comissarios-evento');
    Route::get('/eventos/comissarios/vincular/{id}', [EventosController::class, 'vincularComissarios'])->name('vincular-comissarios-evento');
    Route::post('/eventos/comissarios/salvar-vinculo/{id}', [EventosController::class, 'salvarVinculoComissarios'])->name('salvar-vinculo-comissarios-evento');
    
    
    # Comissários
    Route::get('/comissarios', [ComissariosController::class, 'index'])->name('comissarios');
    Route::get('/cadastro-comissario', [ComissariosController::class, 'create'])->name('cadastro-comissario');
    Route::post('/cadastrar-comissario', [ComissariosController::class, 'store'])->name('cadastrar-comissario');
    Route::get('/editar-comissario/{id}', [ComissariosController::class, 'edit'])->name('editar-comissario');
    Route::post('/alterar-comissario/{id}', [ComissariosController::class, 'update'])->name('alterar-comissario');
    Route::get('/deletar-comissario/{id}', [ComissariosController::class, 'destroy'])->name('deletar-comissario');

    Route::get('/comissarios/eventos/ingressos/recebidos/{id}', [ComissariosController::class, 'ingressosRecebidos'])->name('ingressos-recebidos');
    Route::get('/comissarios/eventos/ingressos/vendidos/{id}', [ComissariosController::class, 'ingressosVendidos'])->name('ingressos-vendidos');

    Route::post('/comissarios/eventos/ingressos/salvar-recebidos/{id}', [ComissariosController::class, 'salvarIngressosRecebidos'])->name('salvar-ingressos-recebidos');
    Route::post('/comissarios/eventos/ingressos/salvar-vendidos/{id}', [ComissariosController::class, 'salvarIngressosVendidos'])->name('salvar-ingressos-vendidos');

    #Relatórios
    Route::get('/relatorios', [RelatoriosController::class, 'index'])->name('relatorios');
    Route::get('/cadastro-relatorios', [RelatoriosController::class, 'create'])->name('cadastro-relatorio');
    Route::post('/cadastrar-relatorio', [RelatoriosController::class, 'store'])->name('cadastrar-relatorio');
    Route::get('/relatorio/alterar-situaca/{id}', [RelatoriosController::class, 'alteraSituacao'])->name('alterar-situaca-relatorio');
    Route::get('/relatorio/editar/{id}', [RelatoriosController::class, 'edit'])->name('editar-relatorio');

    # Relatórios Criados
    Route::get('/relatorio/eventos-periodo', [RelatoriosController::class, 'eventosPorPeriodo'])->name('relatorio-eventos-periodo');

});