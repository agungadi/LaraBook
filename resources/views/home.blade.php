@extends('layouts.header')

@section('content')
    <!-- ======= Cta Section ======= -->
    <section id="cta" class="cta">
        <div class="container">

          <div class="text-center">
            <h3>Today a reader tomorrow a leader</h3>
            <h3>CHOOSE YOUR BOOK</h3>
            <p>List Book</p>
          </div>

        </div>
      </section><!-- End Cta Section -->
      <!-- ======= Services Section ======= -->

      <!-- ======= Services Section ======= -->

    <section id="services" class="services section-bg">
        <div class="container">
            {{-- @foreach(array_chunk($book, 2) as $chunk) --}}
            @foreach($book->chunk(3) as $chunk)

            <div class="row">
                @foreach ($chunk as $buku)

                <div class="col-lg-4 col-md-6 d-flex align-items-stretch" id="range">
                    <div class="icon-box">
                        <img src="{{asset('storage/'.$buku->foto)}}" width="150" style="margin-top:20px;">
                        <h4 style="padding:10px; font-size: 10px;"><a href="">{{ $buku->nama_buku }}</a></h4>
                            <h4>{{ $buku->penulis }}</h4>
                            <p class="btn btn-info">{{ $buku->status_buku }}</p></br></br>

                            @if($buku->status_buku === 'Tersedia')
                            <a href="{{ route('pinjambuku',$buku->id) }}"  class="btn btn-warning">Pinjam Buku</a>
                            @endif

                    </div>
                </div>
                @endforeach

            </div>
            @endforeach

        </div>
    </section>
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->


@endsection
