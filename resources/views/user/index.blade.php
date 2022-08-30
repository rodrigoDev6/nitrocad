@extends('adminlte::page')

@section('title', 'Usuarios')

@section('content_header')
@stop

@section('content')
    <div class="card-body">
        @if (session('statusCadastrado'))
        @endif
        @if (session('statusExluido'))
        @endif
    </div>

    @php
    $nivel = Auth::user()->nivel_id;
    $userSessionId = Auth::user()->id;
    @endphp


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Lista de Usuarios cadastrados</h3>
                    <div class="card-tools">
                        <div class="input-group input-group-sm">
                            <div class="input-group-append">
                                @if ($nivel == 1)
                                    <a href="{{ route('user.create') }}" type="button"
                                        class="btn btn-outline-success mr-2">Cadastrar Usuario</a>
                                @endif
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
                                @if ($nivel == 1)
                                    <th>Ações</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user as $key => $value)
                                <tr>
                                    <td>{{ $value->id }}</td>
                                    <td>{{ $value->name }}</td>
                                    <td>{{ $value->created_at->format('d/m/Y') }}</td>
                                    @if ($value->nivel_id == 1)
                                        <td>Admin</td>
                                    @elseif ($value->nivel_id == 0)
                                        <td>Padrão</td>
                                    @endif
                                    <td>{{ $value->telefone }}</td>
                                    @if ($nivel == 1)
                                        <td>
                                            <a type="button" class="btn btn-outline-danger" data-toggle="modal"
                                                data-target="#ModalDelete{{ $value->id }}" href="">Excluir</a>
                                            {{-- MODAL DE EXCLUIR --}}
                                            <div class="modal fade" id="ModalDelete{{ $value->id }}" tabindex="-1"
                                                role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="ModalLabel">Confirmar</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p class="text-center">
                                                                Confirma a exclusão do registro?
                                                            </p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Fechar</button>
                                                            @if ($value->id != $userSessionId)
                                                                {{ Form::open(['url' => 'user/' . $value->id, 'onsubmit' => 'return ConfirmDelete()']) }}
                                                                {{ Form::hidden('_method', 'DELETE') }}
                                                                {{ Form::submit('Excluir', ['class' => 'btn btn-danger']) }}
                                                                {{ Form::close() }}
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    @endif
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
