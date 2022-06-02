@php
$setting = DB::table('settingsinformation')->first();
$contact = DB::table('contactinformation')->first();
@endphp


<!doctype html>
    <html class="no-js" lang="zxx">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>{{ $setting->title}} </title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="manifest" href="site.webmanifest">
        <!-- Favicon -->
        <link rel="icon" type="image/png" href="{{ url($setting->favicon) }}">

        <!-- CSS here -->
        <link rel="stylesheet" href="{{ asset('public/frontend')}}/assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{ asset('public/frontend')}}/assets/css/owl.carousel.min.css">
        <link rel="stylesheet" href="{{ asset('public/frontend')}}/assets/css/ticker-style.css">
        <link rel="stylesheet" href="{{ asset('public/frontend')}}/assets/css/flaticon.css">
        <link rel="stylesheet" href="{{ asset('public/frontend')}}/assets/css/slicknav.css">
        <link rel="stylesheet" href="{{ asset('public/frontend')}}/assets/css/animate.min.css">
        <link rel="stylesheet" href="{{ asset('public/frontend')}}/assets/css/magnific-popup.css">
        <link rel="stylesheet" href="{{ asset('public/frontend')}}/assets/css/fontawesome-all.min.css">
        <link rel="stylesheet" href="{{ asset('public/frontend')}}/assets/css/themify-icons.css">
        <link rel="stylesheet" href="{{ asset('public/frontend')}}/assets/css/slick.css">
        <link rel="stylesheet" href="{{ asset('public/frontend')}}/assets/css/nice-select.css">
        <link rel="stylesheet" href="{{ asset('public/frontend')}}/assets/css/style.css">
    </head>

    <body onload="startTime()" onload="startTime()">

        <!-- Preloader Start -->
        <div id="preloader-active">
            <div class="preloader d-flex align-items-center justify-content-center">
                <div class="preloader-inner position-relative">
                    <div class="preloader-circle"></div>
                    <div class="preloader-img pere-text">
                        <img src="{{ url($setting->logo) }}" alt="">
                    </div>
                </div>
            </div>
        </div>
        <!-- Preloader Start -->

        <header>
            <!-- Header Start -->
            <div class="header-area">
                <div class="main-header ">
                    <div class="header-top black-bg d-none d-md-block">
                       <div class="container">
                           <div class="col-xl-12">
                            <div class="row d-flex justify-content-between align-items-center">
                                <div class="header-info-left">
                                    <ul>     
                                        <li><i class="fa fa-clock"></i>&nbsp;&nbsp; <span id="clock"></span>
                                        </li>
                                        <li><i class="fa fa-calendar"></i>&nbsp;&nbsp; <span id="date">{{ date('l, F j, Y') }}</span></li>
                                    </ul>
                                </div>
                                <div class="header-info-right">
                                    <ul class="header-social">    
                                        <li><a href="{{ url($setting->facebook) }}" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="{{ url($setting->twitter) }}" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="{{ url($setting->instagram) }}" target="_blank"><i class="fab fa-instagram"></i></a></li>
                                        <li><a href="{{ url($setting->youtube) }}" target="_blank"><i class="fab fa-youtube"></i></a></li>

                                        a>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="header-mid d-none d-md-block">
                   <div class="container">
                    <div class="row d-flex align-items-center">
                        <!-- Logo -->
                        <div class="col-xl-3 col-lg-3 col-md-3">
                            <div class="logo">
                                <a href="{{ url('/') }}"><img src="{{ url($setting->logo) }}" alt="" ></a>
                            </div>
                        </div>
                        <div class="col-xl-9 col-lg-9 col-md-9">
                            <div class="header-banner f-right ">
                                <img src="{{ asset('public/frontend')}}/assets/img/hero/header_card.jpg" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-bottom header-sticky">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-10 col-lg-10 col-md-12 header-flex">
                            <!-- sticky -->
                            <div class="sticky-logo" style="margin-top: -5px;">
                                <a href="{{ url('/') }}"><img src="{{ url($setting->logo) }}" alt="" ></a>
                            </div>
                            <!-- Main-menu -->
                            <div class="main-menu d-none d-md-block">
                                <nav>                  
                                    <ul id="navigation"> 

                                        @php

                                        $Item = DB::table('iteminformation')->where('status',1)->limit('8')->get();
                                        $Category = DB::table('categoryinformation')->where('status',1)->get();

                                        @endphp

                                        @if(isset($Item))
                                        @foreach( $Item as $ItemShow)

                                        <li><a href="{{ url('Item/'.$ItemShow->id,$ItemShow->item_name) }}">{{ $ItemShow->item_name }}</a>
                                            <ul class="submenu">

                                                @if(isset($Category))
                                                @foreach( $Category as $CategoryShow)
                                                @if($ItemShow->id == $CategoryShow->item_id)

                                                <li><a href="{{ url('categories/'.$CategoryShow->id,$CategoryShow->category_name) }}">{{ $CategoryShow->category_name }}</a></li>

                                                @endif
                                                @endforeach
                                                @endif

                                            </ul>
                                        </li>

                                        @endforeach
                                        @endif


                                        @php

                                        $Item = DB::table('iteminformation')->orderBy('id','DESC')->where('status',1)->limit('3')->get();

                                        @endphp


                                        <li><a href="#">আরও</a>
                                            <ul class="submenu">
                                                @if(isset($Item))
                                                @foreach( $Item as $ItemShow)
                                                <li><a href="{{ url('categories/'.$ItemShow->id,$ItemShow->item_name) }}">{{ $ItemShow->item_name }}</a></li>
                                                @endforeach
                                                @endif
                                            </ul>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>             
                        <div class="col-xl-2 col-lg-2 col-md-4">
                            <div class="header-right-btn f-right d-none d-lg-block">
                                <i class="fas fa-search special-tag"></i>
                                <div class="search-box">
                                    <form method="get" action="{{url('searchnews')}}">
                                     @csrf
                                     <input type="search" name="searchdata" placeholder="এইখানে লিখুন ..." required>
                                 </form>
                             </div>
                         </div>
                     </div>
                     <!-- Mobile Menu -->
                     <div class="col-12">
                        <div class="mobile_menu d-block d-md-none"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Header End -->
</header>




@yield('content')







<footer>
 <!-- Footer Start-->
 <div class="footer-area footer-padding fix">
    <div class="container">
        <div class="row d-flex justify-content-between">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="single-footer-caption">
                    <div class="single-footer-caption" style="margin-top: -70px;">
                        <center>
                            <!-- logo -->
                            <div class="footer-logo">
                                <a href="index.html"><img src="{{ url($setting->logo) }}" alt="" style="max-height: 80px"></a>
                            </div>
                            <div class="footer-tittle">
                                <div class="footer-pera">
                                    <p>{!! $contact->description !!}</p>
                                </div>
                            </div>
                            <!-- social -->
                            <div class="footer-social">
                                <a href="{{ url($setting->facebook) }}" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                <a href="{{ url($setting->twitter) }}" target="_blank"><i class="fab fa-twitter"></i></a>
                                <a href="{{ url($setting->instagram) }}" target="_blank"><i class="fab fa-instagram"></i></a>
                                <a href="{{ url($setting->youtube) }}" target="_blank"><i class="fab fa-youtube"></i></a>
                            </div>
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- footer-bottom aera -->
<div class="footer-bottom-area">
 <div class="container-fluid">
     <div class="footer-border">
        <div class="row d-flex align-items-center justify-content-between">
            <div class="col-lg-12">
                <div class="footer-copy-right">
                    <center>
                        <span style="color: #fff;">
                           <?php echo date("Y"); ?> © Copyright Develop By <a href="https://www.facebook.com/Bidhan716/" style="color: red;">Bidhan Nath</a>
                       </span>
                   </center>
               </div>
           </div>
       </div>
   </div>
</div>
</div>
<!-- Footer End-->
</footer>

<!-- JS here -->

<!-- All JS Custom Plugins Link Here here -->
<script src="{{ asset('public/frontend')}}/assets/js/vendor/modernizr-3.5.0.min.js"></script>
<!-- Jquery, Popper, Bootstrap -->
<script src="{{ asset('public/frontend')}}/assets/js/vendor/jquery-1.12.4.min.js"></script>
<script src="{{ asset('public/frontend')}}/assets/js/popper.min.js"></script>
<script src="{{ asset('public/frontend')}}/assets/js/bootstrap.min.js"></script>
<!-- Jquery Mobile Menu -->
<script src="{{ asset('public/frontend')}}/assets/js/jquery.slicknav.min.js"></script>

<!-- Jquery Slick , Owl-Carousel Plugins -->
<script src="{{ asset('public/frontend')}}/assets/js/owl.carousel.min.js"></script>
<script src="{{ asset('public/frontend')}}/assets/js/slick.min.js"></script>
<!-- Date Picker -->
<script src="{{ asset('public/frontend')}}/assets/js/gijgo.min.js"></script>
<!-- One Page, Animated-HeadLin -->
<script src="{{ asset('public/frontend')}}/assets/js/wow.min.js"></script>
<script src="{{ asset('public/frontend')}}/assets/js/animated.headline.js"></script>
<script src="{{ asset('public/frontend')}}/assets/js/jquery.magnific-popup.js"></script>

<!-- Breaking New Pluging -->
<script src="{{ asset('public/frontend')}}/assets/js/jquery.ticker.js"></script>
<script src="{{ asset('public/frontend')}}/assets/js/site.js"></script>

<!-- Scrollup, nice-select, sticky -->
<script src="{{ asset('public/frontend')}}/assets/js/jquery.scrollUp.min.js"></script>
<script src="{{ asset('public/frontend')}}/assets/js/jquery.nice-select.min.js"></script>
<script src="{{ asset('public/frontend')}}/assets/js/jquery.sticky.js"></script>

<!-- contact js -->
<script src="{{ asset('public/frontend')}}/assets/js/contact.js"></script>
<script src="{{ asset('public/frontend')}}/assets/js/jquery.form.js"></script>
<script src="{{ asset('public/frontend')}}/assets/js/jquery.validate.min.js"></script>
<script src="{{ asset('public/frontend')}}/assets/js/mail-script.js"></script>
<script src="{{ asset('public/frontend')}}/assets/js/jquery.ajaxchimp.min.js"></script>

<!-- Jquery Plugins, main Jquery -->    
<script src="{{ asset('public/frontend')}}/assets/js/plugins.js"></script>
<script src="{{ asset('public/frontend')}}/assets/js/main.js"></script>

<script>

   /* Navbar ClockDate */
   function startTime() {
    var today = new Date();
    var hr = today.getHours();
    var min = today.getMinutes();
    var sec = today.getSeconds();
    ap = (hr < 12) ? "<span>AM</span>" : "<span>PM</span>";
    hr = (hr == 0) ? 12 : hr;
    hr = (hr > 12) ? hr - 12 : hr;
    //Add a zero in front of numbers<10
    hr = checkTime(hr);
    min = checkTime(min);
    sec = checkTime(sec);
    document.getElementById("clock").innerHTML = hr + ":" + min + ":" + sec + " " + ap;
    
    var time = setTimeout(function(){ startTime() }, 500);
}
function checkTime(i) {
    if (i < 10) {
     i = "0" + i;
 }
 return i;
}



</script>

<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-62637b989217071a"></script>

</body>
</html>





