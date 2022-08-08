@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Comissários <a href="{{ route('cadastro-comissario') }}" class="btn btn-success"><i class='icon icon-plus text-white'></i>Cadastrar</a></div>

                <div class="card-body">
                    @if( count($comissarios) > 0 )
                        <div class="table-responsive">
                            <table class="table table-striped data-tables table-striped text-center">
                                <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th>CPF</th>
                                        <th>Cidade/UF</th> 
                                        <th>Telefone</th> 
                                        <th>E-mail</th> 
                                        <th>Ações</th> 
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($comissarios as $item)
                                        <tr>
                                            <td>{{ $item->nome }}</td>
                                            <td>{{ $item->cpf }}</td>
                                            <td>{{ $item->cidade_uf }}</td>
                                            <td>{{ $item->telefone }}</td>
                                            <td>{{ $item->email }}</td>
                                            <td>
                                                <a class="btn btn-sm btn-primary" href="{{ route('editar-comissario', [$item->id_comissario])}}">Editar</a>
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