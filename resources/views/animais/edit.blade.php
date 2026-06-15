@extends('adminlte::page')

@section('title', 'Editar Animal')

@section('content_header')
    <h1>Editar Animal</h1>
@endsection

@section('content')
<div class="card">
  <div class="card-body">
    <form action="{{ route('animais.update', $animal->id) }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')

      <div class="form-group">
        <label>Nome</label>
        <input type="text" name="nome"
               class="form-control @error('nome') is-invalid @enderror"
               value="{{ old('nome', $animal->nome) }}">
        @error('nome')
          <span class="invalid-feedback">{{ $message }}</span>
        @enderror
      </div>

      <div class="form-group">
        <label>Espécie</label>
        <input type="text" name="especie"
               class="form-control @error('especie') is-invalid @enderror"
               value="{{ old('especie', $animal->especie) }}">
        @error('especie')
          <span class="invalid-feedback">{{ $message }}</span>
        @enderror
      </div>

      <div class="row">
        <div class="col-md-6 form-group">
          <label>Raça</label>
          <input type="text" name="raca" class="form-control"
                 value="{{ old('raca', $animal->raca) }}">
        </div>
        <div class="col-md-6 form-group">
          <label>Idade (anos)</label>
          <input type="number" name="idade" class="form-control"
                 value="{{ old('idade', $animal->idade) }}" min="0">
        </div>
      </div>

      <div class="form-group">
        <label>Foto</label><br>

        @if($animal->foto)
          <img src="{{ asset('storage/'.$animal->foto) }}"
               width="80" height="80" style="object-fit:cover; border-radius:4px; margin-bottom:8px">
          <br>
          <div class="form-check mb-2">
            <input class="form-check-input" type="checkbox" name="remover_foto" id="remover_foto" value="1">
            <label class="form-check-label text-danger" for="remover_foto">
              Remover foto atual
            </label>
          </div>
        @else
          <span class="text-muted d-block mb-2">Sem foto</span>
        @endif

        <div class="custom-file">
          <input type="file" class="custom-file-input" name="foto" id="foto" accept="image/*">
          <label class="custom-file-label" for="foto">Trocar imagem...</label>
        </div>
      </div>

      <div class="form-group">
        <label>Descrição</label>
        <textarea name="descricao" class="form-control" rows="3">{{ old('descricao', $animal->descricao) }}</textarea>
      </div>

      <a href="{{ route('animais.index') }}" class="btn btn-secondary">Cancelar</a>
      <button type="submit" class="btn btn-primary">Atualizar</button>
    </form>
  </div>
</div>
@endsection

@section('js')
<script>
  document.getElementById('foto').addEventListener('change', function() {
    const nome = this.files[0]?.name ?? 'Trocar imagem...';
    document.querySelector('.custom-file-label').textContent = nome;
  });
</script>
@endsection
