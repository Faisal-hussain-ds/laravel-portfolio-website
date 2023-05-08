
@extends('layouts.admin')
@section('css')

@endsection

@section('content')
  <div class="container-fluid py-4">
      <div class="row">
          <div class="col-12">
            <div class="card mb-4">
              <div class="card-header pb-0 d-flex justify-content-between">
                <h6>Create User</h6>
              
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
                  <input type="hidden" class="id" name="id" value="">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="example-text-input" class="form-control-label">Name</label>
                          <input class="form-control name" type="text"  name="name" required value="">

                        </div>
                        <div class="form-group">
                          <label for="example-text-input" class="form-control-label">email</label>
                          <input class="form-control email" type="email"  name="email" autocomplete="off" required  value="">
                        </div>
                        <div class="form-group">
                          <label for="example-text-input" class="form-control-label">Password</label>
                          <input class="form-control password" type="text" autocomplete="off" name="password" required value="">
                        </div>
                        <div class="form-group">
                          <label for="example-text-input" class="form-control-label type">Type</label>
                            <select class="form-select" name="type">
                              
                                <option value="student">Student</option>
                                <option value="supervisor">Supervisor</option>
                                <option value="head">Head</option>
                                <option value="admin">Admin</option>
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





