<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Baru -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('home_asset/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{asset('home_asset/assets/css/fontawesome.css')}}"> 
    <link rel="stylesheet" href="{{asset('home_asset/assets/css/templatemo-tale-seo-agency.css')}}">
    <link rel="stylesheet" href="{{asset('home_asset/assets/css/owl.css')}}">
    <link rel="stylesheet" href="{{asset('home_asset/assets/css/animate.css')}}">
    <link rel="stylesheet"href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>

    <!-- Lama -->
    <!-- bootstrap -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      crossorigin="anonymous"
    />

    
    <!-- fontAwesome -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    />

    <!-- boxicons -->
    <link
      href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css"
      rel="stylesheet"
    />

    <!-- main stylesheet -->
    <link rel="stylesheet" href="{{asset('theme_asset/home/css/home.css')}}" />

    @notifyCss
    @livewireStyles
  </head>

  <body>

  <!-- ***** Baru ***** -->
  <!-- ***** Preloader Start ***** -->
  <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
  <!-- ***** Preloader End ***** -->

  <!-- ***** Pre-Header Area Start ***** -->
  <div class="pre-header">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-sm-9">
          <div class="left-info">
            <ul>
              <li><a href="#"><i class="fa fa-phone"></i>085710672476</a></li>
              <li><a href="#"><i class="fa fa-envelope"></i>GuideTime@email.com</a></li>
              <li><a href="#"><i class="fa fa-map-marker"></i>Depok, Jawa Barat</a></li>
            </ul>
          </div>
        </div>
        <div class="col-lg-4 col-sm-3">
          <div class="social-icons">
            <ul>
              <li><a href="#"><i class="fab fa-facebook"></i></a></li>
              <li><a href="#"><i class="fab fa-twitter"></i></a></li>
              <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
              <li><a href="#"><i class="fab fa-google-plus"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- ***** Pre-Header Area End ***** -->

  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="index.html" class="logo">
                        <img src="{{asset('home_asset/assets/images/logo.png')}}" alt="" style="max-width: 112px;">
                    </a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                      <li class="scroll-to-section"><a href="{{route('home')}}" class="active">Beranda</a></li>
                      <li class="has-sub">
                        <a href="javascript:void(0)">Dosen</a>
                        <ul class="sub-menu">
                          @php
                            $categories = App\Models\Category::all();
                          @endphp
                          @foreach ($categories as $category)
                          <li><a href="{{ route('category.show', $category->id) }}">{{ $category->name }}</a></li>
                          @endforeach
                        </ul>
                      </li>                      
                      <li class="scroll-to-section">
                        @auth
                          <a href="{{route('cart')}}">Daftar Bimbingan</a>
                          <form action="{{route('logout')}}" method="POST" style="display: inline;">
                            @csrf
                          </form>
                        @else
                          <a href="{{route('login')}}">Login</a>
                        @endauth
                      </li>      

                    <li class="scroll-to-section">
                      @auth
                          <a href="{{ route('logout') }}"
                             onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                              Logout
                          </a>
                          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                              @csrf
                          </form>
                      @else
                          <a href="{{ route('login') }}">Login</a>
                      @endauth
                  </li>
                    
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

  <div class="container">
    {{$slot}}
  </div>
  


    <!-- footer -->
    <footer id="footer">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 mb-5 mb-lg-0">
            <a href="#!" class="logo">
              <img src="{{asset('home_asset/assets/images/logo.png')}}" style="width: 175px;" alt="">
            </a>
          </div>

          <div class="col-lg-3 mb-5 mb-lg-0">
            <ul class="footer-list">
              <h2 class="title">Dosen</h2>
              @foreach ($categories as $category)
                <li><a href="{{ route('category.show', $category->id) }}">{{ $category->name }}</a></li>
                @endforeach
            </ul>
          </div>

          <div class="col-lg-3 mb-5">
            <ul class="footer-list">
              <h2 class="title">Legals</h2>
              <li><a href="#!">Contact</a></li>
              <li><a href="#!">Privacy policy</a></li>
              <li><a href="#!">Cookie policy</a></li>
              <li><a href="#!">Terms &amp; Conditions</a></li>
            </ul>
          </div>
        </div>
      </div>
    </footer>

    <div class="backdrop-filter"></div>
    @notifyJs
  </body>
  
  <!-- Baru -->
    <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('home_asset/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('home_asset/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    
    <script src="{{ asset('home_asset/assets/js/isotope.min.js') }}"></script>
    <script src="{{ asset('home_asset/assets/js/owl-carousel.js') }}"></script>
    <script src="{{ asset('home_asset/assets/js/tabs.js') }}"></script>
    <script src="{{ asset('home_asset/assets/js/popup.js') }}"></script>
    <script src="{{ asset('home_asset/assets/js/custom.js') }}"></script>
  @livewireScripts
</html>
