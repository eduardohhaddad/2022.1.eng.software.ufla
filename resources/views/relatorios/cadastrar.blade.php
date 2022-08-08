@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Cadastrar | Relatório</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('cadastrar-relatorio') }}">
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
                            <label for="descricao" class="col-md-4 col-form-label text-md-end">Descrição *</label>

                            <div class="col-md-6">
                                <textarea rows="4" cols="50" id="descricao" type="textarea" class="form-control @error('descricao') is-invalid @enderror" name="descricao" autocomplete="off" required>{{ old('descricao') }}</textarea>

                                @error('descricao')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="rota" class="col-md-4 col-form-label text-md-end">Rota *</label>

                            <div class="col-md-6">
                                <input id="rota" type="text" class="form-control @error('rota') is-invalid @enderror" name="rota" value="{{ old('rota') }}" autocomplete="off" required>

                                @error('rota')
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
