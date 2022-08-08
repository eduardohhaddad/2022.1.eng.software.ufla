@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Cadastrar | Comissário</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('alterar-comissario', [$comissario->id_comissario]) }}">
                        @csrf
                        <div class="row mb-3">
                            <label for="nome" class="col-md-4 col-form-label text-md-end">Nome *</label>

                            <div class="col-md-6">
                                <input id="nome" type="text" class="form-control @error('nome') is-invalid @enderror" name="nome" value="{{ $comissario->nome }}" autocomplete="off" required>

                                @error('nome')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="cpf" class="col-md-4 col-form-label text-md-end">CPF *</label>

                            <div class="col-md-6">
                                <input id="cpf" type="text" pattern="\d{3}\.\d{3}\.\d{3}-\d{2}" title="Digite o CPF no formato nnn.nnn.nnn-nn" class="form-control @error('cpf') is-invalid @enderror" name="cpf" value="{{ $comissario->cpf }}" autocomplete="off" required>

                                @error('cpf')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="telefone" class="col-md-4 col-form-label text-md-end">Contato *</label>

                            <div class="col-md-6">
                                <input id="telefone" type="text" pattern="[0-9]{2}[0-9]{5}[0-9]{4}" minlength="11" maxlength="11" class="form-control @error('telefone') is-invalid @enderror" name="telefone" value="{{ $comissario->telefone }}" autocomplete="off" required>

                                @error('telefone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">E-mail *</label>

                            <div class="col-md-6">
                                <input id="email" type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $comissario->email }}" autocomplete="off" required>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="cidade_uf" class="col-md-4 col-form-label text-md-end">Cidade/UF *</label>

                            <div class="col-md-6">
                                <input id="cidade_uf" type="text" class="form-control @error('cidade_uf') is-invalid @enderror" name="cidade_uf" value="{{ $comissario->cidade_uf }}" autocomplete="off" required>

                                @error('cidade_uf')
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
