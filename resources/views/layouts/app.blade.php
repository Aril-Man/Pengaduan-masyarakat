<!DOCTYPE html>
<html lang="en">
  <head>
    @include('layouts.masyarakat.head')
    <title>
        @hasSection('title')
            @yield('title')
        @endif
    </title>
  </head>
  <body>
    <!--===== HEADER =====-->
    <header class="l-header">
      <nav class="nav bd-grid">
        <div>
          <a href="#" class="nav__logo">Pengaduan Masyarakat</a>
        </div>

        <div class="nav__menu" id="nav-menu">
          <ul class="nav__list">
            <li class="nav__item">
              <a href="#home" class="nav__link active">Home</a>
            </li>
            <li class="nav__item">
              <a href="#about" class="nav__link">About</a>
            </li>
            <li class="nav__item">
              <a href="#work" class="nav__link">Pengaduan</a>
            </li>
          </ul>
        </div>

        <div class="nav__toggle" id="nav-toggle">
          <i class="bx bx-menu"></i>
        </div>
      </nav>
    </header>

    <main class="l-main">
      @yield('content')
    </main>

    <!--===== FOOTER =====-->
    <footer class="footer">
      <p class="footer__title">Azriel Fauzi Hermansyah</p>
      <div class="footer__social">
        <a href="https://www.instagram.com/azriel_fauzi.h/" class="footer__icon"
          ><i class="bx bxl-instagram"></i
        ></a>
        <a href="https://twitter.com/AzrielFauzi5" class="footer__icon"
          ><i class="bx bxl-twitter"></i
        ></a>
      </div>
      <p>&#169; 2021 copyright all right reserved</p>
    </footer>

    <!--===== SCROLL REVEAL =====-->
    @include('layouts.masyarakat.script')
  </body>
</html>
