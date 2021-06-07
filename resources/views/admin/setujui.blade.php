<html>
    <head>
        <title>Sistem Informasi Mahasiswa</title>
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="an
            onymous">
            <script src="https://code.jquery.com/jquery3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">

                    <h2 class="m-3">  <img src="{{ asset('bootstrap/logoa.png') }}" width="30" height="30">LARABOOK PERPUSTAKAAN ONLINE  <img src="{{ asset('bootstrap/logoa.png') }}" width="30" height="30"></h2>


                    <h3 class="m-3"><strong>DETAIL PEMINJAMAN BUKU</strong></h3>
                </div>
                <div class="col-12">
                    <p class="m-1"><strong>Id &emsp; &nbsp; :</strong> {{ $borrow->id_peminjaman }}</p>
                    <p class="m-1"><strong>Nama :</strong> {{ $borrow->user->name }}</p>
                    <p class="m-1"><strong>Buku&nbsp; :</strong> {{ $borrow->book->nama_buku }}</p>
                </br>
                </div>

                <div class="col-12">
                    <table class="table table-bordered">
                        <tr>
                            <th>Foto Buku</th>
                            <th>Nama Buku</th>
                            <th>Tanggal Pinjam</th>
                            <th>Tanggal Kembali</th>
                        </tr>
                        {{-- @foreach ($mahasiswa as $matakuliah) --}}
                            <tr>
                                <td><img width="100px" src="{{asset('storage/'.$borrow->book->foto)}}"></td>
                                <td>{{ $borrow->book->nama_buku }}</td>
                                <td>{{ $borrow->tanggal_pinjam }}</td>
                                <td>{{ $borrow->tanggal_kembali }}</td>
                            </tr>
                        {{-- @endforeach --}}
                    </table>
                    <a class="btn btn-danger" href="{{ route('admin.cetak', $borrow->id_peminjaman) }}">CETAK PDF</a>
                    <a class="btn btn-warning" href="{{ route('admin.disetujui', [$borrow->id_peminjaman, $borrow->id_book]) }}">KEMBALI</a>

                </div>
            </div>
        </div>
    </body>
</html>

