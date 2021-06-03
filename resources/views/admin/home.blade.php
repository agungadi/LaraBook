@extends('admin.layouts.top')

@section('content')
    <!-- ======= Cta Section ======= -->
    <section id="cta" class="cta">
        <div class="container">

          <div class="text-center">
            <h3>A ROOM WITHOUT BOOKS IS LIKE A BODY WITHOUT A SOUL</h3>
            <a class="cta-btn" href="{{ route('admin.buku.create') }}">Tambah Buku</a>
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
                            <form action="{{ route('admin.buku.destroy',$buku->id) }}" method="POST">

                            <a href="{{ route('admin.buku.edit',$buku->id) }}"  class="btn btn-warning">Edit Buku</a>
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit" onClick="return confirm('Are you sure you want to delete?')">Delete Buku</button>
                            </form>
                    </div>
                </div>
                @endforeach

            </div>
            @endforeach

        </div>
        <div class="card-body">
            <table id="bootstrap-data-table" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>Judul</th>
                  <th>Keperluan</th>

                </tr>
                <tbody>

              @foreach ($book as $i=>$row)
                  <tr>
                      <td>{{ $row->nama_buku }}</td>
                      <td>{{ $row->penulis }}</td>

                  </tr>
              @endforeach
                </table>
                  </div>
    </section><!-- End Services Section -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->


@endsection
