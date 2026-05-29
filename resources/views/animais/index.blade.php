@extends('adminlte::page')

@section('title', 'Animais')

@section('content_header')
    <h1>Animais</h1>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('animais.create') }}" class="btn btn-primary btn-sm">
                <i class="fas fa-plus"></i> Novo Animal
            </a>
        </div>
        <div class="card-body table-responsive">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Foto</th>
                        <th>Nome</th>
                        <th>Espécie</th>
                        <th>Raça</th>
                        <th>Idade</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($animais as $animal)
                    <tr>
                        <td>
                            @if($animal->foto)
                                <img src="{{ asset('storage/'.$animal->foto) }}"
                                     width="60" height="60"
                                     style="object-fit:cover; border-radius:4px">
                            @else
                                <span class="text-muted">Sem foto</span>
                            @endif
                        </td>
                        <td>{{ $animal->nome }}</td>
                        <td>{{ $animal->especie }}</td>
                        <td>{{ $animal->raca ?? '-' }}</td>
                        <td>{{ $animal->idade ? $animal->idade.' anos' : '-' }}</td>
                        <td>
                            <a href="{{ route('animais.edit', $animal->id) }}"
                               class="btn btn-sm btn-warning">
                                <i class="fas fa-edit"></i> Editar
                            </a>
                            <a href="{{ route('animais.show', $animal->id) }}" class="btn btn-sm btn-info">
                                 <i class="fas fa-eye"></i> Ver
                            </a>

                            <form action="{{ route('animais.destroy', $animal) }}"
                                  method="POST" class="d-inline"
                                  onsubmit="return confirm('Remover este animal?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">
                                    <i class="fas fa-trash"></i> Excluir
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted">
                                Nenhum animal cadastrado ainda.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            {{ $animais->links() }}
        </div>
    </div>
@endsection
