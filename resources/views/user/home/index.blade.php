@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div class="container-fluid px-4">
    <div class="row g-3 my-2">
        <div class="col-md-3">
            <div class="p-3 bg-white shadow d-flex justify-content-around align-items-center rounded">
                <div>
                    <h3 class="fs-4">100</h3>
                    <p class="fs-7">Produtos</p>
                </div>
                <i class="fas fa-gift fs-6 primary-text border rounded-full secondary-bg p-3"></i>
            </div>
        </div>

        <div class="col-md-3">
            <div class="p-3 bg-white shadow d-flex justify-content-around align-items-center rounded">
                <div>
                    <h3 class="fs-4">4920</h3>
                    <p class="fs-7">Clientes</p>
                </div>
                <i class="fa-solid fa-users fs-6 primary-text border rounded-full secondary-bg p-3"></i>
            </div>
        </div>

        <div class="col-md-3">
            <div class="p-3 bg-white shadow d-flex justify-content-around align-items-center rounded">
                <div>
                    <h3 class="fs-4">3899</h3>
                    <p class="fs-7">Preço Médio</p>
                </div>
                <i class="fas fa-dollar-sign fs-6 primary-text border rounded-full secondary-bg p-3"></i>
            </div>
        </div>

        <div class="col-md-3">
            <div class="p-3 bg-white shadow d-flex justify-content-around align-items-center rounded">
                <div>
                    <h3 class="fs-4">1.0</h3>
                    <p class="fs-7">Versão</p>
                </div>
                <i class="fas fa-file-excel fs-6 primary-text border rounded-full secondary-bg p-3"></i>
            </div>
        </div>
    </div>
</div>
@endsection
