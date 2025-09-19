<html lang="en">
<head>
  <!--Add-Title-Here-->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

  <title>{{ config('app.name') }} | {{$title??""}}</title>
  <meta name="description" content="{{config('app.description')}}" />
  <meta name="keywords" content="{{config('app.description')}}"/>
  <meta name="robots" content="index, follow">
  <meta name="copyright" content="{{config('app.copyright')}}" />
  <meta name="author" content="Durgesh Verma" />
  <meta name="generator" content="">
  <meta name="email" content="durgeshvrm010@gmail.com" /> 
  <meta name="_token" content="{{ csrf_token() }}">

  <!--for whatsappp facebook linkedin-->
  <meta property="taboola:title" content="{{ config('app.name') }} | {{$title??''}}"/>
  <meta property="og:title" content="{{$title??''}} {{ config('app.name') }}">
  <meta property="og:image:type" content="image.png')}}" />
  <meta property="og:image:width" content="699" />
  <meta property="og:image:height" content="486" />
  <meta property="og:image:alt" content="{{ config('app.name') }}" />
  <meta property="og:site_name" content="{{ config('app.name') }}">
  <meta property="og:description" content="{{config('app.description')}}">
  <meta property="og:type" content="article">
   <!--for linkedin -->
  <meta name="twitter:title" content="{{ config('app.name') }}">
  <meta name="twitter:description" content="{{config('app.description')}} ">
  <meta name="twitter:image:width" content="662" />
  <meta name="twitter:image:height" content="127" />
  <meta name="twitter:card" content="{{ config('app.name') }}">
  <meta name="twitter:site" content="">
  <meta property="og:url" content="{{url()->full()}}" />
  <link rel="canonical" content="{{url('/')}}"/>
  <!--Bootstrap-->
  <link rel="stylesheet" href="{{asset('front_assets/css/bootstrap.css')}}">

  <!--Font-Awesome-->
  <link rel="stylesheet" href="{{asset('front_assets/css/font-awesome.min.css')}}">

  <!--Owl-Carousel-->
  <link rel="stylesheet" href="{{asset('front_assets/plugins/owl/owl.carousel.min.css')}}">
  <link rel="stylesheet" href="{{asset('front_assets/plugins/owl/owl.theme.default.min.css')}}">

  <!--Youtube-Video-Popup-->
  <link rel="stylesheet" href="{{asset('front_assets/plugins/videoPopup/videoPopup.css')}}">

  <!--Map-->
  <link rel="stylesheet" href="{{asset('front_assets/plugins/map/map-style.css')}}">

  <!--Custom-Main-File-->
  <link rel="stylesheet" href="{{asset('front_assets/css/custom.css')}}">

  <!--Scroll-Animations-Css-->
  <link rel="stylesheet" href="{{asset('front_assets/plugins/waypoints/animate.css')}}">

  <!--Mobile-Responsive-->
  <link rel="stylesheet" href="{{asset('front_assets/css/responsive.css')}}">
</head>
<body style="overflow-x: hidden">

<!-- <div id="google_translate_element"></div> -->

<!--Preloader-->
<div class="se-pre-con"></div>
<!--Preloader-->

<!--Header Navigation & Banner-->
<section id="home-section" class="header-bg">
  <div class="bg-color">

    <!--navigation-starts-here-->
    <nav class="navbar navbar-default animated fadedown">
      <div class="container">
        <div class="col-md-12 col-sm-12 col-xs-12  nav-style">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <a href="https://prizoo.in/login" class="btn outline-button navbar-toggle collapsed" style="border-color: #6510ff;margin-top: 17px;">Login</a>
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#home-section">
              <img class="img-responsive" src="{{asset('admin-logo.png')}}" style="width: 143px;"></a>
          </div>

          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <div class="navbar-right hidden-xs btn-res" style="padding-top: 15px;">
              <a href="{{url('login')}}" class="btn outline-button">Login</a>
            </div>
            <ul class="nav navbar-nav navbar-right">
              <li class="active"><a class="active" href="{{url('/')}}#home-section">Home</a></li>
              <li><a href="{{url('/')}}#about-section">About</a></li>
              <li><a href="{{url('/')}}#testimonials-section">Testimonials</a></li>
              <li><a href="{{url('/')}}#cd-google-map">Contact</a></li>
            </ul>
          </div>
        </div>
      </div>
    </nav>

  <!--Banner-starts-from-here-->
    <section class="sectionP60" style="padding-top: 140px;padding-bottom: 120px;">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="row">
              <div class="col-md-6 col-sm-6 col-xs-12 header-text sectionP100 animated fadeleft">
                  <h2 class="rM white" style="font-size: 42px;letter-spacing: 1px;">🎉 Welcome to {{ config('app.name') }}<br>— Shop More, Earn More, Win More! </h2>
                  <p class="oR white f17">Prizoo is a unique shopping rewards platform that connects customers and vendors in a win-win way. Shop, collect points, and turn your purchases into exciting rewards!</p>
                <!-- <button class="btn purple-button" style="margin-top: 30px;">DOWNLOAD APP</button> -->
                <a href="{{asset('PrizooApp.apk')}}" download>
                  <button class="btn purple-button" style="margin-top: 30px;">DOWNLOAD APP</button>
                </a>
              </div>

              <!--phone-slider-starts-here-->
              <div class="col-md-4 col-sm-5 col-xs-12 pull-right animated faderight">
                <div id="owl-trans-iphone" class="iphone-bg owl-carousel owl-theme">
                  <div class="item">
                    <img class="img-responsive centered" src="{{asset('front_assets/images/iphone-slider/screens.jpg')}}" alt="">
                  </div>
              <!--     <div class="item">
                    <img class="img-responsive centered" src="{{asset('front_assets/images/iphone-slider/screens.jpg')}}" alt="">
                  </div>
                  <div class="item">
                    <img class="img-responsive centered" src="{{asset('front_assets/images/iphone-slider/screens.jpg')}}" alt="">
                  </div>
                  <div class="item">
                    <img class="img-responsive centered" src="{{asset('front_assets/images/iphone-slider/screens.jpg')}}" alt="">
                  </div>
                  <div class="item">
                    <img class="img-responsive centered" src="{{asset('front_assets/images/iphone-slider/screens.jpg')}}" alt="">
                  </div>
                  <div class="item">
                    <img class="img-responsive centered" src="{{asset('front_assets/images/iphone-slider/screens.jpg')}}" alt="">
                  </div>
                  <div class="item">
                    <img class="img-responsive centered" src="{{asset('front_assets/images/iphone-slider/screens.jpg')}}" alt="">
                  </div>
                  <div class="item">
                    <img class="img-responsive centered" src="{{asset('front_assets/images/iphone-slider/screens.jpg')}}" alt="">
                  </div> -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</section>
<!--Header Navigation & Banner-->

<!--section-1-about-us-->
<section id="about-section" class="sectionP80">
  <div class="container">
    <div class="row">
      <div class="col-md-5 col-sm-12 col-xs-12 animated fadeleft">
        <div class="col-md-12 col-sm-12 col-xs-12 p0 heading">
          <span class="purple rB f13">Informations</span>
          <h1 class="dark oB">What is {{ config('app.name') }}?</h1>
        </div>
        <div class="col-md-12 col-sm-12 col-xs-12 p0" style="margin-bottom: 30px;">
          <p class="light oR f15">Prizoo is a smart shopping rewards platform that connects customers and vendors in one place. When customers shop with participating vendors, they earn reward points. The more they shop, the more points they collect — and top point receivers can win cash prizes or other exciting rewards.</p><br>
          <p class="light oR f15">For vendors, Prizoo is a powerful way to grow sales, reward loyal customers, and stand out in a competitive market.</p>
          <p class="light oR f15">For customers, Prizoo turns everyday shopping into an opportunity to win real rewards.</p>
        </div>
      </div>
      <div class="col-md-7 col-sm-12 col-xs-12 pull-right">
        <div class="why-img animated faderight">
          <img class="img-responsive pull-right centered" src="{{asset('front_assets/images/why.png')}}" alt="">
        </div>
      </div>
    </div>
  </div>
</section>
<!--section-1-about-us-->

<!--section-2-Features-->
<section id="features-section" class="sectionP80" style="background: #fcfcfc">
  <div class="container">
    <div class="row">
      <div class="col-md-5 col-sm-12 col-xs-12 pull-right animated faderight">
        <div class="heading">
          <span class="purple rB f13">Advantages</span>
          <h1 class="dark oB">Why Choose {{ config('app.name') }}?</h1>
        </div>
      </div>
      <div class="col-md-12 col-sm-12 col-xs-12 p0">
        <div class="col-md-5 col-sm-12 col-xs-12 pull-right animated faderight" style="margin-bottom: 30px;">
          <p class="light oR f15">Shop & Earn Instantly Every time you buy from a Prizoo vendor, you earn reward points — no hidden steps.</p>
          <br><p class="light oR f15">Real Rewards & Cash Turn your points into real rewards, cash prizes, or special offers.</p>
          <br><p class="light oR f15">Trusted Vendors Shop with verified vendors offering quality products and fair deals.</p>
        </div>
        <div class="col-md-7 col-sm-12 col-xs-12">
          <div class="col-md-4 col-sm-4 col-xs-12 text-center br">
            <div class="feature centered animated fadeup">
              <div class="feature-icon">
                <i class="fa fa-thumbs-up"></i>
              </div>
              <div class="feature-desc">
                <h4 class="dark rB">Easy to Use</h4>
              </div>
            </div>
          </div>
          <div class="col-md-4 col-sm-4 col-xs-12 text-center br b0 service-hover">
            <div class="feature centered animated fadeup">
              <div class="feature-icon">
                <i class="fa fa-rocket"></i>
              </div>
              <div class="feature-desc">
                <h4 class="dark rB">Crazy Fast</h4>
              </div>
            </div>
          </div>
          <div class="col-md-4 col-sm-4 col-xs-12 text-center br b0 service-hover">
            <div class="feature centered animated fadeup">
              <div class="feature-icon">
                <i class="fa fa-heart"></i>
              </div>
              <div class="feature-desc">
                <h4 class="dark rB">Easy To Win</h4>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--section-2-Features-->


<!--section-5-More-Features-->
<section id="more-features-section" class="sectionP60" style="background: #EEF2F5">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-sm-6 col-xs-12 pull-right">
        <div class="heading animated faderight">
          <span class="purple rB f13">Advantages</span>
          <h1 class="dark oB">Unique Features</h1>
        </div>
        <div>
          <ul class="ul-style">
            <li class="light oR animated faderight">Earn reward points instantly on every purchase.</li>
            <li class="light oR animated faderight">Easy tracking of your points and rewards in the app.</li>
            <li class="light oR animated faderight">Top buyers win real cash prizes every month.</li>
            <li class="light oR animated faderight">Verified vendors ensure safe and genuine products.</li>
            <li class="light oR animated faderight">Vendors boost sales by rewarding loyal customers.</li>
            <li class="light oR animated faderight">Secure, hassle-free payments and fast point transfers.</li>
            <li class="light oR animated faderight">Simple dashboard for vendors to manage rewards.</li>
            <li class="light oR animated faderight">A fun way to shop, save, and win big — every time!</li>
          </ul>
        </div>
      </div>
      <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="mobile-float-img animated fadein">
          <img class="img-responsive" src="{{asset('front_assets/images/mobile-float.jpg')}}" alt="">
        </div>
      </div>
    </div>
  </div>
</section>
<!--section-5-More-Features-->

<!--section-6-Counter-->
<!--Counter-Headimng-Starts-Here-->
<section id="counter-section" class="counter-bg">
  <div class="bg-color sectionP100">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12 text-center">
          <div class="heading text-center animated fadedown">
            <h1 class="white oB m0">Take the Right Step</h1>
            <h4 class="white oS m0">Buy Theme Now</h4>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--Counter-Starts-here-->
<section>
  <div class="container">
    <div class="row">
      <div class="col-md-10 col-md-offset-1 col-sm-12 col-sm-offset-0 col-xs-12">
        <div class="counter col-md-12 col-sm-12 col-xs-12 p0 animated fadeup">
          <div class="col-md-3 col-sm-6 col-xs-6 text-center">
            <div class="number br">
              <h1 class="numscroller purple rB" data-min='0000' data-max='3525' data-delay='1' data-increment='25'></h1>
            </div>
            <div class="number-text">
              <p class="dark rB">Downloads</p>
            </div>
          </div>
          <div class="col-md-3 col-sm-6 col-xs-6 text-center">
            <div class="number br">
              <h1 class="numscroller purple rB" data-min='0000' data-max='3267' data-delay='1' data-increment='25'></h1>
            </div>
            <div class="number-text">
              <p class="dark rB">Theme Lovers</p>
            </div>
          </div>
          <div class="col-md-3 col-sm-6 col-xs-6 text-center">
            <div class="number br">
              <h1 class="numscroller purple rB" data-min='0000' data-max='3328' data-delay='1' data-increment='25'></h1>
            </div>
            <div class="number-text">
              <p class="dark rB">Followers</p>
            </div>
          </div>
          <div class="col-md-3 col-sm-6 col-xs-6 text-center">
            <div class="number">
              <h1 class="numscroller purple rB" data-min='0000' data-max='3159' data-delay='1' data-increment='25'></h1>
            </div>
            <div class="number-text">
              <p class="dark rB">Haters</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--section-6-Counter-->



<!--section-9-Half-Screen-Slider-->
<section class="half-owl-bg">
  <div class="bg-color sectionP60">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12 animated fadeleft">
          <div class="heading">
            <span class="white rB f13">Gallery</span>
            <h1 class="white oB">Half Screen Slider</h1>
          </div>
        </div>
        <div class="col-md-12 col-sm-12 col-xs-12 p0">
          <div class="col-md-5 col-sm-12 col-xs-12 animated fadeleft" style="margin-bottom: 30px;">
            <p class="white oR f15">Experience Prizoo in action — explore how our users shop, earn, and win with real rewards. See our top vendors, happy customers, and real moments of success.</p><br>
            <p class="white oR f15">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
          </div>
          <div class="col-md-7 col-sm-12 col-xs-12 animated fadeup">
            <div id="half-owl-slider" class="owl-carousel owl-theme">
              <div class="item">
                <div class="video-thumb" style="background: url('assets/images/video-thumbs/1.jpg');">
                  <a class="videoPopup" href="https://www.youtube.com/watch?v=y--Wx5i_Gak">
                    <div class="play-icon centered">
                      <img class="img-responsive centered" src="{{asset('front_assets/images/play-img.png')}}">
                    </div>
                  </a>
                </div>
              </div>
              <div class="item">
                <div class="video-thumb" style="background: url('assets/images/video-thumbs/1.jpg');">
                  <a class="videoPopup" href="https://www.youtube.com/watch?v=y--Wx5i_Gak">
                    <div class="play-icon centered">
                      <img class="img-responsive centered" src="{{asset('front_assets/images/play-img.png')}}">
                    </div>
                  </a>
                </div>
              </div>
              <div class="item">
                <div class="video-thumb" style="background: url('assets/images/video-thumbs/3.jpg');">
                  <a class="videoPopup" href="https://www.youtube.com/watch?v=y--Wx5i_Gak">
                    <div class="play-icon centered">
                      <img class="img-responsive centered" src="{{asset('front_assets/images/play-img.png')}}">
                    </div>
                  </a>
                </div>
              </div>
              <div class="item">
                <div class="video-thumb" style="background: url('assets/images/video-thumbs/1.jpg');">
                  <a class="videoPopup" href="https://www.youtube.com/watch?v=y--Wx5i_Gak">
                    <div class="play-icon centered">
                      <img class="img-responsive centered" src="{{asset('front_assets/images/play-img.png')}}">
                    </div>
                  </a>
                </div>
              </div>
              <div class="item">
                <div class="video-thumb" style="background: url('assets/images/video-thumbs/2.jpg');">
                  <a class="videoPopup" href="https://www.youtube.com/watch?v=y--Wx5i_Gak">
                    <div class="play-icon centered">
                      <img class="img-responsive centered" src="{{asset('front_assets/images/play-img.png')}}">
                    </div>
                  </a>
                </div>
              </div>
              <div class="item">
                <div class="video-thumb" style="background: url('assets/images/video-thumbs/3.jpg');">
                  <a class="videoPopup" href="https://www.youtube.com/watch?v=y--Wx5i_Gak">
                    <div class="play-icon centered">
                      <img class="img-responsive centered" src="{{asset('front_assets/images/play-img.png')}}">
                    </div>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--section-9-Half-Screen-Slider-->

<!--section-10-Testimonials-->
<section id="testimonials-section" class="sectionP60">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="heading animated fadeleft">
                    <span class="purple rB f13">Testimonials</span>
                    <h1 class="dark oB">What Clients Say?</h1>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12 p0 animated fadeup">
                    <div id="owl-testimonials" class="sectionP40 owl-carousel owl-theme">
                        <div class="item">
                            <div class="testimonial col-md-11 col-sm-11 col-xs-12">
                                <h5 class="dark rM"> Amit K<span class="light f13 oR">Customer</span></h5>
                                <h5 class="light oR m20">Prizoo makes shopping exciting! I love collecting points every time I buy something. Last month, I even won a cash reward — just for shopping!</h5>
                                <img class="pull-right quote-img" src="{{asset('front_assets/images/quote.png')}}" alt="quote-img">
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="testimonial-img">
                                    <img src="{{asset('front_assets/images/testimonial/1.png')}}" alt="testimonial image missing">
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimonial col-md-11 col-sm-11 col-xs-12">
                                <h5 class="dark rM"> Riya S.<span class="light f13 oR">Vendor</span></h5>
                                <h5 class="light oR m20">Being a vendor on Prizoo has helped my small shop grow. I can easily reward my loyal buyers, and they keep coming back. The dashboard is simple, and the support team is always helpful.</h5>
                                <img class="pull-right quote-img" src="{{asset('front_assets/images/quote.png')}}" alt="quote-img">
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="testimonial-img">
                                    <img src="{{asset('front_assets/images/testimonial/2.png')}}" alt="testimonial image missing">
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimonial col-md-11 col-sm-11 col-xs-12">
                                <h5 class="dark rM">Deepak T<span class="light f13 oR">Customer</span></h5>
                                <h5 class="light oR m20">I enjoy using Prizoo because it’s transparent and secure. I trust the vendors and like that I can see exactly how many points I’ve earned. Highly recommend it to smart shoppers!</h5>
                                <img class="pull-right quote-img" src="{{asset('front_assets/images/quote.png')}}" alt="quote-img">
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="testimonial-img">
                                    <img src="{{asset('front_assets/images/testimonial/3.png')}}" alt="testimonial image missing">
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimonial col-md-11 col-sm-11 col-xs-12">
                                <h5 class="dark rM">Stacy<span class="light f13 oR">Customer</span></h5>
                                <h5 class="light oR m20">Prizoo makes shopping exciting! I love collecting points every time I buy something. Last month, I even won a cash reward — just for shopping!</h5>
                                <img class="pull-right quote-img" src="{{asset('front_assets/images/quote.png')}}" alt="quote-img">
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="testimonial-img">
                                    <img src="{{asset('front_assets/images/testimonial/4.png')}}" alt="testimonial image missing">
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimonial col-md-11 col-sm-11 col-xs-12">
                                <h5 class="dark rM">Ram M<span class="light f13 oR">Customer</span></h5>
                                <h5 class="light oR m20">It feels good to get something extra when I shop. The points add up quickly, and it motivates me to shop with trusted vendors again and again.</h5>
                                <img class="pull-right quote-img" src="{{asset('front_assets/images/quote.png')}}" alt="quote-img">
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="testimonial-img">
                                    <img src="{{asset('front_assets/images/testimonial/1.png')}}" alt="testimonial image missing">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--section-10-Testimonials-->

<!--section-11-Contact-Us Details-->
<section id="contact-details-section" class="sectionP60" style="background: #fcfcfc;">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="heading text-center animated fadedown">
          <span class="purple rB f13">Get In Touch</span>
          <h1 class="dark oB">Contact Us</h1>
        </div>
      </div>
      <div class="col-md-12 col-sm-12 col-xs-12 p0 sectionP80">
        <div class="col-md-4 col-sm-4 col-xs-12">
          <div class="contactLPE animated fadeup">
            <div class="icon-part">
              <div class="bg-color">
                <i class="fa fa-map-marker white"></i>
              </div>
            </div>
            <div class="text-part">
              <h5 class="oB dark m0">Office Address</h5>
              <div class="line"></div>
              <p class="oR light">{{config('app.address')}}</p>
            </div>
          </div>
        </div>
        <div class="col-md-4 col-sm-4 col-xs-12">
          <div class="contactLPE animated fadeup">
            <div class="icon-part">
              <div class="bg-color">
                <i class="fa fa-phone white"></i>
              </div>
            </div>
            <div class="text-part">
              <h5 class="oB dark m0">Phone Number</h5>
              <div class="line"></div>
              <p class="oR light">Whatsapp No.: {{config('app.whatsapp')}}</p>
              <p class="oR light">Mobile: {{config('app.contact_us')}}</p>
            </div>
          </div>
        </div>
        <div class="col-md-4 col-sm-4 col-xs-12">
          <div class="contactLPE animated fadeup">
            <div class="icon-part">
              <div class="bg-color">
                <i class="fa fa-envelope white"></i>
              </div>
            </div>
            <div class="text-part">
              <h5 class="oB dark m0">Email Address</h5>
              <div class="line"></div>
              <p class="oR light">{{config('app.email')}}</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--section-11-Contact-Us Details-->

<!--section-12-Google-Map-->
<!-- <section id="cd-google-map" class="animated fadein">
  <div id="google-container"></div>
  <div id="cd-zoom-in"></div>
  <div id="cd-zoom-out"></div>
</section> -->
<!--section-12-Google-Map-->

<!--section-13-Footer-->
<footer id="contact-form-section" class="footer-bg">
  <div class=" bg-dark sectionP30">
    <div class="container">
      <div class="row">
        <!--Social-Links-Starts-Here-->
        <div class="col-md-12 col-sm-12 col-xs-12 text-center animated fadeup">
          <a class="social" href="{{config('custom.facebook_page_id')}}"><i class="fa fa-facebook"></i></a>
          <a class="social" href="{{config('custom.twitter_page_id')}}"><i class="fa fa-twitter"></i></a>
          <a class="social" href="{{config('custom.linkedin_page_id')}}"><i class="fa fa-linkedin"></i></a>
          <a class="social" href="{{config('custom.instagram_page_id')}}"><i class="fa fa-instagram"></i></a>
        </div>
        <!--Copyright-Text-Starts-Here-->
        <div class="col-md-12 col-sm-12 col-xs-12 text-center copyRight">
          <p class="light2 oR f13">{{config('app.copyright')}}</p>
        </div>
      </div>
    </div>
  </div>
</footer>
<!--section-13-Footer-->


<!--================Contact Success and Error message Area =================-->
<div id="success" class="modal modal-message fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <span class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></span>
        <h2 class="modal-title">Thank you</h2>
        <p class="modal-subtitle">Your message is successfully sent...</p>
      </div>
    </div>
  </div>
</div>


<!-- Modals error -->

<div id="error" class="modal modal-message fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <span class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></span>
        <h2 class="modal-title">Sorry !</h2>
        <p class="modal-subtitle"> Something went wrong</p>
      </div>
    </div>
  </div>
</div>



<!--Javascript-Files-->

<!--Google-jQuery-->
<script src="{{asset('front_assets/js/jquery-2.1.1.js')}}"></script>

<!--Bootstrap-->
<script type="text/javascript" src="{{asset('front_assets/js/bootstrap.js')}}"></script>

<!--Owl-Carousel-->
<script type="text/javascript" src="{{asset('front_assets/plugins/owl/owl.carousel.min.js')}}"></script>

<!--Scroll Animations Js-->
<script type="text/javascript" src="{{asset('front_assets/plugins/waypoints/waypoint.js')}}"></script>
<script type="text/javascript" src="{{asset('front_assets/plugins/waypoints/animation.js')}}"></script>

<!--Counter-->
<script type="text/javascript" src="{{asset('front_assets/plugins/numScroll/numscroller-1.0.js')}}"></script>

<!--Youtube-Video-Popups-->
<!-- <script type="text/javascript" src="{{asset('front_assets/plugins/videoPopup/videoPopup.jquery.js')}}"></script> -->

<!--Map-Google-jQuery-->
<!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAmiJjq5DIg_K9fv6RE72OY__p9jz0YTMI"></script> -->
<!--Map-Javascript-->
<!-- <script type="text/javascript" src="{{asset('front_assets/plugins/map/map.js')}}"></script> -->

<!-- <script type="text/javascript" src="contact.js')}}"></script> -->



<!--Common-Javascript-Main-File--->
<script type="text/javascript" src="{{asset('front_assets/js/common.js')}}"></script>

<!--Javascript-Files-->

<script type="text/javascript">
  function googleTranslateElementInit() {
    new google.translate.TranslateElement({
      pageLanguage: 'en',
      includedLanguages: 'en,hi,fr,de,es', // add your desired languages
      layout: google.translate.TranslateElement.InlineLayout.SIMPLE
    }, 'google_translate_element');
  }
</script>

<script src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

</body>

</html>
