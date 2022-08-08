@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Comissários Evento: {{ $evento->nome }} 
                    <a href="{{ route('vincular-comissarios-evento', [$evento->id_evento]) }}" class="btn btn-success"><i class='icon icon-plus text-white'></i>Vincular</a>
                    <a href="{{ url()->previous() }}" class="btn btn-danger ml-2">Voltar</a>
                </div>

                <div class="card-body">
                    @if( !is_null($evento) && count($evento->comissarios) > 0 )
                        <div class="table-responsive">
                            <table class="table table-striped data-tables table-striped text-center">
                                <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th>CPF</th>
                                        <th>Cidade/UF</th>
                                        <th>Telefone</th>
                                        <th>E-mail</th>
                                        <th>Ing. Rec.</th>
                                        <th>Ing. Ven.</th>
                                        <th>Saldo</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($evento->comissarios as $item)
                                        <tr>
                                            <td>{{ $item->comissario->nome }}</td>
                                            <td>{{ $item->comissario->cpf }}</td>
                                            <td>{{ $item->comissario->cidade_uf }}</td>
                                            <td>{{ $item->comissario->telefone }}</td>
                                            <td>{{ $item->comissario->email }}</td>
                                            <td>{{ $item->ingressos_recebidos }}</td>
                                            <td>{{ $item->ingressos_vendidos }}<br><small>{{ $item->ingressos_recebidos> 0 ? ($item->ingressos_vendidos * 100 / $item->ingressos_recebidos) : 0 }}%</small></td>
                                            <td>{{ Helpers::ParaDinheiro($item->ingressos_vendidos * $evento->comissao_por_ingresso) }}</td>
                                            <td>
                                                <a class="btn btn-sm btn-primary" href="{{ route('ingressos-recebidos', [$item->id_relacao_comissario_evento])}}">Ing. Recebidos</a>
                                                <a class="btn btn-sm btn-danger" href="{{ route('ingressos-vendidos', [$item->id_relacao_comissario_evento])}}">Ing. Vendidos</a>
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