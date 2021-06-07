<html>
    <head>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <style>
            body
            {
                background:#00bcd4;
            }

            h1
            {
                color:#fff;
                margin:40px 0 60px 0;
                font-weight:300;
            }

            .our-team-main
            {
                width:100%;
                height:auto;
                border-bottom:5px #323233 solid;
                background:#fff;
                text-align:center;
                border-radius:10px;
                overflow:hidden;
                position:relative;
                transition:0.5s;
                margin-bottom:28px;
            }


            .our-team-main img
            {
                border-radius:50%;
                margin-bottom:20px;
                width: 90px;
            }

            .our-team-main h3
            {
                font-size:20px;
                font-weight:700;
            }

            .our-team-main p
            {
                margin-bottom:0;
            }

            .team-back
            {
                width:100%;
                height:auto;
                position:absolute;
                top:0;
                left:0;
                padding:5px 15px 0 15px;
                text-align:left;
                background:#fff;

            }

            .team-front
            {
                width:100%;
                height:auto;
                position:relative;
                z-index:10;
                background:#fff;
                padding:15px;
                bottom:0px;
                transition: all 0.5s ease;
            }

            .our-team-main:hover .team-front
            {
                bottom:-200px;
                transition: all 0.5s ease;
            }

            .our-team-main:hover
            {
                border-color:#777;
                transition:0.5s;
            }

        </style>
    </head>
    <body>
        @extends('layouts.appdaftarpinjam')
        @section('content')
    </br>
        <h1 class="text-center">Tata Tertib Perpustakaan</h1>
</br>

        <div class="container">
        <div class="row">

        <!--team-1-->
        <div class="col-lg-4">
        <div class="our-team-main">

        <div class="team-front">
            <img src="{{ asset('bootstrap/logoa.png') }}" width="30" height="30" class="img-fluid" />
        <h3>Booking Rules</h3>
        </div>

        <div class="team-back">
        <span>
        Member yang melakukan booking buku pada web harus mengambil pada hari booking tersebut. Apabila booking buku tidak diambil sistem akan otomatis menghapus booking buku ke esokan harinya.
        </span>
        </div>

        </div>
        </div>
        <!--team-1-->

        <!--team-2-->
        <div class="col-lg-4">
        <div class="our-team-main">

        <div class="team-front">
            <img src="{{ asset('bootstrap/logoa.png') }}" width="30" height="30" class="img-fluid" />
            <h3>Waktu Operasional</h3>
        </div>

        <div class="team-back">
        <span>
        Pelayanan pengambilan dan pengembalian buku dapat diambil di perpustakaan setiap hari pada waktu pukul 08.00-15.00
        </span>
        </div>

        </div>
        </div>
        <!--team-2-->

        <!--team-3-->
        <div class="col-lg-4">
        <div class="our-team-main">

        <div class="team-front">
            <img src="{{ asset('bootstrap/logoa.png') }}" width="30" height="30" class="img-fluid" />
            <h3>Lama Peminjaman</h3>
        </div>

        <div class="team-back">
        <span>
            Jangka Waktu peminjaman buku diberikan paling lama 5 hari sejak tanggal peminjaman, apabila pada saat booking melebihi 5 hari maka akan ditolak oleh admin.
        </span>
        </div>

        </div>
        </div>
        <!--team-3-->

        <!--team-4-->
        <div class="col-lg-4">
        <div class="our-team-main">

        <div class="team-front">
            <img src="{{ asset('bootstrap/logoa.png') }}" width="30" height="30" class="img-fluid" />
            <h3>Pengembalian</h3>
        </div>

        <div class="team-back">
        <span>
            Pengembalian buku wajib membawa bukti print kertas saat meminjam atau bisa menunjukan daftar pinjam pada akun member.
        </span>
        </div>

        </div>
        </div>
        <!--team-4-->

        <!--team-5-->
        <div class="col-lg-4">
        <div class="our-team-main">

        <div class="team-front">

        <img src="{{ asset('bootstrap/logoa.png') }}" width="30" height="30" class="img-fluid" />
        <h3>Denda</h3>
        </div>

        <div class="team-back">
        <span>
        Keterlambatan pengembalian buku akan mendapatkan denda Rp.1000/hari terhitung dari tanggal kembali oleh sistem.
        </span>
        </div>

        </div>
        </div>
        <!--team-5-->

        <!--team-6-->
        <div class="col-lg-4">
        <div class="our-team-main">

        <div class="team-front">
        <img src="{{ asset('bootstrap/logoa.png') }}" width="30" height="30" class="img-fluid" />
        <h3>Sanksi</h3>
        </div>

        <div class="team-back">
        <span>
        Peminjam yang terbukti menghilangkan dan merusak buku yang dipinjam harus mengganti dengan buku yang sama.

        </span>
        </div>

        </div>
        </div>
        <!--team-6-->



        </div>
        </div>
        @endsection

    </body>
</html>
