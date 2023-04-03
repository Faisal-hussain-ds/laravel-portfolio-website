<header id="header">
    <div class="container">

      <h1><a href="#">{{Helper::settingValue('name')}}</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="mr-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a> -->
      <h2>I'm a passionate <span>Fullstack Developer</span> from Lahore , Pk</h2>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link active" href="#header">Home</a></li>
          <li><a class="nav-link" href="#about">About</a></li>
          <li><a class="nav-link" href="#resume">Resume</a></li>
          <li><a class="nav-link" href="#portfolio">Portfolio</a></li>
          <li><a class="nav-link" href="#contact">Contact</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      <div class="social-links">
        <a href="{{Helper::settingValue('twitter_link')}}" class="twitter"><i class="bi bi-twitter"></i></a>
        <a href="{{Helper::settingValue('facebook_link')}}" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="{{Helper::settingValue('github_link')}}" class="github"><i class="bi bi-github"></i></a>
        <a href="{{Helper::settingValue('linkedin_link')}}" class="linkedin"><i class="bi bi-linkedin"></i></a>
      </div>

      <img src="{{Helper::settingValue('cover_img')}}" class="w-100 cover_img">

    </div>
  </header>