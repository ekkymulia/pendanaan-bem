<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Cuba admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Cuba admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="{{ asset('assets/images/favicon.png') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}" type="image/x-icon">
    <title>FORM IMOD - Akabeko Cifest KPK</title>
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900&amp;display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@700&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/font-awesome.css') }}">
    <link rel="icon" href="{{ asset('assets/svg/landing-icons.svg') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/slick.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/slick-theme.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/animate.css') }}">
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/bootstrap.css') }}">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/responsive.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/calendar.css') }}">
    <!-- Calendar JS -->
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js'></script>
    <script>
      var kalender = @json($kalenders);
    </script>
    <script>
      document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var events = []; 

        var calendar = new FullCalendar.Calendar(calendarEl, {
          initialView: 'dayGridMonth',
          events: function(info, successCallback, failureCallback) {
            $(kalender).each(function () {
              var event = {
                title: $(this).attr('event_name'),
                start: $(this).attr('event_start_date'),
                end: $(this).attr('event_end_date'),
                id: $(this).attr('id'),
                description: $(this).attr('event_description')
              };

              events.push(event);
            });

            if (successCallback) {
              successCallback(events);
            }
          }
        });

        calendar.render(); 
      });



    </script>
  </head>
  <body class="landing-page">
    <!-- tap on top starts-->
    <div class="tap-top"><i data-feather="chevrons-up"></i></div>
    <!-- tap on tap ends-->
    <!-- page-wrapper Start-->
    <div class="page-wrapper landing-page">
      <!-- Page Body Start            -->
      <div class="landing-home">
        <div class="container-fluid h-100">
          <div class="sticky-header">
            <header>                       
              <nav class="navbar navbar-b navbar-dark p-0 d-flex justify-content-between navbar-trans navbar-expand-xl fixed-top p-0 nav-padding" id="sidebar-menu">
                <a class="navbar-brand p-3 bg-white" href="#">
                  <img class="logo" height="30" src="{{ asset('assets/images/logo/ipb-full.png') }}" alt="">
                  <img class="logo" height="30" src="{{ asset('assets/images/logo/kpk.png') }}" alt="">
                  <img class="logo" height="30" src="{{ asset('assets/images/logo/akabeko.png') }}" alt="">

                </a>
                <div class="d-flex px-1 py-1 gap-5">
                  <button class="navbar-toggler navabr_btn-set custom_nav" type="button" data-bs-toggle="collapse" data-bs-target="#navbarDefault" aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation"><span></span><span></span><span></span></button>
                  <div class="navbar-collapse justify-content-center collapse hidenav" id="navbarDefault">
                    <ul class="navbar-nav navbar_nav_modify" id="scroll-spy">
                      <li class="nav-item"><a class="nav-link" href="#">Struktur</a></li>
                      <li class="nav-item"><a class="nav-link" href="#">Faq</a></li>
                      <li class="nav-item"><a class="nav-link" href="#">Panduan</a></li>
                    </ul>
                  </div>
                  <div class="buy-btn rounded-pill"><a class="nav-link js-scroll" href="{{ route('login') }}">Login</a></div>
                </div>
              </nav>
            </header>
          </div>
          <div class="row justify-content-center h-100 d-flex flex-column justify-content-center align-items-center gap-3">
            <div class="col-lg-8 col-sm-10">
              <div class="content text-center">
                <div>
                  <h6 class="content-title"><img class="arrow-decore" src="{{ asset('assets/images/landing/decore/arrow.svg') }}" alt=""><span class="sub-title">Selamat Datang</span></h6>
                  <h1 class="wow fadeIn"><span>FORM-IMoD</span> Integrity Monitoring Database</h1>
                  <p class="mt-3 wow fadeIn">merupakan website examines dalam upaya pemberantasan mahasiswa SV IPB dengan prinsip 3L (Lihat, Lawan, Laporkan).</p>
                  <div class="btn-grp mt-4">
                    <a class="wow pulse" href="{{ route('index')}}" target="_blank" data-bs-placement="top" title="Jelajahi">Jelajahi Lebih Lanjut</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-7 col-lg-8 col-md-10 d-flex justify-content-center">
              <img class="screen1 img-fluid position-absolute top-0" src="{{ asset('assets/images/landing/screen1.png') }}" alt="">
            </div>
          </div>
          
        </div>
      </div>
      <section class="section-space premium-wrap">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-12 col-sm-10"> 
              <div class="landing-title">
                <h5 class="sub-title">Mendorong Mahasiswa dalam</h5>
                <h2>Memberantas penggelembungan dana ormawa <span class="gradient-1">SV IPB</span></h2>
                <p>Berkomitmen untuk memberantas penggelembungan dana ormawa di SV IPB dalam menjunjung tinggi Integritas dan akuntabilitas bagi mahasiswa SV IPB.</p>
              </div>
              {{-- <div class="vector-image"> <img src="{{ asset('assets/images/landing/vectors/1.svg') }}" alt=""></div> --}}
            </div>
            <div class="col-xxl-8">
              <div class="row g-lg-5 g-3">
                <div class="col-md-4 col-6">
                  <div class="benefit-box pink">
                    <h2 class="mb-0 d-flex flex-column align-items-center gap-3">
                      <i class="fa fa-users fs-1"></i>
                      {{ $countOrmawa }}
                    </h2>
                    <h6 class="mb-0">Ormawa</h6>
                  </div>
                </div>
                <div class="col-md-4 col-6">
                  <div class="benefit-box purple">
                    <h2 class="mb-0 d-flex flex-column align-items-center gap-3">
                      <i class="fa fa-users fs-1"></i>
                      {{ $countDpt }}
                    </h2>
                    <h6 class="mb-0">Departemen</h6>
                  </div>
                </div>
                <div class="col-md-4 col-6">
                  <div class="benefit-box red">
                    <h2 class="mb-0 d-flex flex-column align-items-center gap-3">
                      <i class="fa fa-users fs-1"></i>
                      {{ $countProker }}
                    </h2>
                    <h6 class="mb-0">Proker</h6>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="section-space premium-wrap">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-sm-12"> 
              <h1>Calendar</h1>
              <div class="calendar-default" id="calendar-container">
                  <div id="calendar"></div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="section-space app-section pt-0" id="applications">
        <marquee class="text-marqee" direction="left"> 
          <h2 class="big-title">Akabeko Cifest kpk</h2>
        </marquee>
      </section>
      <section class="build-section"> 
        <div class="container">
          <ul class="decoration">
            <li class="loader-gif"><span class="loader-1"> </span></li>
          </ul>
          <div class="row"> 
            <div class="col-sm-12 wow pulse"> 
              <div class="landing-title text-start">
                <h2>Efesiensi dan efektifitas pendanaan ormawa <span class="gradient-6">SV IPB untuk memberikan kepercayaan bagi pemberi dana.</span></h2><img class="title-img d-sm-block d-none" src="{{ asset('assets/images/landing/decore/arrow-4.svg') }}" alt="">
                <h4 class="d-sm-block d-none sub-title rotate-title mb-0">Tingkatan Integritas akuntabilitas ormawa bersama FORM-IMoD.</h4>
              </div>
            </div>
          </div>
          <div class="row g-4"> 
            <div class="col-md-6"> 
              <div class="build-image"> <img src="{{ asset('assets/images/landing/ormawa.png') }}" alt="Gambar ORMWA"></div>
            </div>
            <div class="col-md-6"> 
              <div class="build-content text-end"> 
                <p class="f-light mb-0">Bergabunglah dengan FORM-IMoD kami untuk mewujudkan ormawa integritas dan akuntabilitas. Berkolaborasi bersama korupsi pemberantasan korupsi (KPK) sehingga dapat memberikan dampak positif bagi SV IPB dalam mewujudkan motto IPB “Inspring Inovation with Integrity”</p>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="section-space framework-section" id="frameworks">
        <div class="container">
          <ul class="decoration">
            <li class="loader-line-gif"><img src="{{ asset('assets/images/landing/gifs/6.gif') }}" alt=""></li>
            <li class="wavy-gif">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 251 38">
                <path fill="none" stroke-width="10" stroke-miterlimit="10" d="M0,9C17.93,9,17.93,29,35.85,29S53.78,9,71.71,9s17.92,20,35.85,20S125.49,9,143.42,9s17.93,20,35.86,20S197.21,9,215.14,9,233.07,29,251,29"></path>
              </svg>
            </li>
          </ul>
          <div class="row"> 
            <div class="col-sm-12"> 
              <div class="landing-title">
                <h5 class="sub-title">Jelajahi Departemen Kami</h5>
                <h2>Temukan <span class="gradient-7">Beragam Departemen</span></h2>
                <p>Temukan berbagai macam departemen di universitas kami. Setiap departemen menawarkan peluang unik untuk belajar dan berkembang.</p>
              </div>
            </div>
            <div class="col-sm-12"> 
              <ul class="nav nav-tabs frame-tab" id="myTab" role="tablist">
                @foreach ($omwsAndDpts as $omwAndDpt)
                <li class="nav-item" role="presentation">
                  <button class="nav-link active" id="" data-bs-toggle="tab" data-bs-target="#orwDpt{{$loop->iteration}}" type="button" role="tab" aria-controls="html" aria-selected="true"><img src="" alt=""><span>{{$omwAndDpt['nama']}}</span></button>
                </li>
                @endforeach
              </ul>
              <div class="tab-content" id="myTabContent">
                @foreach ($omwsAndDpts as $omwAndDpt)
                <div class="tab-pane fade show active" id="orwDpt{{ $loop->iteration }}" role="tabpanel" aria-labelledby="om1-tab">
                  <div class="row g-xxl-5 g-4">
                    @foreach ($omwAndDpt['departemens'] as $dpt)
                    <div class="col-xxl-4 col-md-6"> 
                      <div class="framework-box">
                        <div class="frame-details">
                          <h5>{{ $dpt['nama'] }}</h5>
                          <p class="f-light">{{ $dpt['deskripsi'] }}</p>
                        </div>
                      </div>
                    </div>
                    @endforeach
                  </div>
                </div>
                @endforeach
              </div>
            </div>
          </div>
        </div>
      </section>
      <div class="bottom-section-grad">
        <section class="faq-section section-space" id="faq">
          <div class="container">
            <div class="row"> 
              <div class="col-sm-12">
                <div class="landing-title text-center">
                  <h5 class="sub-title">Pertanyaan yang Sering Diajukan</h5>
                  <h2>Punya pertanyaan tentang <span class="gradient-11">ORMAWA atau Departemen?</span> Temukan jawaban Anda di sini</h2>
                  <p>Kami siap memberikan informasi yang Anda butuhkan tentang kegiatan dan layanan kami. Jangan ragu untuk menghubungi kami kapan saja!</p>
                </div>
              </div>
              <div class="col-sm-12"> 
                <div class="accordion" id="faqaccordion">
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="faq1">
                      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faqOne" aria-expanded="true" aria-controls="faqOne">Bagaimana Cara apabila lupa password?</button>
                    </h2>
                    <div class="accordion-collapse collapse show" id="faqOne" aria-labelledby="faq1" data-bs-parent="#faqaccordion">
                      <div class="accordion-body f-light">
                        Jika Anda lupa password, Anda dapat menghubungi superadmin, karena dia yang mengelola akun ormawa dan departemen. Superadmin akan membantu Anda untuk mengatur ulang password Anda.
                      </div>
                    </div>
                  </div>
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="faq2">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqTwo" aria-expanded="false" aria-controls="faqTwo">Apa itu Ormawa dan departemen?</button>
                    </h2>
                    <div class="accordion-collapse collapse" id="faqTwo" aria-labelledby="faq2" data-bs-parent="#faqaccordion">
                      <div class="accordion-body f-light">
                        Ormawa adalah singkatan dari Organisasi Mahasiswa yang merupakan organisasi di kampus yang terdiri dari berbagai departemen yang bertanggung jawab untuk mengelola kegiatan dan proyek yang berkaitan dengan bidang mereka masing-masing.
                      </div>
                    </div>
                  </div>
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="faq3">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqThree" aria-expanded="false" aria-controls="faqThree">Bagaimana Cara penggunaan Website?</button>
                    </h2>
                    <div class="accordion-collapse collapse" id="faqThree" aria-labelledby="faq3" data-bs-parent="#faqaccordion">
                      <div class="accordion-body f-light">
                        Cara penggunaan website dapat dilihat dalam panduan yang disediakan oleh admin. Anda juga dapat menghubungi admin jika Anda memiliki pertanyaan atau kesulitan dalam penggunaan website.
                      </div>
                    </div>
                  </div>
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="faq4">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqFour" aria-expanded="false" aria-controls="faqFour">Siapa yang akan mengisi RAB?</button>
                    </h2>
                    <div class="accordion-collapse collapse" id="faqFour" aria-labelledby="faq4" data-bs-parent="#faqaccordion">
                      <div class="accordion-body f-light">
                        RAB (Rencana Anggaran Biaya) biasanya diisi oleh departemen yang mengajukan proyek atau kegiatan tertentu. Departemen tersebut akan mengatur anggaran yang diperlukan untuk proyek mereka.
                      </div>
                    </div>
                  </div>
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="faq5">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqFive" aria-expanded="false" aria-controls="faqFive">Apakah KPK turut Mengawasi?</button>
                    </h2>
                    <div class="accordion-collapse collapse" id="faqFive" aria-labelledby="faq5" data-bs-parent="#faqaccordion">
                      <div class="accordion-body f-light">
                        Tidak, KPK (Komisi Pemberantasan Korupsi) tidak turut mengawasi pengelolaan dana di ormawa atau departemen kampus. Pengawasan biasanya dilakukan oleh pihak internal kampus atau pihak yang ditunjuk oleh ormawa tersebut.
                      </div>
                    </div>
                  </div>
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="faq6">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqSix" aria-expanded="false" aria-controls="faqSix">Siapa yang akan melakukan Pengecekan?</button>
                    </h2>
                    <div class="accordion-collapse collapse" id="faqSix" aria-labelledby="faq6" data-bs-parent="#faqaccordion">
                      <div class="accordion-body f-light">
                        Pengecekan anggaran dan penggunaan dana biasanya dilakukan oleh pihak internal kampus atau pihak yang ditunjuk oleh ormawa atau departemen tersebut.
                      </div>
                    </div>
                  </div>
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="faq7">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqSeven" aria-expanded="false" aria-controls="faqSeven">Berapa Jumlah Oramawa Yang terdaftar?</button>
                    </h2>
                    <div class="accordion-collapse collapse" id="faqSeven" aria-labelledby="faq7" data-bs-parent="#faqaccordion">
                      <div class="accordion-body f-light">
                        Terdapat 17 ormawa yang terdaftar di kampus ini.
                      </div>
                    </div>
                  </div>
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="faq7">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqSeven" aria-expanded="false" aria-controls="faqSeven">Siapa yang Mengisi deskripsi?</button>
                    </h2>
                    <div class="accordion-collapse collapse" id="faqSeven" aria-labelledby="faq7" data-bs-parent="#faqaccordion">
                      <div class="accordion-body f-light">
                        Deskripsi proyek atau kegiatan biasanya diisi oleh departemen yang mengajukan proyek tersebut. Deskripsi tersebut harus mencakup informasi lengkap tentang proyek atau kegiatan yang akan dilakukan.
                      </div>
                    </div>
                  </div>
                  <!-- Tambahkan pertanyaan lain sesuai kebutuhan -->
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
      <footer class="footer-bg">
        <div class="container">
          <div class="landing-center ptb50">
            <div class="landing-title">
              <h2>Bergabunglah dengan <span class="gradient-13">Komunitas Kami</span> Hari Ini</h2>
              <p>Jadilah bagian dari komunitas ORMWA yang penuh semangat, di mana inovasi dan kolaborasi tumbuh. Sambungkan diri Anda dengan kami dan berilah dampak positif!</p>
            </div>
          </div>
          <div class="sub-footer row g-2">
            <div class="col-md-6"> 
              <h6 class="mb-0">Copyright © 2023 akabeko, all rights reserved.</h6>
            </div>
            <div class="col-md-6"> 
              <ul> 
                <li> 
                  <h6 class="mb-0">Find us on </h6>
                </li>
                <li> <a href="#"><i class="fa fa-facebook-square"></i></a></li>
                <li><a href="#"> <i class="fa fa-twitter"></i></a></li>
                <li><a href="#"> <i class="fa fa-instagram"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
      </footer>      
    </div>
    <!-- latest jquery-->
    <script src="{{ asset('assets/js/jquery-3.5.1.min.js') }}"></script>
    <!-- Bootstrap js-->
    <script src="{{ asset('assets/js/bootstrap/bootstrap.bundle.min.js') }}"></script>
    <!-- feather icon js-->
    <script src="{{ asset('assets/js/icons/feather-icon/feather.min.js') }}"></script>
    <script src="{{ asset('assets/js/icons/feather-icon/feather-icon.js') }}"></script>
    <!-- Plugins JS start-->
    <script src="{{ asset('assets/js/tooltip-init.js') }}"></script>
    <script src="{{ asset('assets/js/animation/wow/wow.min.js') }}"></script>
    <script src="{{ asset('assets/js/landing_sticky.js') }}"></script>
    <script src="{{ asset('assets/js/landing.js') }}"></script>
    <script src="{{ asset('assets/js/jarallax_libs/libs.min.js') }}"></script>
    <script src="{{ asset('assets/js/slick/slick.min.js') }}"></script>
    <script src="{{ asset('assets/js/slick/slick.js') }}"></script>
    <script src="{{ asset('assets/js/landing-slick.js') }}"></script>
    <!-- Plugins JS Ends-->

  </body>
</html>