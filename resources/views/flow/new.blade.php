
@extends('layouts.app')
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection
@section('profile')
    <div class="card shadow-lg mx-4 card-profile-bottom">
        <div class="card-body p-3">
            <div class="row gx-4">
                <div class="col-lg-4 col-md-6 my-sm-auto   mx-auto mt-3">
                    <div class="nav-wrapper position-relative end-0">
                        <ul class="nav nav-pills nav-fill p-1" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link mb-0 px-0 py-1 active d-flex align-items-center justify-content-center"
                                   id="nav-application-tab" data-bs-toggle="tab" data-bs-target="#nav-application"
                                   role="tab" aria-controls="nav-application" aria-selected="true">
                                    <i class="ni ni-app"></i>
                                    <span class="ms-2">Uygulama</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mb-0 px-0 py-1 d-flex align-items-center justify-content-center"
                                   id="nav-trigger-tab" data-bs-toggle="tab" data-bs-target="#nav-trigger" role="tab"
                                   aria-controls="nav-trigger" aria-selected="false">
                                    <i class="ni ni-email-83"></i>
                                    <span class="ms-2">Olay</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mb-0 px-0 py-1 d-flex align-items-center justify-content-center"
                                   id="nav-condition-tab" data-bs-toggle="tab" data-bs-target="#nav-condition"
                                   role="tab" aria-controls="nav-condition" aria-selected="false">
                                    <i class="ni ni-settings-gear-65"></i>
                                    <span class="ms-2">Koşul</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mb-0 px-0 py-1 d-flex align-items-center justify-content-center"
                                   id="nav-action-tab" data-bs-toggle="tab" data-bs-target="#nav-action" role="tab"
                                   aria-controls="nav-action" aria-selected="false">
                                    <i class="ni ni-settings-gear-65"></i>
                                    <span class="ms-2">Aksiyon</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-application" role="tabpanel"
                     aria-labelledby="nav-application-tab">
                    <div class="card">
                        <div class="card-header pb-0">
                            <div class="d-flex align-items-center">
                                <p class="mb-0">Uygulamalar</p>
                                <button class="btn btn-primary btn-sm ms-auto">Kaydet</button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <select class="form-control" id="application-select" name="application-select">
                                            @foreach($applications as $application)
                                                <option value="{{$application->id}}"> {{ $application->name }}</option>
                                            @endforeach
                                      </select>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="tab-pane fade" id="nav-trigger" role="tabpanel" aria-labelledby="nav-trigger-tab">
                  <div class="card">
                      <div class="card-header pb-0">
                          <div class="d-flex align-items-center">
                              <p class="mb-0">Olaylar</p>
                              <button class="btn btn-primary btn-sm ms-auto">Kaydet</button>
                          </div>
                      </div>
                      <div class="card-body">
                          <div class="row">
                              <div class="col-md-6">
                                  <div class="form-group">
                                      <select class="form-control" id="trigger-select" name="trigger-select">

                                      </select>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="tab-pane fade" id="nav-condition" role="tabpanel" aria-labelledby="nav-condition-tab">
                  <div class="card">
                      <div class="card-header pb-0">
                          <div class="d-flex align-items-center">
                              <p class="mb-0">Koşul</p>
                              <button class="btn btn-primary btn-sm ms-auto">Kaydet</button>
                          </div>
                      </div>
                      <div class="card-body">
                          <div class="row">
                              <div class="col-md-6">
                                  <div class="form-group">
                                      <label for="example-text-input" class="form-control-label">Username</label>
                                      <input class="form-control" type="text" value="lucky.jesse">
                                  </div>
                              </div>
                              <div class="col-md-6">
                                  <div class="form-group">
                                      <label for="example-text-input" class="form-control-label">Email address</label>
                                      <input class="form-control" type="email" value="jesse@example.com">
                                  </div>
                              </div>
                              <div class="col-md-6">
                                  <div class="form-group">
                                      <label for="example-text-input" class="form-control-label">First name</label>
                                      <input class="form-control" type="text" value="Jesse">
                                  </div>
                              </div>
                              <div class="col-md-6">
                                  <div class="form-group">
                                      <label for="example-text-input" class="form-control-label">Last name</label>
                                      <input class="form-control" type="text" value="Lucky">
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="tab-pane fade" id="nav-action" role="tabpanel" aria-labelledby="nav-action-tab">
                  <div class="card">
                      <div class="card-header pb-0">
                          <div class="d-flex align-items-center">
                              <p class="mb-0">Aksiyon</p>
                              <button class="btn btn-primary btn-sm ms-auto">Kaydet</button>
                          </div>
                      </div>
                      <div class="card-body">
                          <p class="text-uppercase text-sm">User Information</p>
                          <div class="row">
                              dddd
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
    </div>
@endsection
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
   <script>
       $(document).ready(function() {
           $('#application-select').select2();
           $('#mySelect2').select2({
               ajax: {
                   url: '',
                   data: function (params) {
                       var query = {
                           search: params.term,
                           type: 'public'
                       }

                       // Query parameters will be ?search=[term]&type=public
                       return query;
                   }
               }
           });       });
   </script>
@endsection()

