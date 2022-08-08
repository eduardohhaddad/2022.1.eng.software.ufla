<?php

namespace App\Http\Controllers;

use App\Models\Comissario;
use App\Models\ComissariosEventos;
use App\Models\ComissariosIngressos;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ComissariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comissarios = Comissario::with('eventos')->get();
        return view('comissarios.index', compact('comissarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('comissarios.cadastrar');
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
                $novo_comissario = new Comissario();
                $novo_comissario->nome = $request->input('nome');
                $novo_comissario->cpf = $request->input('cpf');
                $novo_comissario->telefone = $request->input('telefone');
                $novo_comissario->email = $request->input('email');
                $novo_comissario->cidade_uf = $request->input('cidade_uf');

                $novo_comissario->save();
            });
        }
        catch(Exception $e){
            dd($e);
        }

        return redirect(route('comissarios'));
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
        $comissario = Comissario::find($id);
        return view('comissarios.editar', compact('comissario'));
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
                $novo_comissario = Comissario::find($id);
                $novo_comissario->nome = $request->input('nome');
                $novo_comissario->cpf = $request->input('cpf');
                $novo_comissario->telefone = $request->input('telefone');
                $novo_comissario->email = $request->input('email');
                $novo_comissario->cidade_uf = $request->input('cidade_uf');

                $novo_comissario->save();
            });
        }
        catch(Exception $e){
            dd($e);
        }

        return redirect(route('comissarios'));
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

    public function ingressosRecebidos($id)
    {
        $ingressos = ComissariosIngressos::where('id_relacao_comissario_evento', $id)->first();
        $total_recebidos = isset($ingressos->ingressos_recebidos) ? $ingressos->ingressos_recebidos : 0;
        $total_vendidos = isset($ingressos->ingressos_recebidos) ? $ingressos->ingressos_vendidos : 0;
        $recebido = true;
        $vendido = false;
        $rota = "salvar-ingressos-recebidos";
        return view('comissarios.cadastrar-ingressos', compact('id', 'total_recebidos', 'total_vendidos', 'ingressos', 'recebido', 'vendido', 'rota'));
    }

    public function ingressosVendidos($id)
    {
        $ingressos = ComissariosIngressos::where('id_relacao_comissario_evento', $id)->first();
        $total_recebidos = isset($ingressos->ingressos_recebidos) ? $ingressos->ingressos_recebidos : 0;
        $total_vendidos = isset($ingressos->ingressos_recebidos) ? $ingressos->ingressos_vendidos : 0;
        $recebido = false;
        $vendido = true;
        $rota = "salvar-ingressos-recebidos";
        return view('comissarios.cadastrar-ingressos', compact('id', 'total_recebidos', 'total_vendidos', 'ingressos', 'recebido', 'vendido', 'rota'));
    }

    public function salvarIngressosRecebidos(Request $request, $id)
    {
        try{

            $evento = ComissariosEventos::where('id_relacao_comissario_evento', $id)->first();

            DB::transaction(function() use ($request, $id) {
                
                $ingressos = ComissariosIngressos::where('id_relacao_comissario_evento', $id)->first();
                
                if( is_null($ingressos))
                    $ingressos = new ComissariosIngressos();

                $ingressos->id_relacao_comissario_evento = $id;
                $ingressos->ingressos_recebidos = $request->input('ingressos_recebidos');
                $ingressos->ingressos_vendidos = $request->input('ingressos_vendidos');
                $ingressos->total = 0;
                $ingressos->save();
            });
        }
        catch(Exception $e){
            dd($e);
        }

        return redirect(route('listar-comissarios-evento', [$evento->id_evento]));
    }

    public function salvarIngressosVendidos(Request $request, $id)
    {
        dd($request, $id);
    }
}
