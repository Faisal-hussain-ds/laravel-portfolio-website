
@extends('layouts.admin')
@section('css')

@endsection

@section('content')
  <div class="container-fluid py-4">
      <div class="row">
          <div class="col-12">
            <div class="card mb-4">
            <div class="card-header pb-0 d-flex justify-content-between">
                <h6>Requests</h6>
                @if(Auth::user()->type=='student')
                <a href="{{url('/internship-request')}}" class="btn btn-sm btn-success send-request" data-title="Department" data-id="" data-name="Department name" data-value="100">Send Request</a>
                @endif
              </div>
              <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0">
                  <table class="table align-items-center mb-0">
                    <thead>
                      <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Internship Theme</th>
                        
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Department</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Created At</th>
                        <th class="text-left text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                      </tr>
                    </thead>
                    <tbody>

                      @foreach($data as $item)
                          <tr class="text-center ml-auto">
                            <td>
                              <div class="d-flex px-2 py-1">
                                <h5>{{$item->internship_theme}}</h5>
                              </div>
                            </td>
                            <td class="">
                            {{$item->department}}
                            </td>
                            <td class="">
                            
                            <span class="badge @if($item->status=='pending') bg-warning @elseif($item->status=='approved') bg-success @else bg-danger @endif">{{ucwords($item->status)}}</span>
                            </td>
                            <td class="">
                            {{$item->created_at->diffForHumans()}}
                            </td>
                            <td class="ml-auto text-end d-flex">
                              <div class="d-flex ">
                                  
                                  <a class="btn btn-xs btn-info add-edit-user" type="button" href="{{route('admin.request.detail',encrypt($item->id))}}"> <i class="fa fa-eye"></i> View Detail </a>
                                  @if(Auth::user()->type=='supervisor')
                                     <a class="btn btn-xs btn-warning add-edit-user" type="button" href="{{route('admin.request.certificate',encrypt($item->id))}}"> <i class="fa fa-star"></i> Send Certificate</a>
                                  @endif
                              </div>
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



@endsection


@section('script')

@endsection





