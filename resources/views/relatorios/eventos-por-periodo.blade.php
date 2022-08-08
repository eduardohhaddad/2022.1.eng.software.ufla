@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Relatório: {{ $relatorio->nome }}</div>

                <div class="card-body">
                    @if( count($dados) > 0 )
                        <div class="row">
                            <div class="col-md-3 m-2">
                                <label for="data_referencia">Inicio: *</label>
                                <input class='form-control' type="date" name="data_referencia" id="data_inicial" >
                            </div>
                            <div class="col-md-3 m-2">
                                <label for="data_referencia">FIm: *</label>
                                <input class='form-control' type="date" name="data_referencia" id="data_final" >
                            </div>
                            <div class="col-md-3">
                                <a href="#" class="btn-fab btn-fab-sm btn-primary r-5 mt-4" id='filtro'><i class="icon-filter p-0"></i></a>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-striped text-center" id="tabela_eventos_por_periodo">
                                <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th>Data</th>
                                        <th>Horário</th>
                                        <th>Meta</th>
                                        <th>Comissão/Ingresso</th> 
                                        <th>Local</th> 
                                        <th>Situacao</th> 
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($dados as $item)
                                        <tr>
                                            <td>{{ $item->nome }}</td>
                                            <td>{{ $item->data_referencia }}</td>
                                            <td>{{ Helpers::ParaTime($item->data_referencia) }}</td>
                                            <td>{{ Helpers::ParaInteiro($item->meta_venda_ingressos_comissao) }}</td>
                                            <td>R$ {{ Helpers::ParaDinheiro($item->comissao_por_ingresso) }}</td>
                                            <td>{{ $item->local }}</td>
                                            <td>@if( $item->ativo ) <i class='icon icon-check text-green'></i> @else <i class='icon icon-close text-red'></i> @endif</td>
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

@section('js')
    <script>
        var url = `{{ route('dados-eventos-por-periodo') }}`
        $(function () {
            const table = $('#tabela_eventos_por_periodo').DataTable({
                autoWidth:false,
                "order": [[ 0, 'desc' ]],

                colunms: [
                    {Data: 'Nome'},
                    {Data: 'Data'},
                    {Data: 'Horario'},
                    {Data: 'Meta'},
                    {Data: 'ValorIngresso'},
                    {Data: 'Local'},
                    {Data: 'Situacao'},
                ],
                columnDefs: [
                    {
                        "targets": [1],
                        "type": 'date-br',
                        "render": function(data,type,full,meta) {
                            return new Date(data).toLocaleDateString('pt-BR')
                        }
                    }
                ],

                dom: 'Bfrtip',
                buttons: [
                    'excel'
                ]
            });});
    </script>
@endsection