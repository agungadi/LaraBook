@extends('admin.layouts.headerpinjam')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="login100-form-title-pinjam" style="background-image: url(/bootstrap/bg-04.png);">

                    @foreach($book as $books)
                    <span class="login100-form-title-1">
                        <img src="{{asset('storage/'.$books->foto)}}" width="150" style="margin-top:20px;">
					</span>
                    <h5 style="color: white; font-weight: bold">{{$books->nama_buku}}</h5>
                    <h6 style="color: #fff5eb; font-weight: bold">{{$books->penulis}}</h5>
                    </br>
                    <h6 style="color:aliceblue;word-wrap: break-word;width: 400px;text-align: justify;">{{$books->tentang_buku}}</h6>

                    {{-- @foreach($user as $users)
                    <h6>{{$users->name}}</h5> --}}

                    {{-- @endforeach --}}


				</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.buku.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="start" class="col-md-4 col-form-label text-md-right">Tanggal Kembali</label>

                            <div class="col-md-6">
                                <div class="input-group input-daterange">

                                <input id="start" type="text" class="form-control @error('nama_buku') is-invalid @enderror" name="tglkembali" value="">
                                <span class="fa fa-calendar" id="fa-2"></span>

                                @error('nama_buku')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                            </div>
                        </div>


                        <div class="form-group row">

                            <div class="col-md-6">
                                <input id="tentang_buku" type="hidden" class="form-control @error('tentang_buku') is-invalid @enderror" name="tentang_buku" value="{{ Auth::user()->id }}" required autocomplete="tentang_buku">
                                <input id="tentang_buku" type="hidden" class="form-control @error('tentang_buku') is-invalid @enderror" name="tentang_buku" value="{{ $books->id }}" required autocomplete="tentang_buku">

                                @error('tentang_buku')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        @endforeach


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
