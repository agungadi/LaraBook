@extends('admin.layouts.header')

@section('content')
<section id="services">
    <div class="container">

        <div class="row">


        <div class="col-md-12">

            <div  class="content-box-large">

<div class="row">
    <div class="col-lg-12 margin-tb">

        <form method="get" action="/search">
            <div class="float-left my-2" style="margin-right:20px;">
                <button type="submit" class="btn btn-warning">Search</button>
            </div>

            <div class="float-left my-2">
                <input type="search" name="search" class="form-control" id="cari" aria-describedby="search" >
            </div>

        </form>
    </div>
</div>

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

            <table class="table table-bordered">
                <thead class="thead">
                <tr>
                <th>Id</th>
                <th width="100px">Nama Buku</th>
                <th>Foto</th>
                <th>Nama Peminjam</th>
                <th>Tgl Pinjam</th>
                <th>Tgl Kembali</th>
                <th>Denda</th>
                <th>Status</th>
                <th>Action</th>
            </thead>

                </tr>
                @foreach ($Borrow as $buku)
                <tr>
                <td>{{ $buku->id_peminjaman }}</td>
                <td style="width:200px">{{ $buku->book->nama_buku }}</td>
                <td><img width="100px" src="{{asset('storage/'.$buku->book->foto)}}"></td>
                <td>{{ $buku->user->name }}</td>
                <td>{{ $buku->tanggal_pinjam }}</td>
                <td>{{ $buku->tanggal_kembali }}</td>
                <td>{{ $buku->denda }}</td>
                <td>{{ $buku->status }}</td>
                <td>
                <form action="{{ route('admin.pinjam.destroy', $buku->id_peminjaman) }}" method="POST">

                <a class="btn btn-info" href="{{ route('admin.kembali',$buku->id_peminjaman) }}">Selesai</a>
                </br>
            </br>
                @csrf
                @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
            </form>
            </td>
            </tr>
                @endforeach
            </table>
            </div>
        </div>
        </div>
{{-- <div class="d-flex">
    {{ $buku->links() }}
</div> --}}
@endsection
