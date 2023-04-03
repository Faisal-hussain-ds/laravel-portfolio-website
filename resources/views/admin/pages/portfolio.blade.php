
@extends('layouts.admin')
@section('css')

<style>

.save-btn {
  position: fixed;
  bottom: 20px;
  left: 90%;
  border: none;
  box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);
  z-index: 9999;
}
.cursor-pointer{
    cursor: pointer !important;
}

</style>
@endsection

@section('content')


    <div class="d-none" id="new-img">
        <div class="col-md-6" id="dropify-img">
            <div class="form-group">
                <label for="example-text-input" class="form-control-label d-flex justify-content-end cursor-pointer mt-2  pt-1"><i class="fa fa-trash text-danger remove-img"></i></label>
                <input type="file" name="portfolio[]" data-max-file-size-preview="3M" class="dropify" data-height="250"/>
            </div>
        </div>
    </div>

    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
        
              <form method="post" action="{{route('admin.portfolio.setting')}}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="d-flex justify-content-between">
                    <p class="text-uppercase text-sm">Portfolio</p>
                    <p class="text-uppercase text-sm">
                        <button type="button" class="btn btn-sm btn-success add-more-img">Add More +</button>
                    </p>
                  </div>
                  <div class="row img-row">
                      @if(count(Helper::getPortfolio())> 0)
                   @foreach(Helper::getPortfolio() as $key=> $img)
                  
                        <div class="col-md-6" id="dropify-img">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label cursor-pointer d-flex justify-content-end mt-2  pt-1 ">
                                    
                                    <i class="fa fa-trash text-danger remove-img" data-url="{{$img->img}}"></i>
                                   
                                </label>
                                <input type="file" name="portfolio[]" data-max-file-size-preview="3M" class="dropify" data-height="250" data-default-file="{{$img->img}}"/>
                            </div>
                        </div>
                   @endforeach
                   @else
                   
                        <div class="col-md-6" id="dropify-img">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label cursor-pointer">Image 
                                </label>
                                <input type="file" name="portfolio[]" data-max-file-size-preview="3M" class="dropify" data-height="250" />
                            </div>
                        </div>

                   @endif
                    
                  </div>
                 
                  <div class="row">
                    <div class="col-md-12">
                        <div class="d-flex align-items-center mb-3">
                            <button type="submit" class="btn btn-primary btn-sm ms-auto save-btn">Save</button>
                        </div>
                    </div>
                  </div>
                </div>

              </form>
          </div>
        </div>
        
      </div>
    </div>

@endsection


@section('script')

<script>

drEvent.on('dropify.afterClear', function(event, element){

    if(element.settings.defaultFile)
        {
            var html=`<input name="remove_urls[]" type="hidden" value="${element.settings.defaultFile}" />`;
            $('.img-row').append(html);
        }

});
drEvent.on('change.dropify', function(event, element){

    console.log(event,'jcjkdkjdfkjjkfd');

});
    

    $('.add-more-img').click(function(e){
        e.preventDefault();

        var html1=`    <div class="col-md-6" id="dropify-img">
            <div class="form-group">
                <label for="example-text-input" class="form-control-label d-flex justify-content-end cursor-pointer mt-2  pt-1"><i class="fa fa-trash text-danger remove-img"></i></label>
                <input type="file" name="portfolio[]" data-max-file-size-preview="3M" class="dropify" data-height="250"/>
            </div>
        </div>`;
        $('.img-row').append(html1);
        
        $('.dropify').dropify();
        

    })
    $(document).on('click','.remove-img',function(e){
        e.preventDefault();
        var url=$(this).attr('data-url');
       
        $(this).closest('#dropify-img').remove();

        if(url!='undefined')
        {
            var html=`<input name="remove_urls[]" type="hidden" value="${url}" />`;
            $('.img-row').append(html);
        }

    })
</script>

@endsection





