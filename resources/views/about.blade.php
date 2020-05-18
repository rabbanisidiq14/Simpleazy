@extends('layouts.index')

@section('content')

    <!-- Preloader -->
	<div class="spinner-wrapper">
        <div class="spinner">
            <div class="bounce1"></div>
            <div class="bounce2"></div>
            <div class="bounce3"></div>
        </div>
    </div>
    <!-- end of preloader -->


    <!-- Navigation -->
    <nav class="navbar navbar-expand-md navbar-dark navbar-custom fixed-top">

        <img src="https://res.cloudinary.com/nisacodelifings/image/upload/v1574399006/mars_loolb3.png" style="width: 40px;height: 40px;" alt="">
        <a class="navbar-brand logo-text page-scroll" href="{{url('home')}}"  data-aos="fade-up">Simpleazy</a>

        <!-- Mobile Menu Toggle Button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-awesome fas fa-bars"></span>
            <span class="navbar-toggler-awesome fas fa-times"></span>
        </button>
        <!-- end of mobile menu toggle button -->

        <div class="collapse navbar-collapse" id="navbarsExampleDefault" >
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="#header">Beranda <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="#features">Features</a>
                </li>

                <!-- Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" href="{{url('login')}}" id="navbarDropdown" role="button" aria-haspopup="true" aria-expanded="false" style="-webkit-box-shadow: 5px 5px 5px 0px rgba(0,0,0,0.75);
-moz-box-shadow: 5px 5px 5px 0px rgba(0,0,0,0.75);
box-shadow: 5px 5px 5px 0px rgba(0,0,0,0.75);">Sign Up/Log in</a>
                    <!-- <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="terms-conditions.html"><span class="item-text">TERMS CONDITIONS</span></a>
                        <div class="dropdown-items-divide-hr"></div>
                        <a class="dropdown-item" href="privacy-policy.html"><span class="item-text">PRIVACY POLICY</span></a>
                    </div> -->
                </li>
                <!-- end of dropdown menu -->
            </ul>

        </div>
    </nav> <!-- end of navbar -->
    <!-- end of navigation -->


    <!-- Header -->
    <header id="header" class="header" data-aos="fade-up">
        <div class="header-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="text-container thiss"  data-aos="fade-up">
                            <h1 data-aos="fade-up">Aplikasi<br>bendahara <span id="js-rotating" data-aos="fade-up">SD, SMP, SMA</span></h1>
                            <p style="text-align:justify" class="p-large">Mengolah catatan keuangan bendahara secara teratur dengan akurat tanpa repot. Pastikan walikelas-mu dapat memantaunya dan kamu bakal selalu diingetin untuk nagih kas. Kamu bisa gampang ngecek yang belum bayar kas dengan mudah lho disini</p>
                            <a class="btn-solid-lg page-scroll" style="-webkit-box-shadow: 5px 5px 5px 0px rgba(0,0,0,0.75);
-moz-box-shadow: 5px 5px 5px 0px rgba(0,0,0,0.75);
box-shadow: 5px 5px 5px 0px rgba(0,0,0,0.75);" href="{{url('login')}}">Cobain lewat website</a><br><br>
                            <!-- <a  data-aos="fade-up"class="btn-solid-lg page-scroll" href="#your-link"><i class="fab fa-google-play"></i>PLAY STORE</a> -->
                        </div>
                    </div> <!-- end of col -->
                </div> <!-- end of row -->
            </div> <!-- end of container -->
        </div> <!-- end of header-content -->
    </header> <!-- end of header -->
    <!-- end of header -->

    <!-- Scripts -->
    <script>
  AOS.init();
</script>
    <script src="js/jquery.min.js"></script> <!-- jQuery for Bootstrap's JavaScript plugins -->
    <script src="js/popper.min.js"></script> <!-- Popper tooltip library for Bootstrap -->
    <script src="js/bootstrap.min.js"></script> <!-- Bootstrap framework -->
    <script src="js/jquery.easing.min.js"></script> <!-- jQuery Easing for smooth scrolling between anchors -->
    <script src="js/swiper.min.js"></script> <!-- Swiper for image and text sliders -->
    <script src="js/jquery.magnific-popup.js"></script> <!-- Magnific Popup for lightboxes -->
    <script src="js/morphext.min.js"></script> <!-- Morphtext rotating text in the header -->
    <script src="js/validator.min.js"></script> <!-- Validator.js - Bootstrap plugin that validates forms -->
    <script src="js/scripts.js"></script> <!-- Custom scripts -->

@endsection