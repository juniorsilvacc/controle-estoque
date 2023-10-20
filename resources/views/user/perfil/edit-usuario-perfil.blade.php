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
                        <form action="{{ route('perfil.uploadAction', $usuario->id) }}" method="POST"
                            enctype="multipart/form-data">

                            @csrf

                            <div class="card-body align-items-center">
                                <div class="image-container">
                                    <img src="{{ $usuario->image ? asset("storage/{$usuario->image}") : asset('img/sem-usuario.png') }}"
                                        id="image-preview" alt="{{ $usuario->name }}">
                                </div>

                                <span class="mt-2">JPG ou PNG e menor que 5 MB</span>

                                <input type="file" class="form-control-file mt-3" name="image" id="image"
                                    onchange="showUploadButton(this)">
                                <div id="upload-button" style="display: none;">
                                    <button type="submit" class="btn btn-primary">Enviar Arquivo</button>
                                </div>
                            </div>

                        </form>
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
                        <form class="row g-3 my-2" action="{{ route('perfil.editAction', $usuario->id) }}" method="POST">

                            @method('PUT')
                            @include('user.perfil.partials.forms')

                            <button type="submit" class="btn btn btn-primary col-md-3">Atualizar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('image').addEventListener('change', function() {
            const preview = document.getElementById('image-preview');
            const file = this.files[0];

            if (file) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                };

                reader.readAsDataURL(file);
            } else {
                preview.style.display = 'none';
            }
        });
    });
</script>

<script>
    function showUploadButton(input) {
        if (input.files.length > 0) {
            document.getElementById('upload-button').style.display = 'block';
        } else {
            document.getElementById('upload-button').style.display = 'none';
        }
    }
</script>
