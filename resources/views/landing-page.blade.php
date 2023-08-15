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
    <title>Cuba - Premium Admin Template</title>
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
              <nav class="navbar navbar-b navbar-dark navbar-trans navbar-expand-xl fixed-top nav-padding" id="sidebar-menu"><a class="navbar-brand p-0" href="#"><img class="logo" height="60" src="{{ asset('assets/images/landing/yourlogo.png') }}" alt=""></a>
                <button class="navbar-toggler navabr_btn-set custom_nav" type="button" data-bs-toggle="collapse" data-bs-target="#navbarDefault" aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation"><span></span><span></span><span></span></button>
                <div class="navbar-collapse justify-content-center collapse hidenav" id="navbarDefault">
                  <ul class="navbar-nav navbar_nav_modify" id="scroll-spy">
                    <li class="nav-item"><a class="nav-link" href="#">Struktur</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Faq</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Panduan</a></li>
                  </ul>
                </div>
                <div class="buy-btn rounded-pill"><a class="nav-link js-scroll" href="#" target="_blank">Login</a></div>
              </nav>
            </header>
          </div>
          <div class="row justify-content-center h-100 d-flex flex-column justify-content-center align-items-center gap-3">
            <div class="col-lg-8 col-sm-10">
              <div class="content text-center">
                <div>
                  <h6 class="content-title"><img class="arrow-decore" src="{{ asset('assets/images/landing/decore/arrow.svg') }}" alt=""><span class="sub-title">Selamat Datang</span></h6>
                  <h1 class="wow fadeIn">Bergabunglah dengan <span>ORMAWA</span> Kami untuk Kegiatan Seru</h1>
                  <p class="mt-3 wow fadeIn">Temukan peluang, ikuti acara menarik, dan berkontribusi bersama kami di Organisasi Mahasiswa Universitas SV-IPB.</p>
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
            <div class="col-sm-12"> 
              <div class="landing-title">
                <h5 class="sub-title">Mendorong Mahasiswa melalui</h5>
                <h2> <span class="gradient-1">Inisiatif </span>Inovatif</h2>
                <p>Organisasi Mahasiswa (ORMAWA) kami berkomitmen untuk mewujudkan kehidupan kampus yang bersemangat dan memberikan peluang unik bagi pertumbuhan pribadi dan profesional.</p>
              </div>
              {{-- <div class="vector-image"> <img src="{{ asset('assets/images/landing/vectors/1.svg') }}" alt=""></div> --}}
            </div>
            <div class="col-xxl-8">
              <div class="row g-lg-5 g-3">
                <div class="col-md-3 col-6">
                  <div class="benefit-box pink">
                    <h2 class="mb-0 d-flex flex-column align-items-center gap-3">
                      <i class="fa fa-users fs-1"></i>
                      15
                    </h2>
                    <h6 class="mb-0">Ormawa</h6>
                  </div>
                </div>
                <div class="col-md-3 col-6">
                  <div class="benefit-box purple">
                    <h2 class="mb-0 d-flex flex-column align-items-center gap-3">
                      <i class="fa fa-users fs-1"></i>
                      55
                    </h2>
                    <h6 class="mb-0">Departemen</h6>
                  </div>
                </div>
                <div class="col-md-3 col-6">
                  <div class="benefit-box red">
                    <h2 class="mb-0 d-flex flex-column align-items-center gap-3">
                      <i class="fa fa-users fs-1"></i>
                      128
                    </h2>
                    <h6 class="mb-0">Proker</h6>
                  </div>
                </div>
                <div class="col-md-3 col-6">
                  <div class="benefit-box warning">
                    <h2 class="mb-0 d-flex flex-column align-items-center gap-3">
                      <i class="fa fa-users fs-1"></i>
                      344
                    </h2>
                    <h6 class="mb-0">Mahasiswa</h6>
                  </div>
                </div>
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
                <h2>Potensi Diri dan Pengalaman Kampus Lebih Berarti dengan <span class="gradient-6">Kegiatan ORMWA yang Menarik dan Bermakna.</span></h2><img class="title-img d-sm-block d-none" src="{{ asset('assets/images/landing/decore/arrow-4.svg') }}" alt="">
                <h4 class="d-sm-block d-none sub-title rotate-title mb-0">Tingkatkan Perjalanan Kampus Anda Bersama Kami.</h4>
              </div>
            </div>
          </div>
          <div class="row g-4"> 
            <div class="col-md-6"> 
              <div class="build-image"> <img src="{{ asset('assets/images/landing/ormawa.png') }}" alt="Gambar ORMWA"></div>
            </div>
            <div class="col-md-6"> 
              <div class="build-content text-end"> 
                <p class="f-light mb-0">Bergabunglah dengan ORMWA kami untuk ikut serta dalam beragam acara menarik, workshop, dan proyek komunitas. Berkolaborasi dengan teman sejawat yang memiliki semangat yang sama dan berikan dampak positif pada kehidupan kampus. Temukan passion dan potensi kepemimpinan Anda bersama kami!</p>
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
                <li class="nav-item" role="presentation">
                  <button class="nav-link active" id="" data-bs-toggle="tab" data-bs-target="#om1" type="button" role="tab" aria-controls="html" aria-selected="true"><img src="" alt=""><span>Ormawa 1</span></button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="" data-bs-toggle="tab" data-bs-target="#om2" type="button" role="tab" aria-controls="react" aria-selected="false"><img src="" alt=""><span>Ormawa 2</span></button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="" data-bs-toggle="tab" data-bs-target="#om3" type="button" role="tab" aria-controls="angular" aria-selected="false"><img src="" alt=""><span>Ormawa 3</span></button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="" data-bs-toggle="tab" data-bs-target="#om4" type="button" role="tab" aria-controls="vue" aria-selected="false"><img src="" alt=""><span>Ormawa 4</span></button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="" data-bs-toggle="tab" data-bs-target="#om5" type="button" role="tab" aria-controls="laravel" aria-selected="false"><img src="" alt=""><span>Ormawa 5</span></button>
                </li>
              </ul>
              <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="om1" role="tabpanel" aria-labelledby="om1-tab">
                  <div class="row g-xxl-5 g-4">
                    <div class="col-xxl-4 col-md-6"> 
                      <div class="framework-box">
                        <div class="frame-details">
                          <h5>Departemen</h5>
                          <p class="f-light">
                            The superset CSS makes it simple to develop and usefulness 
                            with variables, selectors, and nesting.
                          </p>
                        </div>
                      </div>
                    </div>
                    <div class="col-xxl-4 col-md-6"> 
                      <div class="framework-box">
                        <div class="frame-details">
                          <h5>Departemen</h5>
                          <p class="f-light">
                            It is designed to generate responsive front-end web development that is mobile-friendly.</p>
                        </div>
                      </div>
                    </div>
                    <div class="col-xxl-4 col-md-6"> 
                      <div class="framework-box">
                        <div class="frame-details">
                          <h5>Departemen</h5>
                          <p class="f-light">
                            Pug.js enables generating dynamic data and developing adaptable HTML code.The overall productivity increases.</p>
                        </div>
                      </div>
                    </div>
                    <div class="col-xxl-4 col-md-6"> 
                      <div class="framework-box">
                        <div class="frame-details">
                          <h5>Departemen</h5>
                          <p class="f-light">Node.js source code or a pre-built installer for your platform, and start developing today</p>
                        </div>
                      </div>
                    </div>
                    <div class="col-xxl-4 col-md-6"> 
                      <div class="framework-box">
                        <div class="frame-details">
                          <h5>Departemen</h5>
                          <p class="f-light">It is a very useful tool that makes code compilation simple, especially when creating back-end programmes.</p>
                        </div>
                      </div>
                    </div>
                    <div class="col-xxl-4 col-md-6"> 
                      <div class="framework-box">
                        <div class="frame-details">
                          <h5>Departemen</h5>
                          <p class="f-light">
                            To facilitate form access and modification, the fields and field labels are 
                            logically arranged.
                          </p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="tab-pane fade" id="om2" role="tabpanel" aria-labelledby="om2-tab">
                  <div class="row g-xxl-5 g-4">
                    <div class="col-xxl-4 col-md-6"> 
                      <div class="framework-box">
                        <div class="frame-details">
                          <h5>Departemen</h5>
                          <p class="f-light">A component has many different phases of its life, react hook helps us to run some functionality at a particular phase.</p>
                        </div>
                      </div>
                    </div>
                    <div class="col-xxl-4 col-md-6"> 
                      <div class="framework-box">
                        <div class="frame-details">
                          <h5>Departemen</h5>
                          <p class="f-light">Designing will pure css is a hassle, React Strap reduces this inconvenience and speeds up the designing process.</p>
                        </div>
                      </div>
                    </div>
                    <div class="col-xxl-4 col-md-6"> 
                      <div class="framework-box">
                        <div class="frame-details">
                          <h5>Departemen</h5>
                          <p class="f-light">JQuery interferes with javascript of react sometimes.we made sure that it does'nt do that.</p>
                        </div>
                      </div>
                    </div>
                    <div class="col-xxl-4 col-md-6"> 
                      <div class="framework-box">
                        <div class="frame-details">
                          <h5>Departemen</h5>
                          <p class="f-light">Used for state management. Helps with defining global variables and manipulating them.</p>
                        </div>
                      </div>
                    </div>
                    <div class="col-xxl-4 col-md-6"> 
                      <div class="framework-box">
                        <div class="frame-details">
                          <h5>Departemen</h5>
                          <p class="f-light">Online database of Firebase has been used for authentication, making authentication reliable and more secure.</p>
                        </div>
                      </div>
                    </div>
                    <div class="col-xxl-4 col-md-6"> 
                      <div class="framework-box">
                        <div class="frame-details">
                          <h5>Departemen</h5>
                          <p class="f-light">Crud has been explained using a simple to-do application and has been integrated with firebase/firestore.</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="tab-pane fade" id="om3" role="tabpanel" aria-labelledby="om3-tab">
                  <div class="row g-xxl-5 g-4">
                    <div class="col-xxl-4 col-md-6"> 
                      <div class="framework-box">
                        <div class="frame-details">
                          <h5>Departemen</h5>
                          <p class="f-light">To make it easier of designers to style our website. It allows us to use things like variables , inline imports and many other things.</p>
                        </div>
                      </div>
                    </div>
                    <div class="col-xxl-4 col-md-6"> 
                      <div class="framework-box">
                        <div class="frame-details">
                          <h5>Departemen</h5>
                          <p class="f-light">Allowing us to write pre-made classes to style our theme and also add some functionalities as well.</p>
                        </div>
                      </div>
                    </div>
                    <div class="col-xxl-4 col-md-6"> 
                      <div class="framework-box">
                        <div class="frame-details">
                          <h5>Departemen</h5>
                          <p class="f-light">Router attaches components to some paths, through this paths , components can now be viewed.</p>
                        </div>
                      </div>
                    </div>
                    <div class="col-xxl-4 col-md-6"> 
                      <div class="framework-box">
                        <div class="frame-details">
                          <h5>Departemen</h5>
                          <p class="f-light">Admin requires many pages with input fields to enter and manage the data. Many forms styles and functionalities related to it has been included.</p>
                        </div>
                      </div>
                    </div>
                    <div class="col-xxl-4 col-md-6"> 
                      <div class="framework-box">
                        <div class="frame-details">
                          <h5>Departemen</h5>
                          <p class="f-light">To visualize data in more attractive manner, we have provided Apex charts. Many different chart options are available in apex chart.</p>
                        </div>
                      </div>
                    </div>
                    <div class="col-xxl-4 col-md-6"> 
                      <div class="framework-box">
                        <div class="frame-details">
                          <h5>Departemen</h5>
                          <p class="f-light">Not happy with just one chart option? We have got more. Chart.js has also been given as an alternative to create beautiful charts.</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="tab-pane fade" id="om4" role="tabpanel" aria-labelledby="om4-tab">
                  <div class="row g-xxl-5 g-4">
                    <div class="col-xxl-4 col-md-6"> 
                      <div class="framework-box">
                        <div class="frame-details">
                          <h5>Departemen</h5>
                          <p class="f-light">An online database , easier to use, easier to maintain, with multiple different uses. We have used it for an example of CRUD.</p>
                        </div>
                      </div>
                    </div>
                    <div class="col-xxl-4 col-md-6"> 
                      <div class="framework-box">
                        <div class="frame-details">
                          <h5>Departemen</h5>
                          <p class="f-light">JQuery interferes with javascript of Vue sometimes.we made sure that it does'nt do that. How? We have not used it in our theme.</p>
                        </div>
                      </div>
                    </div>
                    <div class="col-xxl-4 col-md-6"> 
                      <div class="framework-box">
                        <div class="frame-details">
                          <h5>Departemen</h5>
                          <p class="f-light">Allowing us to write pre-made classes to style our theme and also add some functionalities as well.</p>
                        </div>
                      </div>
                    </div>
                    <div class="col-xxl-4 col-md-6"> 
                      <div class="framework-box">
                        <div class="frame-details">
                          <h5>Departemen</h5>
                          <p class="f-light">Used for state management.Allowing us to access variables stored in vuex anywhere.</p>
                        </div>
                      </div>
                    </div>
                    <div class="col-xxl-4 col-md-6"> 
                      <div class="framework-box">
                        <div class="frame-details">
                          <h5>Departemen</h5>
                          <p class="f-light">A Design of a chat application has been given, so that you can create your own chat app in your theme.</p>
                        </div>
                      </div>
                    </div>
                    <div class="col-xxl-4 col-md-6"> 
                      <div class="framework-box">
                        <div class="frame-details">
                          <h5>Departemen</h5>
                          <p class="f-light">Used for making the site more interactive. more efficiently to display data more less space and in a more visually pleasing way.</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="tab-pane fade" id="om5" role="tabpanel" aria-labelledby="om5-tab">
                  <div class="row g-xxl-5 g-4">
                    <div class="col-xxl-4 col-md-6"> 
                      <div class="framework-box">
                        <div class="frame-details">
                          <h5>Departemen</h5>
                          <p class="f-light">Laravel has been one of the most prevalent PHP frameworks for a long time now</p>
                        </div>
                      </div>
                    </div>
                    <div class="col-xxl-4 col-md-6"> 
                      <div class="framework-box">
                        <div class="frame-details">
                          <h5>Departemen</h5>
                          <p class="f-light">
                            It is designed to generate responsive front-end web development that is mobile-friendly.</p>
                        </div>
                      </div>
                    </div>
                    <div class="col-xxl-4 col-md-6"> 
                      <div class="framework-box">
                        <div class="frame-details">
                          <h5>Departemen</h5>
                          <p class="f-light">Blade is the simple, yet powerful templating engine that is included with Laravel.</p>
                        </div>
                      </div>
                    </div>
                    <div class="col-xxl-4 col-md-6"> 
                      <div class="framework-box">
                        <div class="frame-details">
                          <h5>Departemen</h5>
                          <p class="f-light">
                            To facilitate form access and modification, the fields and field labels are 
                            logically arranged.
                          </p>
                        </div>
                      </div>
                    </div>
                    <div class="col-xxl-4 col-md-6"> 
                      <div class="framework-box">
                        <div class="frame-details">
                          <h5>Departemen</h5>
                          <p class="f-light">
                            It also has its own special characteristics that will make the data genuinely interactive.</p>
                        </div>
                      </div>
                    </div>
                    <div class="col-xxl-4 col-md-6"> 
                      <div class="framework-box">
                        <div class="frame-details">
                          <h5>Departemen</h5>
                          <p class="f-light">
                            It makes data visualisation simple. It offers 8 different chart kinds, all of which are responsive.</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
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
                      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faqOne" aria-expanded="true" aria-controls="faqOne">Bagaimana cara ikut serta dalam kegiatan ORMWA?</button>
                    </h2>
                    <div class="accordion-collapse collapse show" id="faqOne" aria-labelledby="faq1" data-bs-parent="#faqaccordion">
                      <div class="accordion-body f-light">
                        Kami mengundang semua mahasiswa untuk berpartisipasi dalam kegiatan ORMWA. Anda dapat bergabung dengan menghadiri acara, workshop, dan pertemuan, atau menjadi anggota dari departemen tertentu yang menarik bagi Anda.
                      </div>
                    </div>
                  </div>
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="faq2">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqTwo" aria-expanded="false" aria-controls="faqTwo">Berapa lama waktu yang diperlukan untuk merencanakan dan mengorganisir suatu acara?</button>
                    </h2>
                    <div class="accordion-collapse collapse" id="faqTwo" aria-labelledby="faq2" data-bs-parent="#faqaccordion">
                      <div class="accordion-body f-light">
                        Waktu yang dibutuhkan untuk merencanakan dan mengorganisir acara bervariasi tergantung pada skala dan sifat acaranya. Acara sederhana mungkin memerlukan beberapa minggu, sedangkan acara besar bisa memakan waktu beberapa bulan persiapan.
                      </div>
                    </div>
                  </div>
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="faq3">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqThree" aria-expanded="false" aria-controls="faqThree">Apakah ada biaya keanggotaan untuk bergabung dengan departemen?</button>
                    </h2>
                    <div class="accordion-collapse collapse" id="faqThree" aria-labelledby="faq3" data-bs-parent="#faqaccordion">
                      <div class="accordion-body f-light">
                        Ya, mungkin ada biaya keanggotaan yang terkait dengan bergabung dengan beberapa departemen untuk menutupi biaya operasional dan kegiatan. Namun, kami berusaha menjaga agar biaya ini terjangkau bagi semua mahasiswa.
                      </div>
                    </div>
                  </div>
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="faq4">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqFour" aria-expanded="false" aria-controls="faqFour">Bagaimana cara mengusulkan inisiatif baru di dalam departemen?</button>
                    </h2>
                    <div class="accordion-collapse collapse" id="faqFour" aria-labelledby="faq4" data-bs-parent="#faqaccordion">
                      <div class="accordion-body f-light">
                        Jika Anda memiliki ide untuk inisiatif baru, Anda dapat mendiskusikannya dengan koordinator departemen atau tim eksekutif. Mereka dapat membimbing Anda melalui proses mengusulkan dan melaksanakan ide Anda.
                      </div>
                    </div>
                  </div>
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="faq5">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqFive" aria-expanded="false" aria-controls="faqFive">Apakah saya bisa berkolaborasi dengan departemen lain untuk acara?</button>
                    </h2>
                    <div class="accordion-collapse collapse" id="faqFive" aria-labelledby="faq5" data-bs-parent="#faqaccordion">
                      <div class="accordion-body f-light">
                        Tentu! Kami mendorong kolaborasi lintas departemen untuk menciptakan acara yang beragam dan menarik. Jika Anda memiliki ide untuk acara bersama, Anda dapat menghubungi departemen terkait untuk berkoordinasi.
                      </div>
                    </div>
                  </div>
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="faq6">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqSix" aria-expanded="false" aria-controls="faqSix">Bagaimana saya bisa menjadi bagian dari tim eksekutif ORMWA?</button>
                    </h2>
                    <div class="accordion-collapse collapse" id="faqSix" aria-labelledby="faq6" data-bs-parent="#faqaccordion">
                      <div class="accordion-body f-light">
                        Jika Anda tertarik untuk menjadi bagian dari tim eksekutif ORMWA, biasanya kami mengadakan pemilihan setiap tahun. Anda dapat memantau pengumuman pemilihan dan mengikuti proses yang ditentukan untuk mendaftar sebagai calon anggota tim eksekutif.
                      </div>
                    </div>
                  </div>
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="faq7">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqSeven" aria-expanded="false" aria-controls="faqSeven">Apakah ada kesempatan magang di departemen tertentu?</button>
                    </h2>
                    <div class="accordion-collapse collapse" id="faqSeven" aria-labelledby="faq7" data-bs-parent="#faqaccordion">
                      <div class="accordion-body f-light">
                        Ya, beberapa departemen menawarkan kesempatan magang bagi mahasiswa yang ingin mendapatkan pengalaman praktis dalam bidang yang relevan. Anda dapat mencari informasi lebih lanjut tentang kesempatan magang di departemen yang Anda minati.
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