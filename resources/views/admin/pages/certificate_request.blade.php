
@extends('layouts.admin')
@section('css')

@endsection

@section('content')
  <div class="container-fluid py-4">
      <div class="row">
          <div class="col-12">
            <div class="card mb-4">
              <div class="card-header pb-0 d-flex justify-content-between">
                <h6>Send Certificate</h6>
              
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
              <form method="post" action="{{route('admin.send.certificate')}}" autocomplete="off">
                  @csrf
                  <input type="hidden" class="id" name="internship_id" value="{{$id}}">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="example-text-input" class="form-control-label">Student Name</label>
                          <input class="form-control name" type="text"  name="name" required value="" placeholder="Jhon">

                        </div>
                        <div class="form-group">
                          <label for="example-text-input" class="form-control-label">Score</label>
                          <input class="form-control email" type="text"  name="score" autocomplete="off" required  value="" placeholder="90">
                        </div>
                        <div class="form-group">
                          <label for="example-text-input" class="form-control-label">Course</label>
                          <input class="form-control email" type="text"  name="course" autocomplete="off" required  value="" placeholder="Marketing Course">
                        </div>
                        <div class="form-group">
                          <label for="example-text-input" class="form-control-label">Start Date</label>
                          <input class="form-control email" type="date"  name="start_date" autocomplete="off" required  value="" >
                        </div>
                        <div class="form-group">
                          <label for="example-text-input" class="form-control-label">End Date</label>
                          <input class="form-control email" type="date"  name="end_date" autocomplete="off" required  value="" placeholder="Marketing Course">
                        </div>
                        
                        
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer mr-5">
                    <button type="submit" class="btn btn-primary" style="margin-right:20px;">Send</button>
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





