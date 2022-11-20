<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
  <link rel="stylesheet" href="{{asset('css/index.css')}}" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Abhaya+Libre:wght@800&family=Poppins:wght@200;300;400;500;600&display=swap"
    rel="stylesheet" />

  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap"
    rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
  <link rel="icon" href="./images/Yoghurt.jpg">
  <link rel="preload" href="{{asset('images/p3.jpg')}}" as="image">
  <title>Natures Specialty</title>
  @livewireStyles
</head>

<body>
  <nav>
    <div class="container">
      <a href="{{route('website_home')}}" class="logo">
        <h4>NATURES</h4>
      </a>
      <ul class="nav_menu">
        <li><a href="{{route('website_home')}}">HOME</a></li>
        <li><a href="{{route('about')}}">ABOUT</a></li>
        <li><a href="{{route('shop')}}">SHOP</a></li>
        <li><a href="{{route('blog')}}">BLOG</a></li>
        <li><a href="{{route('login')}}">LOGIN</a></li>
      </ul>

        @livewire('cart-counter')

      <button id="open_btn"><i class="uil uil-bars"></i></button>
      <button id="close_btn"><i class="uil uil-multiply"></i></button>
    </div>
  </nav>

  @yield('page-content')


  <!--footer begins here-->
  <footer class="footer">
    <div class="container footer_container">

      <div class="footer_1">
        <a href="index.html" class="footer_logo">
          <h4>NATURES YOGURT</h4>
        </a>
        <p>Our Core Values: Leadership, Integrity, Dependability, Innovation and Ethics.</p>
      </div>


      <div class="footer_2">
        <h4>Permalinks</h4>
        <ul class="permalinks">
          <li><a href="{{route('website_home')}}">Home</a></li>
          <li><a href="{{route('about')}}">About</a></li>
          <li><a href="{{route('shop')}}">Shop</a></li>
          <li><a href="{{route('home')}}">Contact</a></li>

        </ul>
      </div>

      <div class="footer_3">
        <h4>Support</h4>
        <ul>
          <li><a href="#faqs">FAQS</a></li>
          <li><a href="{{route('returns')}}">Return Policy</a></li>
          <li><a href="{{route('terms')}}">Terms of use</a></li>
          <li><a href="{{route('privacy')}}">Private Policy</a></li>

        </ul>
      </div>

      <div class="footer_4">
        <h4>Contact Us</h4>
        <div>
          <p>+233261630600/+233246459351</p>
          <p>naturesfoods.gh@gmail.com</p>
        </div>


        <ul class="footer_socials">
          <li><a href="https://www.facebook.com/login/?next=https%3A%2F%2Fwww.facebook.com%2Fnatures.yoghurt.5"
            target="_blank"><i class="uil uil-facebook-f"></i></a></li>
        <li><a href="https://www.instagram.com/accounts/login/?next=%2Fnaturesyoghurt%2F" target="_blank"><i
              class="uil uil-instagram"></i></a></li>
        <li><a href="https://twitter.com/YoghurtNature" target="_blank"><i class="uil uil-twitter"></i></a></li>
          <!-- <li><a href="#"><i class="uil uil-linkedin"></i></a></li> -->
        </ul>
      </div>

    </div>
    <div class="footer_copyright">
      <small>Copyright &copy; Nature Yogurt & Foods</small>
    </div>
  </footer>

  @livewireScripts

  <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
  <script>
    var swiper = new Swiper(".mySwiper", {
      pagination: {
        el: ".swiper-pagination",
        dynamicBullets: true,
        type: 'bullets',
      },
      autoplay: {
        delay: 2000,
        disableOnInteraction: false,
        },
    });

  </script>
<script src="{{asset('js/app.js')}}"></script>
<script src="{{asset('js/products.js')}}"></script>
</body>


</html>
