
@extends('layouts.admin')
@section('css')

@endsection

@section('content')
  <div class="container-fluid py-4">
      <div class="row">
          <div class="col-12">
            <div class="card mb-4">
              <div class="card-header pb-0 d-flex justify-content-between">
                <h6>Student Points</h6>
              
              </div>
              <div class="card-body px-0 pt-0 pb-2">

                @if (count($errors) > 0)
                    <div class = "alert alert-danger">
                        <ul>
                        @foreach ($errors->all() as $error)
                            <li class="text-white">{{ $error }}</li>
                        @endforeach
                        </ul>
                    </div>
                @endif
                <input type="hidden" value="{{Auth::user()->type}}" id="typeInput">
              <form method="post" action="{{route('admin.send.points.student')}}" autocomplete="off">
                  @csrf
                  <input type="hidden" class="id" name="internship_id" value="{{$id}}">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="example-text-input" class="form-control-label">Full Name</label>
                          <input class="form-control name" type="text"  name="name" required value="{{$data->name??''}}" placeholder="Jhon">

                        </div>
                        <div class="form-group">
                          <label for="example-text-input" class="form-control-label">Registration No#</label>
                          <input class="form-control email" type="text"  name="reg_no" autocomplete="off" required  value="{{$data->reg_no??''}}" placeholder="Reg-0001">
                        </div>
                        <div class="form-group">
                          <label for="example-text-input" class="form-control-label">Deploma Prepared</label>
                          <input class="form-control email" type="text"  name="deploma" autocomplete="off" required  value="{{$data->deploma??''}}" placeholder="Marketing Course">
                        </div>
                        <div class="form-group">
                          <label for="example-text-input" class="form-control-label">Start Date</label>
                          <input class="form-control email" type="date"  name="start_date" autocomplete="off" required  value="{{$data->start_date??''}}" >
                        </div>
                        <div class="form-group">
                          <label for="example-text-input" class="form-control-label">Location</label>
                          <input class="form-control email" type="text"  name="location" autocomplete="off" required  value="{{$data->location??''}}" placeholder="">
                        </div>
                        
                        
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="example-text-input" class="form-control-label">Date Of Birth</label>
                          <input class="form-control name" type="date"  name="dob" required value="{{$data->dob??''}}" placeholder="">

                        </div>
                        <div class="form-group">
                          <label for="example-text-input" class="form-control-label">Semester</label>
                          <input class="form-control email" type="number"  name="semester" autocomplete="off" required  value="{{$data->semester??''}}" placeholder="3">
                        </div>
                        <div class="form-group">
                          <label for="example-text-input" class="form-control-label">Duration of Internship (Days)</label>
                          <input class="form-control email" type="text"  name="duration" autocomplete="off" required  value="{{$data->duration??''}}" placeholder="90">
                        </div>
                        
                        <div class="form-group">
                          <label for="example-text-input" class="form-control-label">End Date</label>
                          <input class="form-control email" type="date"  name="end_date" autocomplete="off" required  value="{{$data->end_date??''}}" placeholder="Marketing Course">
                        </div>

                        <div class="form-group">
                          <label for="example-text-input" class="form-control-label">Host Institution</label>
                          <input class="form-control email" type="text"  name="host_institute" autocomplete="off" required  value="{{$data->host_institute??''}}" placeholder="Institution">
                        </div>
                        
                        
                      </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Work Plan Produced by Intern</label>
                                <textarea class="form-control" name="intern_plan" rows="5">{{$data->intern_plan??''}}</textarea>

                            </div>
                        </div>
                        <div class="col-md-12 table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                    <th scope="col">Accessment</th>
                                    <th scope="col">Excellent</th>
                                    <th scope="col">Good</th>
                                    <th scope="col">Average</th>
                                    <th scope="col">Insufficient</th>
                                    <th scope="col">Very Weak</th>
                                    <th scope="col">Rating(0 To 4)</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    <tr>
                                        <td>General discipline and human Relations</td>
                                        <td><input @if(isset($data->general_discipline) && $data->general_discipline=='Excellent') checked @endif type="checkbox" value="Excellent" name="general_discipline"></input></td>
                                        <td><input @if(isset($data->general_discipline) && $data->general_discipline=='Good') checked @endif  type="checkbox" value="Good" name="general_discipline"></input></td>
                                        <td><input @if(isset($data->general_discipline) && $data->general_discipline=='Average') checked @endif  type="checkbox" value="Average" name="general_discipline"></input></td>
                                        <td><input @if(isset($data->general_discipline) &&$data->general_discipline=='Insufficient') checked @endif  type="checkbox" value="Insufficient" name="general_discipline"></input></td>
                                        <td><input @if(isset($data->general_discipline) && $data->general_discipline=='Excellent') checked @endif  type="checkbox" value="Weak" name="general_discipline"></input></td>
                                        <td><input type="text" min="0" max="5" required class="form-control" name="general_discipline_rating" value="{{$data->general_discipline_rating??''}}"></input></td>
                                    
                                    </tr>
                                    <tr>
                                        <td>Work sills and handling</td>
                                        <td><input @if(isset($data->work_skill) && $data->work_skill=='Excellent') checked @endif  type="checkbox" value="Excellent" name="work_skill"></input></td>
                                        <td><input @if(isset($data->work_skill) && $data->work_skill=='Good') checked @endif type="checkbox" value="Good" name="work_skill"></input></td>
                                        <td><input @if(isset($data->work_skill) && $data->work_skill=='Average') checked @endif type="checkbox" value="Average" name="work_skill"></input></td>
                                        <td><input @if(isset($data->work_skill) && $data->work_skill=='Insufficient') checked @endif type="checkbox" value="Insufficient" name="work_skill"></input></td>
                                        <td><input @if(isset($data->work_skill) && $data->work_skill=='Weak') checked @endif type="checkbox" value="Weak" name="work_skill"></input></td>
                                        <td><input type="text" min="0" max="5" required class="form-control" name="work_skill_rating" value="{{$data->work_skill_rating??''}}"></input></td>
                                    
                                    </tr>
                                    <tr>
                                        <td> Initiative/Entrepreneurship</td>
                                        <td><input @if(isset($data->initiative) && $data->initiative=='Excellent') checked @endif type="checkbox" value="Excellent" name="initiative"></input></td>
                                        <td><input @if(isset($data->initiative) && $data->initiative=='Good') checked @endif type="checkbox" value="Good" name="initiative"></input></td>
                                        <td><input @if(isset($data->initiative) && $data->initiative=='Average') checked @endif type="checkbox" value="Average" name="initiative"></input></td>
                                        <td><input @if(isset($data->initiative) && $data->initiative=='Insufficient') checked @endif type="checkbox" value="Insufficient" name="initiative"></input></td>
                                        <td><input @if(isset($data->initiative) && $data->initiative=='Weak') checked @endif type="checkbox" value="Weak" name="initiative"></input></td>
                                        <td><input type="text" min="0" max="5" required class="form-control" name="initiative_rating" value="{{$data->initiative_rating ??''}}"></input></td>
                                    
                                    </tr>
                                    <tr>
                                        <td> Imagination Skills and inovation</td>
                                        <td><input @if(isset($data->imagination_skills) && $data->imagination_skills=='Excellent') checked @endif type="checkbox" value="Excellent" name="imagination_skills"></input></td>
                                        <td><input @if(isset($data->imagination_skills) && $data->imagination_skills=='Good') checked @endif type="checkbox" value="Good" name="imagination_skills"></input></td>
                                        <td><input @if(isset($data->imagination_skills) && $data->imagination_skills=='Average') checked @endif type="checkbox" value="Average" name="imagination_skills"></input></td>
                                        <td><input @if(isset($data->imagination_skills) && $data->imagination_skills=='Insufficient') checked @endif type="checkbox" value="Insufficient" name="imagination_skills"></input></td>
                                        <td><input @if(isset($data->imagination_skills) && $data->imagination_skills=='Weak') checked @endif type="checkbox" value="Weak" name="imagination_skills"></input></td>
                                        <td><input type="text" min="0" max="5" required class="form-control" name="imagination_skills_rating" value="{{$data->imagination_skills_rating??''}}"></input></td>
                                    
                                    </tr>
                                    <tr>
                                        <td>Knowledge acquired on the internship site</td>
                                        <td><input @if(isset($data->knowledge_aquired) && $data->knowledge_aquired=='Excellent') checked @endif type="checkbox" value="Excellent" name="knowledge_aquired"></input></td>
                                        <td><input @if(isset($data->knowledge_aquired) && $data->knowledge_aquired=='Good') checked @endif type="checkbox" value="Good" name="knowledge_aquired"></input></td>
                                        <td><input @if(isset($data->knowledge_aquired) && $data->knowledge_aquired=='Average') checked @endif type="checkbox" value="Average" name="knowledge_aquired"></input></td>
                                        <td><input @if(isset($data->knowledge_aquired) && $data->knowledge_aquired=='Insufficient') checked @endif type="checkbox" value="Insufficient" name="knowledge_aquired"></input></td>
                                        <td><input @if(isset($data->knowledge_aquired) && $data->knowledge_aquired=='Weak') checked @endif type="checkbox" value="Weak" name="knowledge_aquired"></input></td>
                                        <td><input type="text" min="0" max="5" required class="form-control" name="knowledge_aquired_rating" value="{{$data->knowledge_aquired_rating??''}}"></input></td>
                                    
                                    </tr>
                                    
                                </tbody>
                            </table>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Total score</label>
                                <input required type="number" max="100" min="0" value="{{$data->total_score??''}}" class="form-control" name="total_score"></input>

                            </div>

                            
                        </div>
                    </div>
                  </div>
                  @if(Auth::user()->type!='student')
                  <div class="modal-footer mr-5">
                    <button type="submit" class="btn btn-primary" style="margin-right:20px;">Send</button>
                  </div>
                  @endif
                </form>
              </div>
            </div>
          </div>
      </div>
  </div>





@endsection


@section('script')

<script>
    var valueinput=$('#typeInput').val();
    if(valueinput=='student')
    {
        $('input').attr('disabled',true);
    }
</script>

@endsection





