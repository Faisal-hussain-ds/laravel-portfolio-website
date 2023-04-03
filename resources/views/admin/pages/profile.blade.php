
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
                  <p class="text-uppercase text-sm">Basic Information</p>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Name</label>
                        <input class="form-control" type="text"  name="name" required value="{{Helper::settingValue('name')}}">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Email address</label>
                        <input class="form-control" type="email" name="email" required value="{{Helper::settingValue('email')}}">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Phone</label>
                        <input class="form-control" type="tel" name="phone" value="{{Helper::settingValue('phone')}}" required>
                      </div>
                    </div>
                    
                  </div>
                  <hr class="horizontal dark">
                  <p class="text-uppercase text-sm">Contact Information</p>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Address</label>
                        <input class="form-control" type="text" required name="address" value="{{Helper::settingValue('address')}}">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="example-text-input" class="form-control-label">City</label>
                        <input class="form-control" type="text" required name="city" value="{{Helper::settingValue('city')}}">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Country</label>
                        <input class="form-control" type="text" required name="country" value="{{Helper::settingValue('country')}}">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Postal code</label>
                        <input class="form-control" type="text" name="code" value="{{Helper::settingValue('code')}}">
                      </div>
                    </div>
                  </div>
                  <hr class="horizontal dark">
                  <p class="text-uppercase text-sm">About me</p>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="example-text-input" class="form-control-label">About me</label>
                    
                        <textarea class="form-control" name="about" required type="text" rows="5">{{Helper::settingValue('about')}}
                        </textarea>
                      </div>
                        <div class="d-flex align-items-center mb-3">
                            <button type="submit" class="btn btn-primary btn-sm ms-auto save-btn">Save</button>
                        </div>
                    </div>
                  </div>
                </div>

              </form>
          </div>
        </div>
        
      </div>
    </div>

@endsection


@section('script')

@endsection





