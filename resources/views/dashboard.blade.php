@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <!-- Dashboard Header -->
        <div class="col-12 mb-3">
            <h2>Dashboard</h2>
        </div>

        <!-- Cards Section -->
        <div class="row">
            <!-- Anggota Card -->
            <div class="col-md-3 mb-4">
                <div class="card text-white bg-primary h-100">
                    <div class="card-body text-center">
                        <h5 class="card-title">Anggota</h5>
                        <h1>2</h1>
                        <a href="/user" class="btn btn-light mt-3">More info</a>
                    </div>
                </div>
            </div>

            <!-- Jenis Buku Card -->
            <div class="col-md-3 mb-4">
                <div class="card text-white bg-info h-100">
                    <div class="card-body text-center">
                        <h5 class="card-title">Jenis Buku</h5>
                        <h1>1</h1>
                        <a href="/buku" class="btn btn-light mt-3">More info</a>
                    </div>
                </div>
            </div>

            <!-- Pinjam Card -->
            <div class="col-md-3 mb-4">
                <div class="card text-white bg-success h-100">
                    <div class="card-body text-center">
                        <h5 class="card-title">kategori</h5>
                        <h1>0</h1>
                        <a href="/kategori" class="btn btn-light mt-3">More info</a>
                    </div>
                </div>
            </div>

            <!-- Dikembalikan Card -->
            <div class="col-md-3 mb-4">
                <div class="card text-white bg-danger h-100">
                    <div class="card-body text-center">
                        <h5 class="card-title">peminjaman</h5>
                        <h1>2</h1>
                        <a href="#" class="btn btn-light mt-3">More info</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
