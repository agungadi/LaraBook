@extends('admin.layouts.header')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="login100-form-title" style="background-image: url(/bootstrap/bg-02.jpg);">
					<span class="login100-form-title-1">
						Tambah Buku
					</span>
				</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.buku.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="nama_buku" class="col-md-4 col-form-label text-md-right">Nama Buku</label>

                            <div class="col-md-6">
                                <input id="nama_buku" type="text" class="form-control @error('nama_buku') is-invalid @enderror" name="nama_buku" value="{{ old('nama_buku') }}" required autocomplete="nama_buku" autofocus>

                                @error('nama_buku')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="penulis" class="col-md-4 col-form-label text-md-right">Penulis</label>

                            <div class="col-md-6">
                                <input id="penulis" type="penulis" class="form-control @error('penulis') is-invalid @enderror" name="penulis" value="{{ old('penulis') }}" required autocomplete="penulis">

                                @error('penulis')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="tentang_buku" class="col-md-4 col-form-label text-md-right">Tentang Buku</label>

                            <div class="col-md-6">
                                <input id="tentang_buku" type="tentang_buku" class="form-control @error('tentang_buku') is-invalid @enderror" name="tentang_buku" value="{{ old('tentang_buku') }}" required autocomplete="tentang_buku">

                                @error('tentang_buku')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="status_buku" class="col-md-4 col-form-label text-md-right">Status Buku</label>
                            <div class="col-md-6">
                                <select name="status_buku" class="form-control">
                                {{-- <input id="status_buku" type="status_buku" class="form-control @error('status_buku') is-invalid @enderror" name="status_buku" value="{{ old('status_buku') }}" required autocomplete="status_buku"> --}}
                                <option value="Tersedia">Tersedia</option>
                                <option value="Dipinjam">Dipinjam</option>
                                </select>
                                @error('status_buku')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="foto" class="col-md-4 col-form-label text-md-right">Foto</label>
                            <div class="col-md-6">
                                <input id="foto" type="file" class="form-control @error('foto') is-invalid @enderror" name="foto" value="{{ old('foto') }}" required autocomplete="foto">
                                @error('foto')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Submit
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
