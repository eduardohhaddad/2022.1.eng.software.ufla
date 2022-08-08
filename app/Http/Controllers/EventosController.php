<?php

namespace App\Http\Controllers;

use App\Models\Comissario;
use App\Models\ComissariosEventos;
use App\Models\Evento;
use Exception;
use Illuminate\Console\Scheduling\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EventosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $eventos = Evento::with('comissarios')->get();

        return view('eventos.index', compact('eventos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('eventos.cadastrar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            DB::transaction(function() use ($request) {
                $novo_evento = new Evento();
                $novo_evento->nome = $request->input('nome');
                $novo_evento->data_referencia = $request->input('data_referencia');
                $novo_evento->meta_venda_ingressos_comissao = $request->input('meta_venda_ingressos_comissao');
                $novo_evento->comissao_por_ingresso = $request->input('comissao_por_ingresso');
                $novo_evento->local = $request->input('local');

                $novo_evento->save();
            });
        }
        catch(Exception $e){
            dd($e);
        }

        return redirect(route('eventos'));
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $evento = Evento::find($id);
        return view('eventos.editar', compact('evento'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            DB::transaction(function() use ($request, $id) {
                $evento = Evento::find($id);
                $evento->nome = $request->input('nome');
                $evento->data_referencia = $request->input('data_referencia');
                $evento->meta_venda_ingressos_comissao = $request->input('meta_venda_ingressos_comissao');
                $evento->comissao_por_ingresso = $request->input('comissao_por_ingresso');
                $evento->local = $request->input('local');

                $evento->save();
            });
        }
        catch(Exception $e){
            dd($e);
        }

        return redirect(route('eventos'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            DB::transaction(function() use ($id) {
                Evento::find($id)->delete();
            });
        }
        catch(Exception $e){
            dd($e);
        }

        return redirect(route('eventos'));
        
    }

    public function ativaEvento($id)
    {
        try{
            $evento = Evento::find($id);
            
            DB::transaction(function() use ($id,$evento) {
                Evento::find($id)->update(['ativo' => !$evento->ativo]);
            });
        }
        catch(Exception $e){
            dd($e);
        }
        return redirect(route('eventos'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexComissarios($id)
    {
        $evento = Evento::where('id_evento', $id)->with('comissarios')->first();
        //dd($evento);
        return view('eventos.comissarios-listar', compact('evento'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function vincularComissarios($id)
    {
        $evento = Evento::where('id_evento', $id)->with('comissarios')->first();
        $comissarios = Comissario::all();
        return view('eventos.comissarios-cadastrar', compact('evento', 'comissarios'));
    }


    public function salvarVinculoComissarios(Request $request, $id)
    {

        try{
            DB::transaction(function() use ($request, $id) {
                
                foreach($request->input('comissarios') as $id_comissario) {
                    $novo = new ComissariosEventos();
                    $novo->id_evento = $id;
                    $novo->id_comissario = $id_comissario;
                    $novo->save();
                }
            });
        }
        catch(Exception $e){
            dd($e);
        }

        return redirect(route('eventos'));
    }
}
