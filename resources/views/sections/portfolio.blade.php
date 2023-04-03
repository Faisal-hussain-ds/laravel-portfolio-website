<section id="portfolio" class="portfolio">
    <div class="container">

      <div class="section-title">
        <h2>Portfolio</h2>
        <p>My Works</p>
      </div>


      <div class="row portfolio-container">

      @if(count(Helper::getPortfolio())>0)

        @foreach(Helper::getPortfolio() as $file)
          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-wrap">
              <img src="{{asset($file->img)}}" class="img-fluid" alt="">
              <div class="portfolio-info">
                <div class="portfolio-links">
                  <a href="{{asset($file->img)}}" data-gallery="portfolioGallery" class="portfolio-lightbox" title="App 1"><i class="bx bx-plus"></i></a>
                 
                </div>
              </div>
            </div>
          </div>
        @endforeach
        @endif

       

      </div>

    </div>
  </section>