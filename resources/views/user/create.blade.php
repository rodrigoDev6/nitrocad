@extends('adminlte::page')

@section('title', 'Create User')

@section('content_header')
@stop

@section('content')
    <div class="container row pt-4 justify-content-center" style="margin: 0 auto;">

        <div class="card card-primary col-6 p-0">
            <div class="card-header">
                <h3 class="card-title">Cadastrar usuario</h3>
            </div>

            <form id="create" method="POST" action="{{ route('user.store') }}">
                @csrf
                <div class="card-body row">
                    <div class="form-group col-6">
                        <label for="username">Nome</label>
                        <input type="text" class="form-control" id="username" name="name"
                            placeholder="Nome Completo">
                    </div>

                    <div class="form-group col-6">
                        <label for="phone">Telefone</label>
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Telefone">

                    </div>

                    <div class="form-group col-6">
                        <label for="email">E-mail</label>
                        <input type="email" class="form-control" id="email" name="email"
                            placeholder="Digite seu melho E-mail">
                    </div>
                    <div class="form-group col-6">
                        <label for="password">Senha</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                    </div>
                    <div class="form-group col-12">
                        <label for="permission">Permissão</label>
                        <select class="form-control" name="permission">
                            <option value="1">Administrador</option>
                            <option value="0">Usuario Padrão</option>
                        </select>
                    </div>

                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Criar</button>
                    <a href="{{ route('user.index') }}" type="submit" class="btn btn-secondary">Voltar</a>
                </div>
            </form>
        </div>
    </div>
@stop

@section('css')
@stop

@section('js')
    <script src="../vendor/inputmask/jquery.inputmask.min.js"></script>
    <script>
        console.log('hi');

        $(document).ready(function() {
            $('#phone').inputmask({
                "mask": "(99) 9 9999-9999",
                removeMaskOnSubmit: true
            });
        });
    </script>
@stop
