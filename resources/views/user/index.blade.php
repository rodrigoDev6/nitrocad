@extends('adminlte::page')

@section('title', 'Usuarios')

@section('content_header')
@stop

@section('content')
    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
    </div>


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Lista de Usuarios cadastrados</h3>
                    <div class="card-tools">
                        <div class="input-group input-group-sm">
                            <div class="input-group-append">
                                <a href="{{ route('user.create') }}" type="button"
                                    class="btn btn-outline-success mr-2">Cadastrar Usuario</a>
                            </div>
                            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="card-body table-responsive p-0" style="height: 300px;">
                    <table class="table table-head-fixed text-nowrap">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nome</th>
                                <th>Data de Cadastro</th>
                                <th>Perfil</th>
                                <th>Telefone</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user as $key => $value)
                                <tr>
                                    <td>{{ $value->id }}</td>
                                    <td>{{ $value->name }}</td>
                                    <td>{{ $value->created_at->format('d/m/Y') }}</td>
                                    @if ($value->permissao == 1)
                                        <td>Admin</td>
                                    @elseif ($value->permissao == 0)
                                        <td>Usuario Padrao</td>
                                    @endif
                                    <td>{{ $value->telefone }}</td>
                                    <td>
                                        <a type="button" class="btn btn-outline-primary">Editar</a>
                                        <a type="button" class="btn btn-outline-danger">Excluir</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>

        </div>
    </div>
@stop

@section('css')
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
