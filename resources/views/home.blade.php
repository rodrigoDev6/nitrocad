@extends('adminlte::page')

@section('title', 'Home')

@section('content_header')
    <h1>Home</h1>
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

        <div class="col-md-3">

            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <div class="text-center">
                        <img class="profile-user-img img-fluid img-circle"
                            src="https://xsgames.co/randomusers/assets/avatars/male/18.jpg" alt="User profile picture">
                    </div>
                    <h3 class="profile-username text-center">{{ Auth::user()->name }}</h3>
                </div>
            </div>

        </div>
        <div class="col-lg-3 col-xs-6">

            <div class="small-box bg-green">
                <div class="inner">
                    <p>Usuário Cadastrados</p>
                    <h3>{{ $users }}</h3>
                </div>
                <div class="icon">
                    <i class="fas fa-users"></i>
                </div>
                <a href="{{ route('user.index') }}" class="small-box-footer">Ver Usuarios <i class="fas fa-plus"></i></a>
            </div>
        </div>
    </div>
@stop

@section('css')
@stop

@section('js')
    <script src="vendor/inputmask/jquery.inputmask.min.js"></script>
    <script>
        console.log('hi');


        $(document).ready(function() {
            $("#phone").inputmask({
                "mask": "(99) 9 999-9999"
            });
        });
    </script>
@stop
