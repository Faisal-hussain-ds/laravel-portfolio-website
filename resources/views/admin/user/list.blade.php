
@extends('layouts.admin')
@section('css')

@endsection

@section('content')
  <div class="container-fluid py-4">
      <div class="row">
          <div class="col-12">
            <div class="card mb-4">
              <div class="card-header pb-0 d-flex justify-content-between">
                <h6>Users</h6>
                <a  href="{{route('admin.user.create')}}" class="btn btn-sm btn-success add-edit-user" data-name=" " data-title="Add User" data-id="" data-email=" " data-password=" " data-type="">Add User</a>
              </div>
              <div class="card-body px-0 pt-0 pb-2">
              <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Admin</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="head-tab" data-bs-toggle="tab" data-bs-target="#head" type="button" role="tab" aria-controls="profile" aria-selected="false">Heads</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="supervisors-tab" data-bs-toggle="tab" data-bs-target="#supervisors" type="button" role="tab" aria-controls="contact" aria-selected="false">Supervisors</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="student-tab" data-bs-toggle="tab" data-bs-target="#student" type="button" role="tab" aria-controls="contact" aria-selected="false">Students</button>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                            <!-- all users -->

                            <table class="table caption-top table-bordered">
                                <thead>
                                    <tr>
                                    <th >Name</th>
                                    <th >Email</th>
                                    <th >Type</th>
                                    <th >Created At</th>
                                    <th >Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users['admin']??[] as $user)
                                    <tr class="pl-md" >
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>
                                        <span class="badge bg-success">{{$user->type}}</span>
                                        </td>
                                        <td>{{$user->created_at->diffForHumans()}}</td>
                                        <td>
                                        <a class="btn btn-xs btn-info add-edit-user" type="button" href="{{route('admin.user.edit',$user->id)}}"> <i class="fa fa-pencil"></i></a>
                                       
                                        </td>
                                    </tr>

                                    @endforeach
                                   
                                </tbody>
                            </table>

                    </div>
                    <div class="tab-pane fade" id="head" role="tabpanel" aria-labelledby="head-tab">
                            <!-- head users -->

                            <table class="table caption-top table-bordered">
                                <thead>
                                    <tr>
                                    <th >Name</th>
                                    <th >Email</th>
                                    <th >Type</th>
                                    <th >Created At</th>
                                    <th >Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users['head']??[] as $user)
                                    <tr class="pl-md" >
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>
                                        <span class="badge bg-info">{{$user->type}}</span>
                                        </td>
                                        <td>{{$user->created_at->diffForHumans()}}</td>
                                        <td>
                                        <a class="btn btn-xs btn-info add-edit-user" type="button" href="{{route('admin.user.edit',$user->id)}}"> <i class="fa fa-pencil"></i></a>
                                        <button class="btn btn-xs btn-danger show_confirm" type="button" data-url="{{route('admin.skill.setting.delete',$user->id)}}"><i class="fa fa-trash"></i></button>  
                                        </td>
                                    </tr>

                                    @endforeach
                                   
                                </tbody>
                            </table>

                    </div>
                    <div class="tab-pane fade" id="supervisors" role="tabpanel" aria-labelledby="supervisors-tab">

                         <!-- supervisors users -->

                         <table class="table caption-top table-bordered">
                                <thead>
                                    <tr>
                                    <th >Name</th>
                                    <th >Email</th>
                                    <th >Type</th>
                                    <th >Created At</th>
                                    <th >Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users['supervisor']??[] as $user)
                                    <tr class="pl-md" >
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>
                                        <span class="badge bg-warning">{{$user->type}}</span>
                                        </td>
                                        <td>{{$user->created_at->diffForHumans()}}</td>
                                        <td>
                                        <a class="btn btn-xs btn-info add-edit-user" type="button" href="{{route('admin.user.edit',$user->id)}}"> <i class="fa fa-pencil"></i></a>
                                        <button class="btn btn-xs btn-danger show_confirm" type="button" data-url="{{route('admin.skill.setting.delete',$user->id)}}"><i class="fa fa-trash"></i></button>  
                                        </td>
                                    </tr>

                                    @endforeach
                                   
                                </tbody>
                            </table>

                    </div>
                    <div class="tab-pane fade" id="student" role="tabpanel" aria-labelledby="student-tab">

                         <!-- student users -->

                         <table class="table caption-top table-bordered">
                                <thead>
                                    <tr>
                                    <th >Name</th>
                                    <th >Email</th>
                                    <th >Type</th>
                                    <th >Created At</th>
                                    <th >Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users['student']??[] as $user)
                                    <tr class="pl-md" >
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>
                                        <span class="badge bg-primary">{{$user->type}}</span>
                                        </td>
                                        <td>{{$user->created_at->diffForHumans()}}</td>
                                        <td>
                                        <a class="btn btn-xs btn-info add-edit-user" type="button" href="{{route('admin.user.edit',$user->id)}}"> <i class="fa fa-pencil"></i></a>
                                        <button class="btn btn-xs btn-danger show_confirm" type="button" data-url="{{route('admin.skill.setting.delete',$user->id)}}"><i class="fa fa-trash"></i></button>  
                                        </td>
                                        
                                    </tr>

                                    @endforeach
                                   
                                </tbody>
                            </table>
                    </div>
                </div>
              </div>
            </div>
          </div>
      </div>
  </div>


     <!-- Modal -->



@endsection


@section('script')

@endsection





