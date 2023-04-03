<section id="contact" class="contact">
    <div class="container">

      <div class="section-title">
        <h2>Contact</h2>
        <p>Contact Me</p>
      </div>

      <div class="row mt-2">

        <div class="col-md-6 d-flex align-items-stretch">
          <div class="info-box">
            <i class="bx bx-map"></i>
            <h3>My Address</h3>
            <p>{{Helper::settingValue('address')}}</p>
          </div>
        </div>

        <div class="col-md-6 mt-4 mt-md-0 d-flex align-items-stretch">
          <div class="info-box">
            <i class="bx bx-share-alt"></i>
            <h3>Social Profiles</h3>
            <div class="social-links">
              <a href="{{Helper::settingValue('twitter_link')}}" class="twitter"><i class="bi bi-twitter"></i></a>
              <a href="{{Helper::settingValue('facebook_link')}}" class="facebook"><i class="bi bi-facebook"></i></a>
              <a href="{{Helper::settingValue('instagram_link')}}" class="instagram"><i class="bi bi-instagram"></i></a>
              <a href="{{Helper::settingValue('skype_link')}}" class="google-plus"><i class="bi bi-skype"></i></a>
              <a href="{{Helper::settingValue('linkedin_link')}}" class="linkedin"><i class="bi bi-linkedin"></i></a>
              <a href="{{Helper::settingValue('github_link')}}" class="github"><i class="bi bi-github"></i></a>
            </div>
          </div>
        </div>

        <div class="col-md-6 mt-4 d-flex align-items-stretch">
          <div class="info-box">
            <i class="bx bx-envelope"></i>
            <h3>Email Me</h3>
            <p>{{Helper::settingValue('email')}}</p>
          </div>
        </div>
        <div class="col-md-6 mt-4 d-flex align-items-stretch">
          <div class="info-box">
            <i class="bx bx-phone-call"></i>
            <h3>Call Me</h3>
            <p>{{Helper::settingValue('phone')}}</p>
          </div>
        </div>
      </div>
      @foreach($errors as $error)
          <div class="alert alert-danger">{{ $error }}</div>
      @endforeach
      <form action="{{route('user.query')}}" method="post" class="php-email-form1 mt-4" id="contactUs-form">
        @csrf
        <div class="row">
          <div class="col-md-6 form-group">
            <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" >
          </div>
          <div class="col-md-6 form-group mt-3 mt-md-0">
            <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" >
          </div>
        </div>
        <div class="form-group mt-3">
          <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" >
        </div>
        <div class="form-group mt-3">
          <textarea class="form-control" name="desc" rows="5" placeholder="Message" ></textarea>
        </div>
        <div class="text-center"><button type="submit" id="send-message">Send Message</button></div>
      </form>

    </div>
  </section>