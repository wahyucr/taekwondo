<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <title>Sistem Informasi Database Taekwondo</title>

    <!-- Bootstrap core CSS -->
    <link href="/assets-lp/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="/assets-lp/css/fontawesome.css">
    <link rel="stylesheet" href="/assets-lp/css/templatemo-574-mexant.css">
    <link rel="stylesheet" href="/assets-lp/css/owl.css">
    <link rel="stylesheet" href="/assets-lp/css/animate.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css">
    <!--

TemplateMo 574 Mexant

https://templatemo.com/tm-574-mexant

-->
</head>

<body>


    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="/" class="logo">
                            <img src="/assets-lp/images/logo.jpeg" alt="Logo"
                                style="max-height: 75px; max-width: 75px;">
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="#top" class="active">Home</a></li>
                            <li class="scroll-to-section"><a href="#statistik">Statistik</a></li>
                            <li class="scroll-to-section"><a href="#services">Fitur</a></li>
                            <li><a href="/login">Login</a></li>
                        </ul>
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->

    <!-- ***** Main Banner Area Start ***** -->
    <div class="swiper-container" id="top">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <div class="slide-inner" style="background-image:url(/assets-lp/images/slide1.jpeg)">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="header-text">
                                    <h2>Sistem Informasi Database Taekwondo</h2>
                                    <div class="div-dec"></div>
                                    <p>Kelola Database Taekwondo dalam satu aplikasi</p>
                                    <div class="buttons">
                                        <div class="green-button">
                                            <a href="/login">Login </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="slide-inner" style="background-image:url(/assets-lp/images/slide2.jpeg)">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="header-text">
                                    <h2>Sistem Informasi Database Taekwondo</h2>
                                    <div class="div-dec"></div>
                                    <p>Kelola Database Taekwondo dalam satu aplikasi</p>
                                    <div class="buttons">
                                        <div class="green-button">
                                            <a href="/login">Login </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="swiper-button-next swiper-button-white"></div>
        <div class="swiper-button-prev swiper-button-white"></div>
    </div>

    <!-- ***** Main Banner Area End ***** -->


    <section class="services mb-5" id="statistik">
        <div class="container my-5">
            <div class="section-heading">
                <h4>Statistik Pengguna Aplikasi</h4>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="service-item">
                        <i class="fas fa-users-viewfinder"></i>
                        <h4>Anggota</h4>
                        <p>{{ $anggotas }}</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="service-item">
                        <i class="fas fa-users"></i>
                        <h4>Pelatih</h4>
                        <p>{{ $pelatihs }}</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="service-item">
                        <i class="fas fa-users-rectangle"></i>
                        <h4>Penguji</h4>
                        <p>{{ $pengujis }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <section class="services mb-5" id="services">
        <div class="container my-5">
            <div class="section-heading">
                <h4>Fitur Aplikasi</h4>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="service-item">
                        <i class="fas fa-users-viewfinder"></i>
                        <h4>Data Anggota</h4>
                        <p>Mengelola daftar anggota</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="service-item">
                        <i class="fas fa-users"></i>
                        <h4>Data Pelatih</h4>
                        <p>Mengelola daftar pelatih</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="service-item">
                        <i class="fas fa-users-rectangle"></i>
                        <h4>Data Penguji</h4>
                        <p>Mengelola daftar penguji UKT</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="service-item">
                        <i class="fas fa-address-card"></i>
                        <h4>Pendaftaran UKT</h4>
                        <p>Mendaftarkan peserta ujian, catat riwayat ujian, dan kelola nilai ujian dengan mudah</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="service-item">
                        <i class="fas fa-rectangle-list"></i>
                        <h4>Rekap Peserta UKT</h4>
                        <p>Melihat peserta ujian yang telah terdaftar dapat dilakukan di fitur ini.
                        </p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="service-item">
                        <i class="fas fa-file-pen"></i>
                        <h4>Lembar Penilaian</h4>
                        <p>Mengisi penilain peserta UKT dengan mudah dan teratur</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright © 2024 - Sistem Informasi Taekwondo
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <!-- Bootstrap core JavaScript -->
    <script src="/assets-lp/vendor/jquery/jquery.min.js"></script>
    <script src="/assets-lp/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="/assets-lp/js/isotope.min.js"></script>
    <script src="/assets-lp/js/owl-carousel.js"></script>

    <script src="/assets-lp/js/tabs.js"></script>
    <script src="/assets-lp/js/swiper.js"></script>
    <script src="/assets-lp/js/custom.js"></script>
    <script>
        var interleaveOffset = 0.5;

        var swiperOptions = {
            loop: true,
            speed: 1000,
            grabCursor: true,
            watchSlidesProgress: true,
            mousewheelControl: true,
            keyboardControl: true,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev"
            },
            on: {
                progress: function() {
                    var swiper = this;
                    for (var i = 0; i < swiper.slides.length; i++) {
                        var slideProgress = swiper.slides[i].progress;
                        var innerOffset = swiper.width * interleaveOffset;
                        var innerTranslate = slideProgress * innerOffset;
                        swiper.slides[i].querySelector(".slide-inner").style.transform =
                            "translate3d(" + innerTranslate + "px, 0, 0)";
                    }
                },
                touchStart: function() {
                    var swiper = this;
                    for (var i = 0; i < swiper.slides.length; i++) {
                        swiper.slides[i].style.transition = "";
                    }
                },
                setTransition: function(speed) {
                    var swiper = this;
                    for (var i = 0; i < swiper.slides.length; i++) {
                        swiper.slides[i].style.transition = speed + "ms";
                        swiper.slides[i].querySelector(".slide-inner").style.transition =
                            speed + "ms";
                    }
                }
            }
        };

        var swiper = new Swiper(".swiper-container", swiperOptions);
    </script>
</body>

</html>
