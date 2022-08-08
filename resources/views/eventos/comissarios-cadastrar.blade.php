@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Vincular Comissários ao Evento: {{ $evento->nome }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('salvar-vinculo-comissarios-evento', [$evento->id_evento]) }}">
                        @csrf
                        <div class="row mb-3">
                            <label for="nome" class="col-md-4 col-form-label text-md-end">Comissários *</label>

                            <div class="col-md-6">
                                <select class="select2" id="comissarios" name="comissarios[]" multiple="multiple" required >
                                    @foreach($comissarios as $chave => $item)
                                        <option value="{{$item->id_comissario}}">{{$item->nome}} / {{$item->cpf}}</option>
                                    @endforeach
                                </select>

                                @error('nome')
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
