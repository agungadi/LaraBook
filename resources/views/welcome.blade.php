<!DOCTYPE html>
<html lang="en">

<head>

  <title>LaraBook</title>


  <link href="{{asset('bootstrap/logoa.png')}}" rel="icon">

  <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
  <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
  <link href="{{asset('icofont/icofont.min.css')}}" rel="stylesheet">

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="logo mr-auto" >
      <a href="#">
        <img src="{{asset('bootstrap/logoa.png')}}" width="30" height="30" class="d-inline-block align-top" alt="">
        LaraBook
      </a>
    </h1>


      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="active"><a href="#hero">Home</a></li>
          <li><a href="#services">New Book</a></li>
          <li><a href="#contact">Contact</a></li>

        </ul>
      </nav><!-- .nav-menu -->

      <a href="{{ route('register') }}" class="get-started-btn scrollto">Register Now</a>

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex flex-column justify-content-center align-items-center">
    <div class="container text-center text-md-left" data-aos="fade-up">
      <h1>Welcome to LaraBook</h1>
      <h2>Borrow books easier and faster</h2>
      <a href="{{ route('login') }}" class="btn-get-started scrollto">Login</a>
    </div>
  </section><!-- End Hero -->
  <main id="main">




    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
      <div class="container">

        <div class="section-title">
          <h2>New Book Release</h2>
          <p>Borrow Now</p>
        </div>
        @foreach($book->chunk(3) as $chunk)

        <div class="row">
            @foreach ($chunk as $buku)

            <div class="col-lg-4 col-md-6 d-flex align-items-stretch"  id="range">
                <div class="icon-box">
                <img src="{{asset('storage/'.$buku->foto)}}" width="150" style="margin-top:20px;">
                <h3 style="padding:10px;"><a href="">{{ $buku->nama_buku }}</a></h3>
                <h4>{{ $buku->penulis }}</h4>

                </div>

            </div>
            @endforeach
      </div>
      @endforeach

    </div>
    </section><!-- End Services Section -->

    <!-- ======= Cta Section ======= -->
    <section id="cta" class="cta">
      <div class="container">

        <div class="text-center">
          <h3>Libraries were full of ideas</h3>
          <p>perhaps the most dangerous and powerful of all weapons</p>
          <a class="cta-btn" href="{{ route('admin.login') }}">Login Admin</a>
        </div>

      </div>
    </section><!-- End Cta Section -->

    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Contact</h2>
          <p>library location</p>
        </div>

        <div class="row no-gutters justify-content-center" data-aos="fade-up">

          <div class="col-lg-5 d-flex align-items-stretch">
            <div class="info">
              <div class="address">
                <i class="icofont-google-map"></i>
                <h4>Location:</h4>
                <p>Jalan Darmawangsa VI</p>
              </div>

              <div class="email mt-4">
                <i class="icofont-envelope"></i>
                <h4>Email:</h4>
                <p>bookly@openbook.com</p>
              </div>

              <div class="phone mt-4">
                <i class="icofont-phone"></i>
                <h4>Call:</h4>
                <p>+62 852 3647 4700</p>
              </div>

            </div>

          </div>

          <div class="col-lg-5 d-flex align-items-stretch">
            <iframe style="border:0; width: 100%; height: 320px;" src="https://maps.google.com/maps?q=-6.253047725310654, 106.80145619903774&z=15&output=embed" frameborder="0" allowfullscreen></iframe>

          </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="container footer-bottom clearfix">
      <div class="copyright">
        &copy; Copyright <strong><span>Lara Book</span></strong> 2021
      </div>

    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->


  <script src="{{asset('bootstrap/jquery/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('bootstrap/jquery/jquery.easing/jquery.easing.min.js')}}"></script>


  <!-- Template Main JS File -->
  <script src="{{asset('bootstrap/js/main.js')}}"></script>

</body>

</html>
