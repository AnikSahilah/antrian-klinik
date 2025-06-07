<!DOCTYPE html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>BPM Lilik Susilo wati</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- Place favicon.ico in the root directory -->

    <!-- ========================= CSS here ========================= -->
    <link rel="stylesheet" href="assets/css/bootstrap-5.0.0-beta1.min.css" />
    <link rel="stylesheet" href="assets/css/LineIcons.2.0.css" />
    <link rel="stylesheet" href="assets/css/tiny-slider.css" />
    <link rel="stylesheet" href="assets/css/animate.css" />
    <link rel="stylesheet" href="assets/css/lindy-uikit.css" />
</head>

<body>
    <!--[if lte IE 9]>
      <p class="browserupgrade">
        You are using an <strong>outdated</strong> browser. Please
        <a href="https://browsehappy.com/">upgrade your browser</a> to improve
        your experience and security.
      </p>
    <![endif]-->

    <!-- ========================= preloader start ========================= -->
    <div class="preloader">
        <div class="loader">
            <div class="spinner">
                <div class="spinner-container">
                    <div class="spinner-rotator">
                        <div class="spinner-left">
                            <div class="spinner-circle"></div>
                        </div>
                        <div class="spinner-right">
                            <div class="spinner-circle"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ========================= preloader end ========================= -->

    <!-- ========================= hero-section-wrapper-5 start ========================= -->
    <section id="Beranda" class="hero-section-wrapper-5">

        <!-- ========================= header-6 start ========================= -->
        <header class="header header-6">
            <div class="navbar-area">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-12">
                            <nav class="navbar navbar-expand-lg">
                                <!-- <a class="navbar-brand" href="index.html">
                                    <img src="assets/img/logo/logo.jpg" alt="Logo" />
                                </a> -->
                                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent6" aria-controls="navbarSupportedContent6" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="toggler-icon"></span>
                                    <span class="toggler-icon"></span>
                                    <span class="toggler-icon"></span>
                                </button>

                                <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent6">
                                    <ul id="nav6" class="navbar-nav ms-auto">
                                        <li class="nav-item">
                                            <a class="page-scroll active" href="#Beranda">Beranda</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="page-scroll" href="#Jadwal">Jadwal</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="page-scroll" href="#about">About</a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="page-scroll" href="#Daftar">Daftar</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="page-scroll" href="#ListAntrian">Data Antrian</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="page-scroll" href="#contact">Contact</a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="header-action d-flex">
                                    <a href="#0"> <i class="lni lni-cart"></i> </a>
                                    <a href="#0"> <i class="lni lni-alarm"></i> </a>
                                </div>
                                <!-- navbar collapse -->
                            </nav>
                            <!-- navbar -->
                        </div>
                    </div>
                    <!-- row -->
                </div>
                <!-- container -->
            </div>
            <!-- navbar area -->
        </header>
        <!-- ========================= header-6 end ========================= -->

        <!-- ========================= hero-5 start ========================= -->
        <div class="hero-section hero-style-5 img-bg" style="background-image: url('assets/img/hero/hero-5/hero-bg.svg')">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="hero-content-wrapper">
                            <h2 class="mb-30 wow fadeInUp" data-wow-delay=".2s">Selamat Datang di BPM Lilik Susilowati</h2>
                            <p class="mb-30 fs-4 wow fadeInUp" data-wow-delay=".4s">Lihat jadwal dan daftarkan diri anda pada website kami</p>
                            <a href="#0" class="button button-lg radius-50 wow fadeInUp" data-wow-delay=".6s">Get Started <i class="lni lni-chevron-right"></i> </a>
                        </div>
                    </div>
                    <div class="col-lg-6 align-self-end">
                        <div class="hero-image wow fadeInUp" data-wow-delay=".5s">
                            <img src="assets/img/hero/hero-5/vector1.svg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ========================= hero-5 end ========================= -->

    </section>
    <!-- ========================= hero-section-wrapper-6 end ========================= -->

    <!-- ========================= Jadwal style-5 start ========================= -->
    <section id="Jadwal" class="py-20 bg-gray-50">
        <div class="container py-6">
            <div class="text-center mb-5">
                <h3 class="fw-bold display-5 text-primary">Jadwal Praktek</h3>
                <p class="text-secondary fs-5 mx-auto" style="max-width: 600px;">
                    Di bawah ini merupakan jadwal dari klinik kami, sebagai acuan untuk kunjungan Anda.
                </p>
            </div>

            <div class="table-responsive shadow-sm rounded-4 overflow-hidden">
                <table class="table table-hover align-middle mb-0 bg-white">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th scope="col" class="py-3 fs-5">Hari</th>
                            <th scope="col" class="py-3 fs-5">Jam Pagi</th>
                            <th scope="col" class="py-3 fs-5">Jam Sore</th>
                            <th scope="col" class="py-3 fs-5">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($jadwals as $jadwal)
                        <tr class="align-middle">
                            <td class="text-capitalize fw-semibold fs-6 py-3">{{ $jadwal->hari }}</td>
                            <td class="fs-6 py-3">{{ $jadwal->jam_buka_pagi }}</td>
                            <td class="fs-6 py-3">{{ $jadwal->jam_buka_sore }}</td>
                            <td class="py-3">
                                @if($jadwal->status == 'buka')
                                <span class="badge rounded-pill bg-success fs-6 px-3 py-2 text-white shadow-sm">
                                    {{ ucfirst($jadwal->status) }}
                                </span>
                                @else
                                <span class="badge rounded-pill bg-danger fs-6 px-3 py-2 text-white shadow-sm">
                                    {{ ucfirst($jadwal->status) }}
                                </span>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center fst-italic text-muted py-5 fs-6">
                                Belum ada jadwal antrian.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <!-- ========================= Jadwal style-5 end ========================= -->
    <!-- ========================= feature style-5 end ========================= -->

    <!-- ========================= about style-4 start ========================= -->
    <section id="about" class="about-section about-style-4">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-5 col-lg-6">
                    <div class="about-content-wrapper">
                        <div class="section-title mb-30">
                            <h3 class="mb-25 wow fadeInUp" data-wow-delay=".2s">Klinik BPM Lilik Susilowati</h3>
                            <p class="wow fadeInUp" data-wow-delay=".3s" style="text-align: justify;">BPM Lilik Susilowati adalah tempat pelayanan kesehatan yang dikelola oleh bidan profesional dengan tujuan memberikan layanan kesehatan terbaik bagi masyarakat. Kami hadir untuk mendukung kesehatan ibu dan anak serta memenuhi kebutuhan pemeriksaan kesehatan umum dengan pelayanan yang ramah, aman, dan berkualitas. layanan yang kami sediakan antara lain:</p>
                        </div>
                        <ul>
                            <li class="wow fadeInUp" data-wow-delay=".35s">
                                <i class="lni lni-checkmark-circle"></i>
                                Pemeriksaan kehamilan
                            </li>
                            <li class="wow fadeInUp" data-wow-delay=".4s">
                                <i class="lni lni-checkmark-circle"></i>
                                Konsultasi kesehatan ibu dan anak
                            </li>
                            <li class="wow fadeInUp" data-wow-delay=".45s">
                                <i class="lni lni-checkmark-circle"></i>
                                Persalinan normal
                            </li>
                            <li class="wow fadeInUp" data-wow-delay=".45s">
                                <i class="lni lni-checkmark-circle"></i>
                                Pemeriksaan kesehatan reproduksi
                            </li>
                            <li class="wow fadeInUp" data-wow-delay=".45s">
                                <i class="lni lni-checkmark-circle"></i>
                                Konsultasi keluarga berencana (KB)
                            </li>
                        </ul>
                        <a href="#0" class="button button-lg radius-10 wow fadeInUp" data-wow-delay=".5s">Learn More</a>
                    </div>
                </div>
                <div class="col-xl-7 col-lg-6">
                    <div class="about-image text-lg-right wow fadeInUp" data-wow-delay=".5s">
                        <img src="assets/img/about/about-4/vector2.svg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ========================= about style-4 end ========================= -->

    <!-- ========================= Daftar style-4 start ========================= -->
    <section id="Daftar" class="pricing-section pricing-style-4 bg-light py-5">
        <div class="container">
            <h2 class="text-center mb-5 fw-bold">📝 Pendaftaran Antrian</h2>

            @if(session('success'))
            <div class="alert alert-success text-center">{{ session('success') }}</div>
            @endif

            <div class="row justify-content-center">
                <div class="col-md-8">
                    <form action="{{ route('landing.storeAntrian') }}" method="POST" class="card p-4 shadow border-0 rounded-4 bg-white">
                        @csrf

                        <div class="mb-4">
                            <label for="nomor_antrian" class="form-label fw-semibold">🆔 Nomor Antrian</label>
                            <input type="text" readonly class="form-control bg-light border-0 fw-bold" id="nomor_antrian" name="nomor_antrian" value="{{ $nextNomorFormatted }}">
                        </div>

                        <div class="mb-4">
                            <label for="nama" class="form-label fw-semibold">👤 Nama Lengkap</label>
                            <input type="text" class="form-control" id="nama" name="nama" required placeholder="Masukkan nama lengkap Anda">
                        </div>

                        <div class="mb-4">
                            <label for="keluhan" class="form-label fw-semibold">💬 Keluhan</label>
                            <textarea class="form-control" id="keluhan" name="keluhan" rows="3" required placeholder="Tuliskan keluhan Anda..."></textarea>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label for="waktu_periksa" class="form-label fw-semibold">⏰ Waktu Periksa</label>
                                <select class="form-select" id="waktu_periksa" name="waktu_periksa" required>
                                    <option selected disabled>-- Pilih Waktu --</option>
                                    <option value="pagi">Pagi</option>
                                    <option value="sore">Sore</option>
                                </select>
                            </div>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary px-5 py-2 rounded-pill fw-bold">
                                ✅ Daftar Sekarang
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- ========================= pricing style-4 end ========================= -->

    <!-- ========================= Daftar Antrian Hari Ini ========================= -->
    <section id="ListAntrian" class="py-5 bg-white">
        <div class="container">
            <h2 class="text-center mb-4 fw-bold">📋 Daftar Antrian Hari Ini</h2>

            <!-- Filter sesi -->
            <form method="GET" action="{{ route('landing.index') }}" class="mb-4 text-end">
                <div class="row g-2 justify-content-end align-items-center">
                    <div class="col-auto">
                        <select name="sesi" class="form-select" onchange="this.form.submit()">
                            <option value="">🔍 Semua Sesi</option>
                            <option value="pagi" {{ request('sesi') == 'pagi' ? 'selected' : '' }}>🌅 Sesi Pagi</option>
                            <option value="sore" {{ request('sesi') == 'sore' ? 'selected' : '' }}>🌇 Sesi Sore</option>
                        </select>
                    </div>
                </div>
            </form>

            <h5 class="text-center mb-3">
                Menampilkan antrian hari ini
                @if($selectedSesi)
                untuk sesi <strong>{{ ucfirst($selectedSesi) }}</strong>
                @else
                untuk semua sesi
                @endif
            </h5>

            @if($antrians->isEmpty())
            <div class="alert alert-info text-center">Belum ada antrian hari ini.</div>
            @else
            <div class="table-responsive">
                <table class="table table-hover align-middle text-center shadow-sm rounded-4 overflow-hidden">
                    <thead class="table-light border-bottom border-2">
                        <tr class="text-secondary small text-uppercase">
                            <th>#</th>
                            <th>Nomor</th>
                            <th>Nama</th>
                            <th>Keluhan</th>
                            <th>Hari</th>
                            <th>Waktu</th>
                            <th>Daftar</th>
                        </tr>
                    </thead>
                    <tbody class="fw-medium">
                        @foreach($antrians as $index => $antrian)
                        <tr class="align-middle">
                            <td class="text-muted">{{ $index + 1 }}</td>
                            <td>
                                <span class="badge bg-primary-subtle text-primary fw-bold px-3 py-2 rounded-pill">
                                    {{ $antrian->nomor_antrian }}
                                </span>
                            </td>
                            <td class="text-start">{{ $antrian->nama }}</td>
                            <td class="text-start">{{ $antrian->keluhan }}</td>
                            <td>{{ ucfirst($antrian->hari_periksa) }}</td>
                            <td>
                                @if($antrian->waktu_periksa === 'pagi')
                                <span class="badge bg-success-subtle text-success px-2">🌅 Pagi</span>
                                @else
                                <span class="badge bg-primary-subtle text-primary px-2">🌇 Sore</span>
                                @endif
                            </td>
                            <td class="text-muted small">
                                {{ \Carbon\Carbon::parse($antrian->created_at)->format('d-m-Y H:i') }}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @endif
        </div>
    </section>
    <!-- ========================= Daftar Antrian ========================= -->

    <!-- ========================= contact-style-3 start ========================= -->
    <section id="contact" class="contact-section contact-style-3">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xxl-5 col-xl-5 col-lg-7 col-md-10">
                    <div class="section-title text-center mb-50">
                        <h3 class="mb-15">Hubungi Kami</h3>
                        <p>
                            Silakan hubungi kami jika Anda mengalami kendala dalam penggunaan sistem. Tim kami siap membantu memastikan layanan berjalan lancar dan nyaman untuk Anda.
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <div class="contact-form-wrapper">
                        <form action="assets/php/contact.php" method="POST">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="single-input">
                                        <input type="text" id="name" name="name" class="form-input" placeholder="Nama">
                                        <i class="lni lni-user"></i>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="single-input">
                                        <input type="email" id="email" name="email" class="form-input" placeholder="Email">
                                        <i class="lni lni-envelope"></i>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="single-input">
                                        <input type="text" id="number" name="number" class="form-input" placeholder="Nomor Telepon">
                                        <i class="lni lni-phone"></i>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="single-input">
                                        <input type="text" id="subject" name="subject" class="form-input" placeholder="Subjek">
                                        <i class="lni lni-text-format"></i>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="single-input">
                                        <textarea name="message" id="message" class="form-input" placeholder="Pesan" rows="6"></textarea>
                                        <i class="lni lni-comments-alt"></i>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-button">
                                        <button type="submit" class="button"> <i class="lni lni-telegram-original"></i> Kirim</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="left-wrapper">
                        <div class="row">
                            <div class="col-lg-12 col-md-6">
                                <div class="single-item">
                                    <div class="icon">
                                        <i class="lni lni-phone"></i>
                                    </div>
                                    <div class="text">
                                        <p>0045939863784</p>
                                        <p>+004389478327</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-6">
                                <div class="single-item">
                                    <div class="icon">
                                        <i class="lni lni-envelope"></i>
                                    </div>
                                    <div class="text">
                                        <p>yourmail@gmail.com</p>
                                        <p>admin@yourwebsite.com</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-6">
                                <div class="single-item">
                                    <div class="icon">
                                        <i class="lni lni-map-marker"></i>
                                    </div>
                                    <div class="text">
                                        <p>Rumah John, Jalan 13/5, Sidney, Amerika Serikat</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ========================= contact-style-3 end ========================= -->

    <!-- ========================= clients-logo start ========================= -->
    <section class="clients-logo-section pt-100 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="client-logo wow fadeInUp" data-wow-delay=".2s">
                        <img src="assets/img/clients/brands.svg" alt="" class="w-100">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ========================= clients-logo end ========================= -->

    <!-- ========================= footer style-4 start ========================= -->
    <footer class="footer footer-style-4">
        <div class="container">
            <div class="widget-wrapper">
                <div class="row">
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="footer-widget wow fadeInUp" data-wow-delay=".2s">
                            <div class="logo">
                                <a href="#0"> <img src="assets/img/logo/logo.svg" alt=""> </a>
                            </div>
                            <p class="desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Facilisis nulla placerat amet amet congue.</p>
                            <ul class="socials">
                                <li> <a href="#0"> <i class="lni lni-facebook-filled"></i> </a> </li>
                                <li> <a href="#0"> <i class="lni lni-twitter-filled"></i> </a> </li>
                                <li> <a href="#0"> <i class="lni lni-instagram-filled"></i> </a> </li>
                                <li> <a href="#0"> <i class="lni lni-linkedin-original"></i> </a> </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-2 offset-xl-1 col-lg-2 col-md-6 col-sm-6">
                        <div class="footer-widget wow fadeInUp" data-wow-delay=".3s">
                            <h6>Quick Link</h6>
                            <ul class="links">
                                <li> <a href="#0">Beranda</a> </li>
                                <li> <a href="#0">About</a> </li>
                                <li> <a href="#0">Service</a> </li>
                                <li> <a href="#0">Testimonial</a> </li>
                                <li> <a href="#0">Contact</a> </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                        <div class="footer-widget wow fadeInUp" data-wow-delay=".4s">
                            <h6>Services</h6>
                            <ul class="links">
                                <li> <a href="#0">Web Design</a> </li>
                                <li> <a href="#0">Web Development</a> </li>
                                <li> <a href="#0">Seo Optimization</a> </li>
                                <li> <a href="#0">Blog Writing</a> </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6">
                        <div class="footer-widget wow fadeInUp" data-wow-delay=".5s">
                            <h6>Download App</h6>
                            <ul class="download-app">
                                <li>
                                    <a href="#0">
                                        <span class="icon"><i class="lni lni-apple"></i></span>
                                        <span class="text">Download on the <b>App Store</b> </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#0">
                                        <span class="icon"><i class="lni lni-play-store"></i></span>
                                        <span class="text">GET IT ON <b>Play Store</b> </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="copyright-wrapper wow fadeInUp" data-wow-delay=".2s">
                <p>Design and Developed by <a href="https://uideck.com" rel="nofollow" target="_blank">UIdeck</a> Built-with <a href="https://uideck.com" rel="nofollow" target="_blank">Lindy UI Kit</a></p>
            </div>
        </div>
    </footer>
    <!-- ========================= footer style-4 end ========================= -->

    <!-- ========================= scroll-top start ========================= -->
    <a href="#" class="scroll-top"> <i class="lni lni-chevron-up"></i> </a>
    <!-- ========================= scroll-top end ========================= -->


    <!-- ========================= JS here ========================= -->
    <script src="assets/js/bootstrap-5.0.0-beta1.min.js"></script>
    <script src="assets/js/tiny-slider.js"></script>
    <script src="assets/js/wow.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>

</html>