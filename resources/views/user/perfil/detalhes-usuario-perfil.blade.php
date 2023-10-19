@extends('layouts.app')

@section('title', 'Perfil de Usuário')

@section('content')
    <div class="container">
        <div class="row">
            <!-- Foto de Perfil -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        Foto de Perfil
                    </div>
                    <div class="card-body align-items-center">
                        <img src="{{ $usuario->image ? asset("storage/{$usuario->image}") : asset('img/sem-usuario.png') }}"
                            class="img-fluid rounded-circle my-3" alt="{{ $usuario->name }}">
                    </div>
                </div>
            </div>

            <!-- Informações do Usuário -->
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Detalhes de Usuário
                    </div>
                    <div class="card-body">
                        <div class="row g-3">

                            @include('user.perfil.partials.form-detalhes')

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
