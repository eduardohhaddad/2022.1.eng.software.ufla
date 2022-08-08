<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use App\Models\Relatorios;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RelatoriosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $relatorios = Relatorios::all();
        return view('relatorios.index', compact('relatorios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('relatorios.cadastrar');
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
                $relatorio = new Relatorios();
                $relatorio->nome = $request->input('nome');
                $relatorio->descricao = $request->input('descricao');
                $relatorio->rota = $request->input('rota');
                $relatorio->save();
            });
        }
        catch(Exception $e){
            dd($e);
        }

        return redirect(route('relatorios'));
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function alteraSituacao($id)
    {
        try{
            $evento = Relatorios::find($id);
            
            DB::transaction(function() use ($id,$evento) {
                Relatorios::find($id)->update(['ativo' => !$evento->ativo]);
            });
        }
        catch(Exception $e){
            dd($e);
        }
        return redirect(route('eventos'));
    }


    #################################################################################################
    #################################################################################################
    #################################################################################################
    #################################################################################################
    public function eventosPorPeriodo($id_relatorio)
    {
        $relatorio = Relatorios::find($id_relatorio);
        $data_inicial = date('Y-01-01 00:00:00');
        $data_final = date('Y-12-31 23:59:59');

        $dados = $this->dadosEventosPorPeriodo($data_inicial, $data_final, 'controlador');

        return view('relatorios.eventos-por-periodo', compact('relatorio', 'data_inicial', 'data_final', 'dados'));
    }

    protected function dadosEventosPorPeriodo($data_inicial, $data_final, $tipo)
    {
        $dados = Evento::whereBetween('data_referencia', [$data_inicial, $data_final])->get();

        if($tipo === 'controlador')
            return $dados;
        else
            return response($dados);
    }
}
