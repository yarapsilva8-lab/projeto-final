
@extends('adminlte::page')

@section('title', 'Detalhes do Animal')

@section('content_header')
    <h1>Detalhes do Animal</h1>
@endsection

@section('content')
<div class="card">
  <div class="card-body">

    <div class="row">
      <div class="col-md-3 text-center">
        @if($animal->foto)
          <img src="{{ asset('storage/'.$animal->foto) }}"
               width="150" height="150"
               style="object-fit:cover; border-radius:8px">
        @else
          <div style="width:150px; height:150px; background:#eee; border-radius:8px;
                      display:flex; align-items:center; justify-content:center; margin:auto">
            <i class="fas fa-paw fa-3x text-muted"></i>
          </div>
        @endif
      </div>

      <div class="col-md-9">
        <table class="table table-bordered">
          <tr>
            <th width="150">Nome</th>
            <td>{{ $animal->nome }}</td>
          </tr>
          <tr>
            <th>Espécie</th>
            <td>{{ $animal->especie }}</td>
          </tr>
          <tr>
            <th>Raça</th>
            <td>{{ $animal->raca ?? '-' }}</td>
          </tr>
          <tr>
            <th>Idade</th>
            <td>{{ $animal->idade ? $animal->idade.' anos' : '-' }}</td>
          </tr>
          <tr>
            <th>Descrição</th>
            <td>{{ $animal->descricao ?? '-' }}</td>
          </tr>
          <tr>
            <th>Cadastrado em</th>
            <td>{{ $animal->created_at->format('d/m/Y H:i') }}</td>
          </tr>
        </table>
      </div>
    </div>

    <div class="mt-3">
      <a href="{{ route('animais.index') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left"></i> Voltar
      </a>
      <a href="{{ route('animais.edit', $animal->id) }}" class="btn btn-warning">
        <i class="fas fa-edit"></i> Editar
      </a>
    </div>

  </div>
</div>
@endsection
