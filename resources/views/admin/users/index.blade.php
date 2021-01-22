@extends('adminlte::page')

@section('title', 'Usuários')

@section('content_header')
    <a href="{{ route('users.create') }}" class="btn btn-sm btn-success">Novo Usuário</a>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>Usuários</h5>
        </div>
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>E-mail</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php dd($users); ?>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                            <a href="{{ route('users.edit', ['user' => $user->id]) }}" class="btn btn-sm btn-info">Editar</a>
                            <form class="d-inline" method="POST" action="{{ route('users.destroy', ['user' => $user->id]) }}"  onsubmit="return confirm('Tem certeza que deseja')>
                                @method('DELETE')
                                @csrf

                                <button class='btn btn-sm btn-danger">Excluir</button>
                            </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>

    {{-- Paginação // Apresenta as setas para mudança de páginas --}}
    {{ $users->links() }}
@endsection

