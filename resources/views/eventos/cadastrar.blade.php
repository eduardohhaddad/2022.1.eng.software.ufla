@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Cadastrar | Evento</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('cadastrar-evento') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="nome" class="col-md-4 col-form-label text-md-end">Nome *</label>

                            <div class="col-md-6">
                                <input id="nome" type="text" class="form-control @error('nome') is-invalid @enderror" name="nome" value="{{ old('nome') }}" autocomplete="off" required>

                                @error('nome')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="data_referencia" class="col-md-4 col-form-label text-md-end">Data Referencia *</label>

                            <div class="col-md-6">
                                <input id="data_referencia" type="text" class="form-control date-time-picker @error('data_referencia') is-invalid @enderror" name="data_referencia" value="{{ old('data_referencia') }}" autocomplete="off" required>

                                @error('data_referencia')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="meta_venda_ingressos_comissao" class="col-md-4 col-form-label text-md-end">% Meta Venda Ingressos *</label>

                            <div class="col-md-6">
                                <input id="meta_venda_ingressos_comissao" type="number" step="0.1" class="form-control @error('meta_venda_ingressos_comissao') is-invalid @enderror" name="meta_venda_ingressos_comissao" value="{{ old('meta_venda_ingressos_comissao') }}" autocomplete="off" required>

                                @error('meta_venda_ingressos_comissao')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="comissao_por_ingresso" class="col-md-4 col-form-label text-md-end">Comissão/Ingeresso *</label>

                            <div class="col-md-6">
                                <input id="comissao_por_ingresso" type="number" step="0.1" class="form-control @error('comissao_por_ingresso') is-invalid @enderror" name="comissao_por_ingresso" value="{{ old('comissao_por_ingresso') }}" autocomplete="off" required>

                                @error('comissao_por_ingresso')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="local" class="col-md-4 col-form-label text-md-end">Local *</label>

                            <div class="col-md-6">
                                <input id="local" type="text" class="form-control @error('local') is-invalid @enderror" name="local" value="{{ old('local') }}" autocomplete="off" required>

                                @error('local')
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
