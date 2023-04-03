<section id="about" class="about">

<!-- ======= About Me ======= -->
<div class="about-me container">

  <div class="section-title">
    <h2>About</h2>
    <p>Learn more about me</p>
  </div>

  <div class="row">
    <div class="col-lg-4" data-aos="fade-right">
      <img src="{{Helper::settingValue('profile_img')}}" class="img-fluid" alt="">
    </div>
    <div class="col-lg-8 pt-4 pt-lg-0 content" data-aos="fade-left">
      <h3>Fullstack&amp; Developer</h3>
      <p class="fst-italic">
      {{Helper::settingValue('about')}}
      </p>
      <div class="row">
        <div class="col-lg-6">
          <ul>
            <li><i class="bi bi-chevron-right"></i> <strong>Phone:</strong> <span>{{Helper::settingValue('phone')}}</span></li>
            <li><i class="bi bi-chevron-right"></i> <strong>City:</strong> <span>{{Helper::settingValue('city')}}</span></li>
            <li><i class="bi bi-chevron-right"></i> <strong>Email:</strong> <span>{{Helper::settingValue('email')}}</span></li>
          </ul>
        </div>
        <div class="col-lg-6">
          <ul>
            <li><i class="bi bi-chevron-right"></i> <strong>Age:</strong> <span>{{Helper::settingValue('age')}}</span></li>
            <li><i class="bi bi-chevron-right"></i> <strong>Degree:</strong> <span>{{Helper::settingValue('degree')}}</span></li>
            
            
          </ul>
        </div>
      </div>
    </div>
  </div>

</div><!-- End About Me -->

<!-- ======= Counts ======= -->

<!-- ======= Skills  ======= -->
<div class="skills container">

  <div class="section-title">
    <h2>Skills</h2>
  </div>

  <div class="row skills-content">

  @foreach(Helper::getSkills() as $skill)
      <div class="col-lg-6">

        <div class="progress">
          <span class="skill">{{$skill->name}} <i class="val">{{$skill->value}}</i></span>
          <div class="progress-bar-wrap">
            <div class="progress-bar" role="progressbar" aria-valuenow="{{$skill->value}}" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
        </div>


      </div>
    @endforeach


  </div>

</div>
<!-- End Skills -->


</section>