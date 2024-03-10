@extends('layouts.app')
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
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
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <select class="form-control" id="application-select" name="application-select">
                                            <option>Seçiniz...</option>
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
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-8">
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
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="trigger-parameters-select" class="form-control-label">Olay
                                            Parametreleri</label>
                                        <select class="form-control" id="trigger-parameters-select"
                                                name="trigger-parameters-select">

                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="condition" class="form-control-label">Koşul</label>
                                        <select class="form-control" id="condition-select" name="condition-select">

                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="condition-value" class="form-control-label">Koşul Değeri</label>
                                        <input class="form-control" type="text" name="condition-value"
                                               id="condition-value">
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
                            <div class="row">
                                <div class="col-12">
                                    <label for="actions-application-select" class="form-control-label">Olay
                                        Parametreleri</label>
                                    <select class="form-control" id="actions-application-select"
                                            name="actions-application-select">
                                        @foreach($applications as $application)
                                            <option value="{{$application->id}}"> {{ $application->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-12" id="actions-list-div">
                                    <label for="actions-select" class="form-control-label">Olay Parametreleri</label>
                                    <select class="form-control" id="actions-select" name="actions-select">
                                        <option>Seçiniz...</option>
                                        <option value="product-update">Ürün Güncelle</option>
                                    </select>
                                </div>
                            </div>
                            <div id="actions-params-base-div"></div>
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
        $(document).ready(function () {
            flow.init();
            $('#application-select').select2();
            $('#actions-application-select').select2();
            $('#trigger-select').select2({
                width: '100%',
                ajax: {
                    delay: 250,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: '{{route('app.trigger.all')}}',
                    data: function (params) {
                        var query = {
                            search: params.term,
                        }
                        query.applicationId = flow.triggerApplicationId
                        return query;
                    },
                    processResults: function (data) {
                        var results = [];
                        $.each(data.data, function (index, value) {
                            console.log(value);
                            results.push({
                                id: value.id,
                                text: value.name
                            });
                        });

                        return {
                            "results":results
                        };
                    }
                }
            });
        });

        var flow = {
            init: function () {
                this.listeners();
            },
            params: {
                triggerApplicationId: null,
                triggerApplicationName: null,
                triggerId: null,
                triggerName: null,
                condition: null,
                actionApplicationName: null,
                actionApplicationId: null,
            },
            listeners: function () {
                $('#application-select').on('select2:select', function (e) {
                    flow.triggerApplicationId = e.params.data.id;
                    flow.triggerApplicationName = e.params.data.text;
                });
                $('#trigger-select').on('select2:opening', function (e) {

                });
                $('#actions-application-select').on('select2:select', function (e) {

                });

            }
        }
    </script>
@endsection()

