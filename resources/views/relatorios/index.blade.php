@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Relatórios 
                    @if(Auth::user()->nivel === 'admin')<a href="{{ route('cadastro-relatorio') }}" class="btn btn-success"><i class='icon icon-plus text-white'></i>Cadastrar</a>@endif
                </div>

                <div class="card-body">
                    @if( count($relatorios) > 0 )
                        <div class="table-responsive">
                            <table class="table table-striped data-tables table-striped text-center">
                                <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th>Situação</th>
                                        <th>Descrição</th>
                                        <th>Ações</th> 
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($relatorios as $item)
                                        <tr>
                                            <td>{{ $item->nome }}</td>
                                            <td>@if( $item->ativo ) <i class='icon icon-check text-green'></i> @else <i class='icon icon-close text-red'></i> @endif</td>
                                            <td>{{ $item->descricao }}</td>
                                            <td>
                                                @if(Auth::user()->nivel === 'admin')
                                                    <a class="btn btn-sm btn-dark" href="{{ route('alterar-situaca-relatorio', [$item->id])}}">Alt. Situação</a>
                                                    <a class="btn btn-sm btn-primary" href="{{ route('editar-relatorio', [$item->id])}}">Editar</a>
                                                @endif
                                                <a class="btn btn-sm btn-warning text-dark" href="{{ route($item->rota, [$item->id])}}">Acessar</a>
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