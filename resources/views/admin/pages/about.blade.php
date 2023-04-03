
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

</style>
@endsection

@section('content')

    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
        
              <form method="post" action="{{route('admin.info.setting')}}">
                @csrf
                <div class="card-body">
                  <p class="text-uppercase text-sm">About Page</p>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Designation</label>
                        <input class="form-control" type="text"  name="designation" required value="{{Helper::settingValue('designation')}}">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Degree</label>
                        <input class="form-control" type="text" name="degree" required value="{{Helper::settingValue('degree')}}">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Age</label>
                        <input class="form-control" type="text" name="age" value="{{Helper::settingValue('age')}}" required>
                      </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Intro</label>
                        
                            <textarea  class="form-control textarea" name="intro" required type="text" rows="5">{{Helper::settingValue('intro')}}
                            </textarea>
                        </div>
                    </div>
                    
                  </div>
                  <hr class="horizontal dark">
                  <p class="text-uppercase text-sm">Resume</p>
                  <div class="row">
                    
                  
                    <div class="col-md-12">
                      <div class="form-group">
                        
                        <textarea id="textarea" class="form-control textarea" type="text" name="resume" >{{Helper::settingValue('resume')}}</textarea>
                      </div>
                    </div>
                    
                    
                  </div>
                  <hr class="horizontal dark">
                  <p class="text-uppercase text-sm">Social Links</p>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Facebook</label>
                        <input class="form-control" type="text"  name="facebook_link"  value="{{Helper::settingValue('facebook_link')}}">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Skype</label>
                        <input class="form-control" type="text"  name="skype_link"  value="{{Helper::settingValue('skype_link')}}">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Github</label>
                        <input class="form-control" type="text" name="github_link"  value="{{Helper::settingValue('github_link')}}">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="example-text-input" class="form-control-label">LinkedIn</label>
                        <input class="form-control" type="text" name="linkedin_link" value="{{Helper::settingValue('linkedin_link')}}" >
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Youtube</label>
                        <input class="form-control" type="text" name="linkedin_link" value="{{Helper::settingValue('youtube_link')}}" >
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Twitter</label>
                        <input class="form-control" type="text" name="twitter_link" value="{{Helper::settingValue('twitter_link')}}" >
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Instagram</label>
                        <input class="form-control" type="text" name="instagram_link" value="{{Helper::settingValue('instagram_link')}}" >
                      </div>
                    </div>
                    
                    
                  </div>
                  <hr class="horizontal dark">
                  <div class="d-flex justify-content-between">
                      <p class="text-uppercase text-sm"><b>Skills</b></p>
                      <p class="text-uppercase text-sm">
                      
                      <button type="button" class="btn btn-sm btn-success add-edit-skill" data-title="Add Skill" data-id="" data-name="skill name" data-value="100">Add Skill</button>
                      </p>
                    </div>
                  <div class="row">
                    <div class="col-md-12">
                        <table class="table align-items-center mb-0">
                          <thead>
                            <tr>
                              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Value</th>
                              
                              <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                              
                            </tr>
                          </thead>
                          <tbody>
                            @if(count(Helper::getSkills()) > 0)
                                @foreach(Helper::getSkills() as $skill)
                                  <tr class="">
                                    <td>
                                      {{$skill->name??""}}
                                    </td>
                                    <td>
                                      {{$skill->value??""}}
                                    </td>
                                    <td class="ml-auto text-center ">
                                    <button class="btn btn-xs btn-info add-edit-skill" type="button" data-title="Edit Skill" data-id="{{$skill->id}}" data-name="{{$skill->name}}" data-value="{{$skill->value}}"> <i class="fa fa-pencil"></i></button>
                                    <button class="btn btn-xs btn-danger show_confirm" type="button" data-url="{{$skill->id}}"><i class="fa fa-trash"></i></button>
                                    
                                    </td>
                                    
                                  </tr>
                                @endforeach
                              @else
                                N/A
                              @endif
                          
                          </tbody>
                        </table>
                    </div>
                    
                  </div>
                  <hr class="horizontal dark">
                 
                  
                </div>
                <div class="row">
                    <div class="col-md-12">
                      
                        <div class="d-flex align-items-center mb-3">
                            <button type="submit" class="btn btn-primary btn-sm ms-auto save-btn">Save</button>
                        </div>
                    </div>
                </div>
                
              </form>

              
          </div>
        </div>
        
      </div>

    </div>




      <!-- skill model is here -->


      <!-- Modal -->
      <div class="modal fade skill-modal" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="staticBackdropLabel">Skill</h5>
              <button type="button" class="btn btn-xs" data-bs-dismiss="modal" aria-label="Close"><i class="fa fa-close"></i></button>
            </div>
            <div class="modal-body">
              <form method="post" action="{{route('admin.skill.setting.save')}}">
                  @csrf
                  <input type="hidden" class="id" name="id" value="">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="example-text-input" class="form-control-label">Name</label>
                          <input class="form-control name" type="text"  name="name" required value="">
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="example-text-input" class="form-control-label">Value</label>
                          <input class="form-control value" type="number" name="value" min="50" max="100" required value="">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                  </div>
                </form>
            </div>
          </div>
        </div>
      </div>


@endsection


@section('script')


<script>
$(document).ready(function(){
  $('.add-edit-skill').click(function(){
    var id=$(this).data('id');
    var name=$(this).data('name');
    var value=$(this).data('value');
    var title=$(this).attr('data-title');    

    $('.skill-modal').find('#staticBackdropLabel').text(title);
    $('.skill-modal').find('.name').attr('value',name);
    $('.skill-modal').find('.value').attr('value',value);
    $('.skill-modal').find('.id').attr('value',id);

    $('.skill-modal').modal('show');
  });
});

</script>

<script src="https://cdn.ckeditor.com/ckeditor5/35.1.0/classic/ckeditor.js"></script>
        <script>
            ClassicEditor
                .create(document.querySelector('#textarea'))
                .catch(error => {
                    console.error(error);
                });
        </script>

@endsection





