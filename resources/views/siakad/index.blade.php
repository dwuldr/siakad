<!doctype html>
<html lang="en">
<head>

    <!--====== Required meta tags ======-->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--====== Title ======-->
    <title>Sistem Informasi Akademik</title>

    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="{{asset('template/images/favicon.png')}}" type="image/png">

    <!--====== Slick css ======-->
    <link rel="stylesheet" href="{{asset('template/css/slick.css')}}">

    <!--====== Animate css ======-->
    <link rel="stylesheet" href="{{asset('template/css/animate.css')}}">

    <!--====== Nice Select css ======-->
    <link rel="stylesheet" href="{{asset('template/css/nice-select.css')}}">

    <!--====== Nice Number css ======-->
    <link rel="stylesheet" href="{{asset('template/css/jquery.nice-number.min.css')}}">

    <!--====== Magnific Popup css ======-->
    <link rel="stylesheet" href="{{asset('template/css/magnific-popup.css')}}">

    <!--====== Bootstrap css ======-->
    <link rel="stylesheet" href="{{asset('template/css/bootstrap.min.css')}}">

    <!--====== Fontawesome css ======-->
    <link rel="stylesheet" href="{{asset('template/css/font-awesome.min.css')}}">

    <!--====== Default css ======-->
    <link rel="stylesheet" href="{{asset('template/css/default.css')}}">

    <!--====== Style css ======-->
    <link rel="stylesheet" href="{{asset('template/css/style.css')}}">

    <!--====== Responsive css ======-->
    <link rel="stylesheet" href="{{asset('template/css/responsive.css')}}">


</head>

<body>

    <!--====== PRELOADER PART START ======-->

    <div class="preloader">
        <div class="loader rubix-cube">
            <div class="layer layer-1"></div>
            <div class="layer layer-2"></div>
            <div class="layer layer-3 color-1"></div>
            <div class="layer layer-4"></div>
            <div class="layer layer-5"></div>
            <div class="layer layer-6"></div>
            <div class="layer layer-7"></div>
            <div class="layer layer-8"></div>
        </div>
    </div>

    <!--====== PRELOADER PART START ======-->

    <!--====== HEADER PART START ======-->

    <header id="header-part">

        <div class="header-top d-none d-lg-block">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="header-contact text-lg-left text-center">
                            <ul>
                                <li><img src="{{asset('template/images/all-icon/map.png')}}" alt="icon"><span>JL.RAYA PARANG-SAMPUNG KM.2 DS.BUNGKUK, KEC.PARANG</span></li>
                                <li><img src="{{asset('template/images/all-icon/email.png')}}" alt="icon"><span>mtsroudlatul@gmail.com</span></li>
                            </ul>
                        </div>
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- header top -->

        <div class="header-logo-support pt-30 pb-30">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-4">
                        <div class="logo">
                            <a href="index-2.html">
                                <img src="{{asset('template/images/logo mts-1.jpg')}}" alt="Logo">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-8">
                        <div class="support-button float-right d-none d-md-block">
                            <div class="support float-left">
                                <div class="icon">
                                    <img src="{{asset('template/images/all-icon/support.png')}}" alt="icon">
                                </div>
                                <div class="cont">
                                    <span>321 325 5678</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- header logo support -->

        <div class="navigation">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 col-md-10 col-sm-9 col-8">
                        <nav class="navbar navbar-expand-lg">
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>

                            <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                                <ul class="navbar-nav mr-auto">
                                    <li class="nav-item">
                                        <a class="active" href="index-2.html">BERANDA</a>
                                        <ul class="sub-menu">
                                            <li><a class="active" href="index-2.html">BERANDA</a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-item">
                                        <a href="/about">PROFIL SEKOLAH</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="courses.html">SEKOLAH</a>
                                        <ul class="sub-menu">
                                            <li><a href="courses.html">GURU</a></li>
                                            <li><a href="courses-singel.html">SISWA</a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-item">
                                        <a href="events.html">INFO</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="teachers.html">KONTAK</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="/register">PPDB ONLINE</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{url('login')}}">LOGIN</a>
                                    </li>

                                </ul>
                            </div>
                        </nav> <!-- nav -->
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-3 col-4">
                        <div class="right-icon text-right">
                            <ul>
                                <li><a href="#" id="search"><i class="fa fa-search"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-bag"></i><span>0</span></a></li>
                            </ul>
                        </div> <!-- right icon -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div>

    </header>

    <!--====== HEADER PART ENDS ======-->

    <!--====== SEARCH BOX PART START ======-->

    <div class="search-box">
        <div class="serach-form">
            <div class="closebtn">
                <span></span>
                <span></span>
            </div>
            <form action="#">
                <input type="text" placeholder="Search by keyword">
                <button><i class="fa fa-search"></i></button>
            </form>
        </div> <!-- serach form -->
    </div>

    <!--====== SEARCH BOX PART ENDS ======-->

    <!--====== SLIDER PART START ======-->

    <section id="slider-part" class="slider-active">
        <div class="single-slider bg_cover pt-150" style="background-image: url(template/images/slider/mts-4.jpg)" data-overlay="4">
            <div class="container">
                <div class="row">
                    <div class="col-xl-7 col-lg-9">
                        <div class="slider-cont">
                            <h1 data-animation="bounceInLeft" data-delay="1s">MTs Roudlatul Ulum Parang</h1>
                            <p data-animation="fadeInUp" data-delay="1.3s">Sistem Informasi Akademik</p>
                            <ul>
                                <li><a data-animation="fadeInUp" data-delay="1.6s" class="main-btn" href="#">Read More</a></li>
                                <li><a data-animation="fadeInUp" data-delay="1.9s" class="main-btn main-btn-2" href="#">Get Started</a></li>
                            </ul>
                        </div>
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- single slider -->


    </section>

    <!--====== SLIDER PART ENDS ======-->

    <!--====== CATEGORY PART START ======-->



    <!--====== CATEGORY PART ENDS ======-->

    <!--====== ABOUT PART START ======-->


    <!--====== ABOUT PART ENDS ======-->

    <!--====== APPLY PART START ======-->


    <!--====== APPLY PART ENDS ======-->

    <!--====== COURSE PART START ======-->

    <!--====== COURSE PART ENDS ======-->

    <!--====== VIDEO FEATURE PART START ======-->

    <section id="video-feature" class="bg_cover pt-60 pb-110" style="background-image: url(template/images/mts-3.jpg)">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 order-last order-lg-first">
                    <div class="video text-lg-left text-center pt-50">
                        <a class="Video-popup" href="/template/https://www.youtube.com/watch?v=bRRtdzJH1oE"><i class="fa fa-play"></i></a>
                    </div> <!-- row -->
                </div>
                <div class="col-lg-5 offset-lg-1 order-first order-lg-last">
                    <div class="feature pt-50">
                        <div class="feature-title">
                            <h3>Profil Sekolah</h3>
                        </div>
                        <ul>
                            <li>
                                <div class="singel-feature">
                                    <div class="icon">
                                        <img src="{{asset('template/images/all-icon/f-1.png')}}" alt="icon">
                                    </div>
                                    <div class="cont">
                                        <h5>Nama Sekolah</h5>
                                        <p>MTSS ROUDLOTUL ULUM PARANG</p>
                                        <h5>NPSN  </h5>
                                        <p>20582517</p>
                                        <h5>Alamat</h5>
                                        <p>JL.RAYA PARANG-SAMPUNG KM.2 DS.BUNGKUK, KEC.PARANG</p>
                                        <h5>Kodepos </h5>
                                        <p>-</p>
                                        <h5>Desa/kelurahan
                                            Bungkuk
                                            <p>Kecamatan
                                            Parang</p>
                                            <h5>Kabupaten/Kota</h5>
                                            <p>Magetan</p>
                                            <h5>Provinsi</h5>
                                            <p>Prov. Jawa Timur</p>
                                            <h5>Status Sekolah
                                                <p>SWASTA</p>
                                                <h5>WAKTU Penyelenggaraan
                                                    <p>-</p>
                                                    <h5>Jenjnag Pendidikan
                                                        <p>MTs</p>
                                    </div>
                                </div> <!-- singel feature -->
                            </li>
                        </ul>
                    </div> <!-- feature -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
        <div class="feature-bg"></div> <!-- feature bg -->
    </section>

    <!--====== VIDEO FEATURE PART ENDS ======-->

    <!--====== TEACHERS PART START ======-->

    <section id="teachers-part" class="pt-70 pb-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="section-title mt-50">
                        <h2>Guru MTs Roudlatul Ulum Parang</h2>
                    </div> <!-- section title -->
                    <div class="teachers-cont">
                        <p>Lorem ipsum gravida nibh vel velit auctor aliquetn sollicitudirem quibibendum auci elit cons equat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet . Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt  mauris. <br> <br> auci elit cons equat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet . Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt  mauris</p>

                    </div> <!-- teachers cont -->
                </div>
                <div class="col-lg-6 offset-lg-1">
                    <div class="teachers mt-20">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="singel-teachers mt-30 text-center">
                                    <div class="image">
                                        <img src="{{asset('template/images/teachers/guru1.jpg')}}" alt="Teachers">
                                    </div>
                                </div> <!-- singel teachers -->
                            </div>
                            <div class="col-sm-6">
                                <div class="singel-teachers mt-30 text-center">
                                    <div class="image">
                                        <img src="{{asset('template/images/teachers/guru2.jpg')}}" alt="Teachers">
                                    </div>
                                </div> <!-- singel teachers -->
                            </div>
                            <div class="col-sm-6">
                                <div class="singel-teachers mt-30 text-center">
                                    <div class="image">
                                        <img src="{{asset('template/images/teachers/guru3.jpg')}}" alt="Teachers">
                                    </div>
                                </div> <!-- singel teachers -->
                            </div>
                            <div class="col-sm-6">
                                <div class="singel-teachers mt-30 text-center">
                                    <div class="image">
                                        <img src="{{asset('template/images/teachers/guru4.jpg')}}" alt="Teachers">
                                    </div>
                                </div> <!-- singel teachers -->
                            </div>
                        </div> <!-- row -->
                    </div> <!-- teachers -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== TEACHERS PART ENDS ======-->

    <!--====== PUBLICATION PART START ======-->



    <!--====== PUBLICATION PART ENDS ======-->

    <!--====== TEASTIMONIAL PART START ======-->

    <section id="testimonial" class="bg_cover pt-115 pb-115" data-overlay="8" style="background-image: url(images/bg-2.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-title pb-40">
                        <h2>Siswa</h2>
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->
<div class="col-lg-6 offset-lg-1">
                    <div class="teachers mt-20">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="singel-teachers mt-30 text-center">
                                    <div class="image">
                                        <img src="{{asset('template/images/teachers/siswa1.jpg')}}" alt="Teachers">
                                    </div>
                                </div> <!-- singel teachers -->
                            </div>
                            <div class="col-sm-6">
                                <div class="singel-teachers mt-30 text-center">
                                    <div class="image">
                                        <img src="{{asset('template/images/teachers/siswa2.jpg')}}" alt="Teachers">
                                    </div>
                                </div> <!-- singel teachers -->
                            </div>
                            <div class="col-sm-6">
                                <div class="singel-teachers mt-30 text-center">
                                    <div class="image">
                                        <img src="{{asset('template/images/teachers/siswa3.jpg')}}" alt="Teachers">
                                    </div>
                                </div> <!-- singel teachers -->
                            </div>
                            <div class="col-sm-6">
                                <div class="singel-teachers mt-30 text-center">
                                    <div class="image">
                                        <img src="{{asset('template/images/teachers/siswa4.jpg')}}" alt="Teachers">
                                    </div>
                                </div> <!-- singel teachers -->
                            </div>
                            <div class="col-sm-6">
                                <div class="singel-teachers mt-30 text-center">
                                    <div class="image">
                                        <img src="{{asset('template/images/teachers/siswa5.jpg')}}" alt="Teachers">
                                    </div>
                                </div> <!-- singel teachers -->
                            </div>
                            <div class="col-sm-6">
                                <div class="singel-teachers mt-30 text-center">
                                    <div class="image">
                                        <img src="{{asset('template/images/teachers/siswa6.jpg')}}" alt="Teachers">
                                    </div>
                                </div> <!-- singel teachers -->
                            </div>
                            <div class="col-sm-6">
                                <div class="singel-teachers mt-30 text-center">
                                    <div class="image">
                                        <img src="{{asset('template/images/teachers/siswa7.jpg')}}" alt="Teachers">
                                    </div>
                                </div> <!-- singel teachers -->
                            </div>
                            <div class="col-sm-6">
                                <div class="singel-teachers mt-30 text-center">
                                    <div class="image">
                                        <img src="{{asset('template/images/teachers/siswa8.jpg')}}" alt="Teachers">
                                    </div>
                                </div> <!-- singel teachers -->
                            </div>
                        </div> <!-- row -->
                    </div> <!-- teachers -->
                </div>
        </div> <!-- container -->
    </section>

    <!--====== TEASTIMONIAL PART ENDS ======-->

    <!--====== NEWS PART START ======-->

    <section id="news-part" class="pt-115 pb-110">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-title pb-50">

                        <h2>Kegiatan</h2>
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="singel-news mt-30">
                        <div class="news-thum pb-25">
                            <img src="{{asset('template/images/news/mts-hut.jpg')}}" alt="News">
                        </div>
                        <div class="news-cont">

                            <a href="blog-singel.html"><h3>Hari Jadi MTs Roudlatul Ulum Parang</h3></a>

                        </div>
                    </div> <!-- singel news -->
                </div>
                <div class="col-lg-6">
                    <div class="singel-news news-list">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="news-thum mt-30">
                                    <img src="{{asset('template/images/news/mts-studytour.jpg')}}" alt="News">
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="news-cont mt-30">

                                    <a href="blog-singel.html"><h3>Study Tour</h3></a>
                                </div>
                            </div>
                        </div> <!-- row -->
                    </div> <!-- singel news -->
                    <div class="singel-news news-list">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="news-thum mt-30">
                                    <img src="{{asset('template/images/news/mts-pramuka.jpg')}}" alt="News">
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="news-cont mt-30">

                                    <a href="blog-singel.html"><h3>Pramuka</h3></a>
                                </div>
                            </div>
                        </div> <!-- row -->
                    </div> <!-- singel news -->
                    <div class="singel-news news-list">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="news-thum mt-30">
                                    <img src="{{asset('template/images/news/mts-drumband.jpg')}}" alt="News">
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="news-cont mt-30">

                                    <a href="blog-singel.html"><h3>Drum Band.jpg</h3></a>
                                </div>
                            </div>
                        </div> <!-- row -->
                    </div>
                    <div class="singel-news news-list">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="news-thum mt-30">
                                    <img src="{{asset('template/images/news/keg-perpisahan.jpg')}}" alt="News">
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="news-cont mt-30">

                                    <a href="blog-singel.html"><h3>Pelepasan Siswa Kelas IX</h3></a>
                                </div>
                            </div>
                        </div> <!-- row -->
                    </div>
                    <div class="singel-news news-list">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="news-thum mt-30">
                                    <img src="{{asset('template/images/news/keg-qurban.jpg')}}" alt="News">
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="news-cont mt-30">

                                    <a href="blog-singel.html"><h3>Penyembelihan Hewan Qurban</h3></a>
                                </div>
                            </div>
                        </div> <!-- row -->
                    </div> <!-- singel news -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== NEWS PART ENDS ======-->

    <!--====== PATNAR LOGO PART START ======-->


    <!--====== PATNAR LOGO PART ENDS ======-->

    <!--====== FOOTER PART START ======-->

    <footer id="footer-part">
        <div class="footer-top pt-40 pb-70">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="footer-link mt-40">
                            <div class="footer-title pb-25">
                                <h6>Sitemap</h6>
                            </div>
                            <ul>
                                <li><a href="index-2.html"><i class="fa fa-angle-right"></i>BERANDA</a></li>
                                <li><a href="about.html"><i class="fa fa-angle-right"></i>TENTANG</a></li>
                                <li><a href="courses.html"><i class="fa fa-angle-right"></i>GURU</a></li>
                                <li><a href="blog.html"><i class="fa fa-angle-right"></i>SISWA</a></li>
                                <li><a href="events.html"><i class="fa fa-angle-right"></i>INFO</a></li>
                                <li><a href="contact.html"><i class="fa fa-angle-right"></i>Contact</a></li>
                            </ul>
                        </div> <!-- footer link -->
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="footer-address mt-40">
                            <div class="footer-title pb-25">
                                <h6>Kontak Kami</h6>
                            </div>
                            <ul>
                                <li>
                                    <div class="icon">
                                        <i class="fa fa-home"></i>
                                    </div>
                                    <div class="cont">
                                        <p>JL.RAYA PARANG-SAMPUNG KM.2 DS.BUNGKUK, KEC.PARANG</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon">
                                        <i class="fa fa-phone"></i>
                                    </div>
                                    <div class="cont">
                                        <p>+3 123 456 789</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon">
                                        <i class="fa fa-envelope-o"></i>
                                    </div>
                                    <div class="cont">
                                        <p>mtsroudlatul@gmail.com</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon">
                                        <i class="fa fa-facebook-f"></i>
                                    </div>
                                    <div class="cont">
                                        <p>MTs Roudlatul Ulum Parang</p>
                                    </div>
                                </li>
                            </ul>
                        </div> <!-- footer address -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- footer top -->

        <div class="footer-copyright pt-10 pb-25">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="copyright text-md-left text-center pt-15">
                            <p><a target="_blank" href="/template/https://www.templateshub.net">Templates Hub</a> </p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="copyright text-md-right text-center pt-15">

                        </div>
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- footer copyright -->
    </footer>

    <!--====== FOOTER PART ENDS ======-->

    <!--====== BACK TO TP PART START ======-->

    <a href="#" class="back-to-top"><i class="fa fa-angle-up"></i></a>

    <!--====== BACK TO TP PART ENDS ======-->








    <!--====== jquery js ======-->
    <script src="{{asset('template/js/vendor/modernizr-3.6.0.min.js')}}"></script>
    <script src="{{asset('template/js/vendor/jquery-1.12.4.min.js')}}"></script>

    <!--====== Bootstrap js ======-->
    <script src="{{asset('template/js/bootstrap.min.js')}}"></script>

    <!--====== Slick js ======-->
    <script src="{{asset('js/slick.min.js')}}"></script>

    <!--====== Magnific Popup js ======-->
    <script src="{{asset('template/js/jquery.magnific-popup.min.js')}}"></script>

    <!--====== Counter Up js ======-->
    <script src="{{asset('template/js/waypoints.min.js')}}"></script>
    <script src="{{asset('template/js/jquery.counterup.min.js')}}"></script>

    <!--====== Nice Select js ======-->
    <script src="{{asset('template/js/jquery.nice-select.min.js')}}"></script>

    <!--====== Nice Number js ======-->
    <script src="{{asset('template/js/jquery.nice-number.min.js')}}"></script>

    <!--====== Count Down js ======-->
    <script src="{{asset('template/js/jquery.countdown.min.js')}}"></script>

    <!--====== Validator js ======-->
    <script src="{{asset('template/js/validator.min.js')}}"></script>

    <!--====== Ajax Contact js ======-->
    <script src="{{asset('template/js/ajax-contact.js')}}"></script>

    <!--====== Main js ======-->
    <script src="{{asset('template/js/main.js')}}"></script>

    <!--====== Map js ======-->
    <script src="/template/https://maps.googleapis.com/maps/api/js?key=AIzaSyDC3Ip9iVC0nIxC6V14CKLQ1HZNF_65qEQ"></script>
    <script src="{{asset('template/js/map-script.js')}}"></script>

</body>
</html>
