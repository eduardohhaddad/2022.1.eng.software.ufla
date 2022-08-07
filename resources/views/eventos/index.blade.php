@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Eventos <a href="{{ route('cadastro-evento') }}" class="btn btn-success">Cadastrar</a></div>

                <div class="card-body">
                    @if( count($eventos) > 0 )
                        <div class="table-responsive">
                            <table class="table table-striped data-tables table-striped text-center">
                                <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th>Data</th>
                                        <th>% Meta</th>
                                        <th>R$/Ingresso Vendido</th>
                                        <th>Local</th>
                                        <th>Situacao</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($eventos as $item)
                                        <tr>
                                            <td>{{ $item->nome }}</td>
                                            <td>{{ $item->data_referencia }}</td>
                                            <td>{{ $item->meta_venda_ingressos_comissao }}</td>
                                            <td>{{ $item->comissao_por_ingresso }}</td>
                                            <td>{{ $item->local }}</td>
                                            <td>{{ $item->ativo }}</td>
                                            <td>
                                                <a class="text-red" href="{{ route('ativar-evento', [$item->id_evento])}}">Alt. Situacao</a>
                                                <a class="text-red" href="{{ route('deletar-evento', [$item->id_evento])}}">Deletar</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else 
                        @include('layouts.nenhum-registro')
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection