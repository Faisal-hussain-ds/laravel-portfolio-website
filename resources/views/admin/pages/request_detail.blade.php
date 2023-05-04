
@extends('layouts.admin')
@section('css')
<style>
  .bg-gray{
    background-color: #cccc !important;
  }
</style>
@endsection

@section('content')
  <div class="container-fluid py-4">
      <div class="row">
          <div class="col-12">
            <div class="card mb-4">
              <div class="card-header pb-0">
                <h6>Request Detail</h6>
              </div>
              <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0">
                  <table class="table align-items-center mb-0">
                    <thead>
                      <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Key</th>
                        
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Value</th>
                        
                      </tr>
                    </thead>
                    <tbody>

                      @foreach($data as $key => $item)
                        @if($key!='id' && $key!='department_id' && $key!='user_id' && $key!='assign_to' && $key!='checked_by'  && $key!='user' && $key!='supervisor_comments'  && $key!='head'  && $key!='supervisor')
                            <tr class="text-center ml-auto">
                                <td>
                                <div class="d-flex px-2 py-1">
                                    @if($key=='desc')
                                    <h5>Description</h5>
                                    @else
                                    <h5>{{ucwords(str_replace("_", " ", $key))}}</h5>
                                    @endif
                                </div>
                                </td>
                                <td class="">
                                    @if($key=='created_at' || $key=='updated_at')
                                    <span>
                                    {{Carbon\Carbon::parse($item)->diffForHumans()}}
                                    </span>
                                    @elseif($key=='user' || $key=='head' || $key=='supervisor')
                                    <span>
                                   
                                    </span>
                                    @else
                                    <span>{{  $item }}</span>
                                    @endif
                                </td>
                                
                            </tr>
                        @endif
                        @if($key=='user')
                            <tr class="text-center ml-auto bg-gray">
                                <td>
                                <div class="d-flex px-2 py-1">
                                  
                                    <h5>Student Name</h5>
                                   
                                </div>
                                </td>
                                <td class="">
                                   <span>{{$item['name']??'N/A'}}</span>
                                </td>
                                
                            </tr>
                        @endif
                        @if($key=='supervisor')
                            <tr class="text-center ml-auto bg-gray">
                                <td>
                                <div class="d-flex px-2 py-1">
                                  
                                    <h5>Supervisor Name</h5>
                                   
                                </div>
                                </td>
                                <td class="">
                                   <span>{{$item['name']??'N/A'}}</span>
                                </td>
                                
                            </tr>
                        @endif

                        
                        
                      @endforeach
                    </tbody>
                  </table>
                </div>
                @if(Auth::user()->type!=='student' && Auth::user()->type!=='supervisor')
                <div class="row">
                  
                    <div class="col-md-2 col-2">
                  
                    </div>
                        <div class="col-md-8 col-8">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Approve</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Reject</button>
                                </li>
                            
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                                    @if (count($errors) > 0)
                                        <div class = "alert alert-danger">
                                            <ul>
                                            @foreach ($errors->all() as $error)
                                                <li class="text-white">{{ $error }}</li>
                                            @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <form action="{{route('request.review')}}" method="post">
                                        @csrf
                                          <select class="form-select mt-3 form-control" aria-label="Default select example" name="supervisor" required>
                                              <option value="" disabled selected>Assign Supervisor</option>
                                              @foreach(Helper::getUsers('supervisor') as $user)

                                              <option value="{{$user->id}}">{{$user->name}}</option>
                                              @endforeach   
                                          </select>
                                          <input type="hidden" name="status" value="approved">
                                          <input type="hidden" name="id" value="{{$data['id']}}">
                                          <textarea name="comments" class="form-control mt-2" rows="6" placeholder="Comments if needed"></textarea>

                                          <button type="submit" class="btn btn-success mt-3">Accept</button>
                                      </form>
                                </div>
                                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

                                <form action="{{route('request.review')}}" method="post">
                                        @csrf
                                      
                                        <input type="hidden" name="status" value="rejected">
                                        <input type="hidden" name="id" value="{{$data['id']}}">
                                        <textarea name="comments" class="form-control mt-2" rows="6" placeholder="Comments if needed"></textarea>

                                        <button type="submit" class="btn btn-danger mt-3">Reject</button>
                                    </form>
                                </div>

                            </div>
                        </div>
                    <div class="col-md-2 col-2">
                  
                    </div>
                </div>
                @endif
                @if( Auth::user()->type=='supervisor')
                <div class="row">
                  
                    <div class="col-md-2 col-2">
                  
                    </div>
                        <div class="col-md-8 col-8">
                        <form action="{{route('request.review')}}" method="post">
                                        @csrf
                                          
                                          <input type="hidden" name="status" value="approved">
                                          <input type="hidden" name="id" value="{{$data['id']}}">
                                          <input type="hidden" name="supervisor" value="{{Auth::id()}}">
                                          <textarea name="supervisor_comments" class="form-control mt-2 ckeditor" rows="6" placeholder="Share address , tips , guidelines etc">
                                            {{$data['supervisor_comments']}}
                                          </textarea>

                                          <button type="submit" class="btn btn-success mt-3">Send</button>
                                      </form>
                        </div>
                    <div class="col-md-2 col-2">
                  
                    </div>
                </div>
                @endif
                @if( Auth::user()->type=='student')
                <div class="row">
                  
                    <div class="col-md-2 col-2">
                  
                    </div>
                        <div class="col-md-8 col-8">
                          <b>Supervisor Comments</b>
                          <textarea disabled name="supervisor_comments" class="form-control mt-2 ckeditor" rows="6" placeholder="Share address , tips , guidelines etc">
                                            {{$data['supervisor_comments']}}
                                          </textarea>
                        </div>
                    <div class="col-md-2 col-2">
                  
                    </div>
                </div>
                @endif

              </div>
            </div>
          </div>
      </div>
  </div>



@endsection


@section('script')

@endsection





