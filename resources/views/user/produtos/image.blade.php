@extends('layouts.app')

@section('title', 'Upload Imagem Produto')

@section('content')
    <div class="container-fluid px-4 upload-product">
        <div class="row bg-upload-product">
            <div class="col title-upload-product">
                <h1>Upload Imagem Produto</h1>
            </div>
            <form class="row g-3 my-2" action="{{ route('produtos.uploadAction', $produto->id) }}" method="POST"
                enctype="multipart/form-data">

                @csrf

                <div class="product-photo-upload">
                    <input type="file" id="file-input" class="hidden-file-input" name="image" />
                    <label for="file-input" class="custom-file-upload">
                        <span class="upload-icon">&#128247;</span>
                        Carregar Foto do Produto
                    </label>
                </div>

                <div>
                    <button type="submit" class="btn btn-success col-md-3">Upload</button>
                </div>
            </form>
        </div>
    </div>
@endsection
