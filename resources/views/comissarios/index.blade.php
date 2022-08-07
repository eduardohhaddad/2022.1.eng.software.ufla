@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Comissários</div>

                <div class="card-body">
                    @if( count($comissarios) > 0 )
                        <div class="table-responsive">
                            <table class="table table-striped data-tables table-striped text-center">
                                <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th>Telefone</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($comissarios as $item)
                                        <tr>
                                            <td>{{ $item->nome }}</td>
                                            <td>{{ $item->telefone }}</td>
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