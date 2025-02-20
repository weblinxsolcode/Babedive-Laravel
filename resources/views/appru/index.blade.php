<!DOCTYPE html>
<html lang="zxx" class="no-js">

<!-- Mirrored from preview.colorlib.com/theme/appru/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 15 Jul 2024 19:29:33 GMT -->
<head>

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="shortcut icon" href="{{ asset('favicon.png') }}">

    <meta charset="UTF-8">

    <title>BabeDive | {{ $title }}</title>
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,600|Roboto:400,400i,500" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('front/css/linearicons.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/hexagons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/main.css') }}">
</head>
<body>

    <header id="header">
        <div class="container main-menu">
            <div class="row align-items-center justify-content-between d-flex">
                <div id="logo">
                    <a href="javascript:void(0)"><img src="{{ asset('logo.png') }}" style="width: 250px;" alt title /></a>
                </div>
                <nav id="nav-menu-container" >
                    <ul class="nav-menu ">
                        <li class="menu-active"><a href="{{route("home.page")}}">Home</a></li>
                        <li><a href="{{route("home.privacy")}}">Privacy Policy</a></li>
                        <li><a href="{{route("home.term")}}">Term & Condition</a></li>
                        <!--<li class="menu-has-children"><a href>Pages</a>-->
                        <!--    <ul>-->
                        <!--        <li><a href="elements.html">Elements</a></li>-->
                        <!--    </ul>-->
                        <!--</li>-->
                        <!--<li class="menu-has-children"><a href>Blog</a>-->
                        <!--    <ul>-->
                        <!--        <li><a href="blog-home.html">Blog Home</a></li>-->
                        <!--        <li><a href="blog-single.html">Blog Single</a></li>-->
                        <!--    </ul>-->
                        <!--</li>-->
                        <li><a href="{{route("home.contactus")}}">Contact</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>


    <section class="home-banner-area">
        <div class="container">
            <div class="row fullscreen d-flex align-items-center justify-content-between">
                <div class="home-banner-content col-lg-6 col-md-6">
                    <h1>
                        App That <br> Suits You Better
                    </h1>
                    <p>inappropriate behavior is often laughed off as “boys will be boys,” women face higher conduct standards.</p>
                    <div class="download-button d-flex flex-row justify-content-start">
                        <div class="buttons flex-row d-flex">
                            <i class="fa fa-apple" aria-hidden="true"></i>
                            <div class="desc">
                                <a href="#">
                                    <p>
                                        <span>Available</span> <br>
                                        on App Store
                                    </p>
                                </a>
                            </div>
                        </div>
                        <div class="buttons dark flex-row d-flex">
                            <i class="fa fa-android" aria-hidden="true"></i>
                            <div class="desc">
                                <a href="#">
                                    <p>
                                        <span>Available</span> <br>
                                        on Play Store
                                    </p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="banner-img col-lg-4 col-md-6">
                    <img class="img-fluid" src="{{ asset('screen.png') }}" alt>
                </div>
            </div>
        </div>
    </section>

    <script src="{{ asset('front/js/vendor/jquery-2.2.4.min.js') }}"></script>
    <script src="../../../cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="{{ asset('front/js/tilt.jquery.min.js') }}"></script>
    <script src="{{ asset('front/js/vendor/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
    <script src="{{ asset('front/js/easing.min.js') }}"></script>
    <script src="{{ asset('front/js/hoverIntent.js') }}"></script>
    <script src="{{ asset('front/js/superfish.min.js') }}"></script>
    <script src="{{ asset('front/js/jquery.ajaxchimp.min.js') }}"></script>
    <script src="{{ asset('front/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('front/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('front/js/owl-carousel-thumb.min.js') }}"></script>
    <script src="{{ asset('front/js/hexagons.min.js') }}"></script>
    <script src="{{ asset('front/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('front/js/waypoints.min.js') }}"></script>
    <script src="{{ asset('front/js/mail-script.js') }}"></script>
    <script src="{{ asset('front/js/main.js') }}"></script>

    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-23581568-13');

    </script>
    <script defer src="https://static.cloudflareinsights.com/beacon.min.js/vcd15cbe7772f49c399c6a5babf22c1241717689176015" integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ==" data-cf-beacon='{"rayId":"8a3c297a3ea39e2e","version":"2024.7.0","serverTiming":{"name":{"cfL4":true}},"token":"cd0b4b3a733644fc843ef0b185f98241","b":1}' crossorigin="anonymous"></script>
</body>

<!-- Mirrored from preview.colorlib.com/theme/appru/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 15 Jul 2024 19:29:55 GMT -->
</html>
