@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Tambah Peminjaman</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('peminjaman.store') }}">
                        @csrf
                        
                        <div class="row mb-3">
                            <label for="user_id" class="col-md-4 col-form-label text-md-end">{{ __('User') }}</label>
                            <div class="col-md-6">
                                <select id="user_id" name="user_id" class="form-control @error('user_id') is-invalid @enderror" required>
                                    @foreach($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                                @error('user_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="buku_id" class="col-md-4 col-form-label text-md-end">{{ __('Buku') }}</label>
                            <div class="col-md-6">
                                <select id="buku_id" name="buku_id" class="form-control @error('buku_id') is-invalid @enderror" required>
                                    @foreach($bukus as $buku)
                                        <option value="{{ $buku->id }}">{{ $buku->judul }}</option>
                                    @endforeach
                                </select>
                                @error('buku_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="TanggalPeminjaman" class="col-md-4 col-form-label text-md-end">{{ __('Tanggal Peminjaman') }}</label>
                            <div class="col-md-6">
                                <input id="TanggalPeminjaman" type="date" class="form-control @error('TanggalPeminjaman') is-invalid @enderror" name="TanggalPeminjaman" value="{{ old('TanggalPeminjaman') }}" required autocomplete="TanggalPeminjaman">
                                @error('TanggalPeminjaman')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="TanggalPengembalian" class="col-md-4 col-form-label text-md-end">{{ __('Tanggal Pengembalian') }}</label>
                            <div class="col-md-6">
                                <input id="TanggalPengembalian" type="date" class="form-control @error('TanggalPengembalian') is-invalid @enderror" name="TanggalPengembalian" value="{{ old('TanggalPengembalian') }}" required autocomplete="TanggalPengembalian">
                                @error('TanggalPengembalian')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                       
                        <div class="row mb-3">
                            <label for="StatusPeminjaman" class="col-md-4 col-form-label text-md-end">{{ __('Status Peminjaman') }}</label>
                            <div class="col-md-6">
                                <select id="StatusPeminjaman" name="StatusPeminjaman" class="form-control @error('StatusPeminjaman') is-invalid @enderror" required>
                                    <option value="Aktif">Aktif</option>
                                    <option value="TidakAktif">TidakAktif</option>
                                </select>
                                @error('StatusPeminjaman')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Simpan') }}
                                </button>
                                <a class="btn btn-link" href="{{ route('peminjaman.index') }}">
                                    {{ __('Kembali') }}
                                </a>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
