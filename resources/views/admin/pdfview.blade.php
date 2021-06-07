<html>
    <head>
        <title>Sistem Informasi Mahasiswa</title>
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="an
            onymous">
            <script src="https://code.jquery.com/jquery3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
            <style type="text/css">
                table tr td,
                table tr th{
                font-size: 9pt;
                }
                </style>
    </head>

    <body>

        <h2 style="text-align: center">  <img src="{{ public_path('bootstrap/logoa.png') }}" width="30" height="30">LARABOOK PERPUSTAKAAN ONLINE  <img src="{{ public_path('bootstrap/logoa.png') }}" width="30" height="30"></h2>
        <h3 style="text-align: center"><strong>DETAIL PEMINJAMAN BUKU</strong></h3>
{{--
            <p class="m-1"><strong>Id &emsp; &nbsp; :</strong> {{ $borrow->id_peminjaman }}</p>
            <p class="m-1"><strong>Nama :</strong> {{ $borrow->user->name }}</p>
            <p class="m-1"><strong>Buku&nbsp; :</strong> {{ $borrow->book->nama_buku }}</p> --}}
            <table border="0" style="font-weight:bold;">
                <tr>

                    <td width="100">Id Peminjam </td>
                    <td>: {{ $borrow->id_peminjaman }}</td>
                </tr>
                <tr>
                    <td width="100">Nama Peminjam </td>
                    <td>: {{ $borrow->user->name }} </td>
               </tr>
               <tr>
                    <td width="100">Judul Buku </td>
                    <td>: {{ $borrow->book->nama_buku }}</td>
                </tr>
            </table>
        </br>
                    <table class="table table-bordered">
                        <tr>
                            <th>Foto Buku</th>
                            <th>Nama Buku</th>
                            <th>Tanggal Pinjam</th>
                            <th>Tanggal Kembali</th>
                        </tr>
                        {{-- @foreach ($mahasiswa as $matakuliah) --}}
                            <tr>
                                <td><img width="100px" src="{{public_path('storage/'.$borrow->book->foto)}}"></td>
                                <td>{{ $borrow->book->nama_buku }}</td>
                                <td>{{ $borrow->tanggal_pinjam }}</td>
                                <td>{{ $borrow->tanggal_kembali }}</td>
                            </tr>
                        {{-- @endforeach --}}
                    </table>
                    <p style="font-style: italic; font-weight: bold;">*Kembalikan buku yang anda pinjam tepat waktu karena ada denda Rp.1000/hari saat telat, Terima Kasih.</p>

    </body>
</html>

