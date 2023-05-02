
@extends('layouts.admin')
@section('css')

@endsection

@section('content')
  <div class="container-fluid py-4">
      <div class="row">
          <div class="col-12">
            <div class="card mb-4">
              <div class="card-header pb-0 d-flex justify-content-between">
                <h6>Edit User</h6>
                
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
              <form method="post" action="{{route('admin.save.user')}}" autocomplete="off">
                  @csrf
                  <input type="hidden" class="id" name="id" value="{{$user->id}}">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="example-text-input" class="form-control-label">Name</label>
                          <input class="form-control name" type="text"  name="name" required value="{{$user->name}}">

                        </div>
                        <div class="form-group">
                          <label for="example-text-input" class="form-control-label">email</label>
                          <input class="form-control email" type="email"  name="email" autocomplete="off" required  value="{{$user->email}}">
                        </div>
                        <div class="form-group">
                          <label for="example-text-input" class="form-control-label">Password</label>
                          <input class="form-control password" type="text" autocomplete="off" name="password"  value="{{$user->temp_password}}">
                        </div>
                        <div class="form-group">
                          <label for="example-text-input" class="form-control-label type">Type</label>
                            <select class="form-select" name="type">
                              
                                <option @if($user->type=='admin') selected @endif value="admin">Admin</option>
                                <option @if($user->type=='student') selected @endif  value="student">Student</option>
                                <option @if($user->type=='head') selected @endif  value="head">Head</option>
                                <option @if($user->type=='supervisor') selected @endif  value="supervisor">Supervisor</option>
                            </select>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer mr-5">
                    <button type="submit" class="btn btn-primary" style="margin-right:20px;">Save</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
      </div>
  </div>





@endsection


@section('script')

@endsection





