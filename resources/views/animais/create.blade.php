@extends('adminlte::page')

@section('title', 'Novo Animal')

@section('content_header')
    <h1>Novo Animal</h1>
@endsection

@section('content')
<div class="card">
  <div class="card-body">
    <form action="{{ route('animais.store') }}" method="POST" enctype="multipart/form-data">
      @csrf

      @if($errors->any())
          <div class="alert alert-danger">
              <ul class="mb-0">
                  @foreach($errors->all() as $erro)
                      <li>{{ $erro }}</li>
                  @endforeach
              </ul>
          </div>
      @endif

      <div class="form-group">
        <label>Nome *</label>
        <input type="text" name="nome"
               class="form-control @error('nome') is-invalid @enderror"
               value="{{ old('nome') }}">
        @error('nome')
          <span class="invalid-feedback">{{ $message }}</span>
        @enderror
      </div>

      <div class="form-group">
        <label>Espécie *</label>
        <input type="text" name="especie"
               class="form-control @error('especie') is-invalid @enderror"
               value="{{ old('especie') }}">
        @error('especie')
          <span class="invalid-feedback">{{ $message }}</span>
        @enderror
      </div>

      <div class="row">
        <div class="col-md-6 form-group">
          <label>Raça</label>
          <input type="text" name="raca" class="form-control" value="{{ old('raca') }}">
        </div>
        <div class="col-md-6 form-group">
          <label>Idade (anos)</label>
          <input type="number" name="idade" class="form-control"
                 value="{{ old('idade') }}" min="0">
        </div>
      </div>

      <div class="form-group">
        <label>Foto</label>
        <input type="file" name="foto" id="foto" accept="image/*" class="form-control-file">
        <small id="preview-nome" class="text-muted"></small>
      </div>

      <div class="form-group">
        <label>Descrição</label>
        <textarea name="descricao" class="form-control" rows="3">{{ old('descricao') }}</textarea>
      </div>

      <a href="{{ route('animais.index') }}" class="btn btn-secondary">Cancelar</a>
      <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
  </div>
</div>
@endsection

@section('js')
<script>
  document.getElementById('foto').addEventListener('change', function() {
    document.getElementById('preview-nome').textContent = this.files[0]?.name ?? '';
  });
</script>
@endsection
