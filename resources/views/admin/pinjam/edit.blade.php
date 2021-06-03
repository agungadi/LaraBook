@extends('admin.layouts.header')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="login100-form-title" style="background-image: url(/bootstrap/bg-02.jpg);">
					<span class="login100-form-title-1">
						Edit Buku
					</span>
				</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.buku.update', $book->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label for="nama_buku" class="col-md-4 col-form-label text-md-right">Nama Buku</label>

                            <div class="col-md-6">
                                <input id="nama_buku" type="text" class="form-control @error('nama_buku') is-invalid @enderror" name="nama_buku" value="{{ $book->nama_buku }}" required autocomplete="nama_buku" autofocus>

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
                                <input id="penulis" type="penulis" class="form-control @error('penulis') is-invalid @enderror" name="penulis" value="{{ $book->penulis }}" required autocomplete="penulis">

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
                                <textarea id="tentang_buku" type="tentang_buku" class="form-control @error('tentang_buku') is-invalid @enderror" name="tentang_buku" required autocomplete="tentang_buku">{{ $book->tentang_buku }}</textarea>
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
                                <option value="Tersedia" {{ $book->status_buku == 'Tersedia' ? 'selected' : ''}}> Tersedia</option>
                                <option value="Sedang Dipinjam" {{ $book->status_buku == 'Sedang Dipinjam' ? 'selected' : ''}}>Sedang Dipinjam</option>
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
                                <input id="foto" type="file" class="form-control" name="foto" value="{{ $book->foto }}">
                                @error('foto')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        {{-- <input type="text" name="foto" id="foto2" value="{{ $book->foto }}"> --}}


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
