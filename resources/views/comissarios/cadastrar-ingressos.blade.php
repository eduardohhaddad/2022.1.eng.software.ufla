@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Cadastrar | Comissário</div>

                <div class="card-body">
                    <form method="POST" action="{{ route($rota, [$id]) }}">
                        @csrf
                        <div class="row mb-3">
                            <label for="nome" class="col-md-4 col-form-label text-md-end">Recebidos *</label>

                            <div class="col-md-6">
                                <input id="ingressos_recebidos" type="number" step="1" min="0" class="form-control @error('ingressos_recebidos') is-invalid @enderror" name="ingressos_recebidos" value="{{ $total_recebidos }}" 
                                autocomplete="off" required @if(!$recebido) readonly @endif>

                                @error('ingressos_recebidos')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="nome" class="col-md-4 col-form-label text-md-end">Vendidos *</label>

                            <div class="col-md-6">
                                <input id="ingressos_vendidos" type="number" step="1" min="0" max="{{ $total_recebidos }}" class="form-control @error('ingressos_vendidos') is-invalid @enderror" name="ingressos_vendidos" value="{{ $total_vendidos }}" 
                                autocomplete="off" required @if(!$vendido) readonly @endif>

                                @error('ingressos_vendidos')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Enviar
                                </button>
                                <button type="reset" class="btn btn-secondary">
                                    Resetar
                                </button>
                                <a href="{{ url()->previous() }}" class="btn btn-danger ml-2">Voltar</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
