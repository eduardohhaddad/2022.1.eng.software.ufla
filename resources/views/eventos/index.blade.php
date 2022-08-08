@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Eventos 
                    <a href="{{ route('cadastro-evento') }}" class="btn btn-success"><i class='icon icon-plus text-white'></i>Cadastrar</a>
                </div>

                <div class="card-body">
                    @if( count($eventos) > 0 )
                        <div class="table-responsive">
                            <table class="table table-striped data-tables table-striped text-center">
                                <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th>Data</th>
                                        <th>Meta Venda</th>
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
                                            <td>{{ Helpers::ParaDateTimebr($item->data_referencia) }}</td>
                                            <td>{{ Helpers::ParaInteiro($item->meta_venda_ingressos_comissao) }}</td>
                                            <td>{{ Helpers::ParaFloat($item->comissao_por_ingresso) }}</td>
                                            <td>{{ $item->local }}</td>
                                            <td>@if( $item->ativo ) <i class='icon icon-check text-green'></i> @else <i class='icon icon-close text-red'></i> @endif</td>
                                            <td>
                                                <a class="btn btn-sm btn-dark" href="{{ route('ativar-evento', [$item->id_evento])}}">Alt. Situacao</a>
                                                <a class="btn btn-sm btn-primary" href="{{ route('editar-evento', [$item->id_evento])}}">Editar</a>
                                                <a class="btn btn-sm btn-danger" href="{{ route('deletar-evento', [$item->id_evento])}}">Deletar</a><br>
                                                <a class="btn btn-sm btn-secondary my-3" href="{{ route('listar-comissarios-evento', [$item->id_evento])}}">Comissários <span class="badge badge-dark">{{ count($item->comissarios) }}</span></a>
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