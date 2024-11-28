@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Edit Buku</div>
                <div class="card-body">
                    <form method="post" action="{{route('buku.update', $buku->id)}}">
                        @csrf
                        @method('PUT')
                        
                        <div class="row mb-3">
                            <label for="judul" class="col-md-4 col-form-label text-md-end">{{ __('judul') }}</label>
                            <div class="col-md-6">
                                <input id="judul" type="text" value="{{ $buku->judul }}" class="form-control @error('judul') is-invalid @enderror" name="judul" value="{{ old('judul') }}" required autocomplete="judul" autofocus>
                                @error('judul')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="TahunTerbit" class="col-md-4 col-form-label text-md-end">{{ __('Tahun Terbit') }}</label>
                            <div class="col-md-6">
                                <input id="TahunTerbit" type="date" value="{{ $buku->TahunTerbit }}" class="form-control @error('TahunTerbit') is-invalid @enderror" name="TahunTerbit" value="{{ old('TahunTerbit') }}" required autocomplete="TahunTerbit" autofocus>
                                @error('TahunTerbit')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="penerbit" class="col-md-4 col-form-label text-md-end">{{ __('penerbit') }}</label>
                            <div class="col-md-6">
                                <input id="penerbit" type="text" value="{{ $buku->penerbit }}" class="form-control @error('penerbit') is-invalid @enderror" name="penerbit" value="{{ old('penerbit') }}" required autocomplete="penerbit" autofocus>
                                @error('penerbit')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="penulis" class="col-md-4 col-form-label text-md-end">{{ __('penulis') }}</label>
                            <div class="col-md-6">
                                <input id="penulis" type="text" value="{{ $buku->penulis }}" class="form-control @error('penulis') is-invalid @enderror" name="penulis" value="{{ old('penulis') }}" required autocomplete="penulis" autofocus>
                                @error('penulis')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="kategori_id" class="col-md-4 col-form-label text-md-end">{{ __('Kategori') }}</label>
                            <div class="col-md-6">
                                <select id="kategori_id" name="kategori_id" class="form-control @error('kategori_id') is-invalid @enderror" required>
                                    <option value="{{ $buku->kategori_id }}">{{ $buku->kategori->nama_kategori }}</option>
                                    @foreach($kategoris as $kategori)
                                        <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>
                                    @endforeach
                                </select>
                                @error('kategori_id')
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
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
