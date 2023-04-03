
@extends('layouts.admin')
@section('css')

@endsection

@section('content')
  <div class="container-fluid py-4">
      <div class="row">
          <div class="col-12">
            <div class="card mb-4">
              <div class="card-header pb-0">
                <h6>Pages</h6>
              </div>
              <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0">
                  <table class="table align-items-center mb-0">
                    <thead>
                      <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Page</th>
                        
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"></th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"></th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr class="text-center ml-auto">
                        <td>
                          <div class="d-flex px-2 py-1">
                            <h5>About Page</h5>
                          </div>
                        </td>
                        <td class="">
                        </td>
                        <td class="">
                        </td>
                        <td class="ml-auto text-center d-flex">
                          <div class="d-flex px-2 py-1">
                              <a class="btn btn-sm btn-success" href="{{route('admin.pages.setting.about')}}" >About Setting</a>
                          </div>
                        </td>
                      </tr>
                      <tr class="text-center ml-auto">
                        <td>
                          <div class="d-flex px-2 py-1">
                            <h5>Portfolio Page</h5>
                          </div>
                        </td>
                        <td class="">
                        </td>
                        <td class="">
                        </td>
                        <td class="ml-auto text-center d-flex">
                          <div class="d-flex px-2 py-1">
                              <a class="btn btn-sm btn-success" href="{{route('admin.pages.setting.portfolio')}}">Portfolio Setting</a>
                          </div>
                        </td>
                      </tr>
                      <tr class="text-center ml-auto">
                        <td>
                          <div class="d-flex px-2 py-1">
                            <h5>Contact Page</h5>
                          </div>
                        </td>
                        <td class="">
                        </td>
                        <td class="">
                        </td>
                        <td class="ml-auto text-center d-flex">
                          <div class="d-flex px-2 py-1">
                              <button class="btn btn-sm btn-success" >Contact Setting</button>
                          </div>
                        </td>
                      </tr>
                    
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





