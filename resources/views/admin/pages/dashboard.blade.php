@extends('layouts.admin')
@section('css')
@endsection

@section('content')


<div class="container-fluid py-4">
      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Total Requests</p>
                    <h5 class="font-weight-bolder">
                      53,000
                    </h5>
                    
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                    <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Total Users</p>
                    <h5 class="font-weight-bolder">
                      {{count(Helper::getUsers('All'))??0}}
                    </h5>
                    
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                    <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>       
      </div>

      <div class="row mt-5">
          <div class="col-12">
            <div class="card mb-4">
              <div class="card-header pb-0 d-flex justify-content-between">
                <h6>Departments</h6>

                <button type="button" class="btn btn-sm btn-success add-edit-skill" data-title="Department" data-id="" data-name="Department name" data-value="100">Add Skill</button>

              </div>
              <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0">
                  <table class="table align-items-center mb-0">
                    <thead>
                      <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                        
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"></th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"></th>
                        <th class="text-left text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach( Helper::getDepartments() as $item)
                        <tr class="text-center">
                          <td>
                            <div class="d-flex px-2 py-1">
                              <h5>{{$item->name}}</h5>
                            </div>
                          </td>
                          <td class="">
                          </td>
                          <td class="">
                          </td>
                          <td class="ml-auto text-center d-flex">
                            <div class="d-flex px-2 py-1">
                            <button class="btn btn-xs btn-info add-edit-skill" type="button" data-title="Edit Department" data-id="{{$item->id}}" data-name="{{$item->name}}"> <i class="fa fa-pencil"></i></button>
                            <button class="btn btn-xs btn-danger show_confirm" type="button" data-url="{{route('admin.skill.setting.delete',$item->id)}}"><i class="fa fa-trash"></i></button>
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






      <!-- Modal -->
      <div class="modal fade department-modal" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="staticBackdropLabel">Department</h5>
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
      var title=$(this).attr('data-title');    

      $('.department-modal').find('#staticBackdropLabel').text(title);
      $('.department-modal').find('.name').attr('value',name);
      $('.department-modal').find('.id').attr('value',id);

      $('.department-modal').modal('show');
    });
  });

</script>
@endsection





