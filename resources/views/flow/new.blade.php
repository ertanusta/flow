@extends('layouts.app')
@section('css')
    <style>
        .select2-selection__rendered {
            line-height: 37px !important;
        }

        .select2-container .select2-selection--single {
            height: 40px !important;
            border-radius: 0.5rem !important;
        }

        .select2-selection__arrow {
            height: 37px !important;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css"/>
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.rtl.min.css"/>
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
                                   id="nav-trigger-tab" data-bs-toggle="tab" data-bs-target="#nav-trigger"
                                   role="tab" aria-controls="nav-trigger" aria-selected="true">
                                    <i class="ni ni-app"></i>
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
                <div class="tab-pane fade show active" id="nav-trigger" role="tabpanel"
                     aria-labelledby="nav-trigger-tab">
                    <div class="d-flex justify-content-center">
                        <div class="card" style="width: 40%">
                            <div class="card-header pb-0">
                                <div class=" ">
                                    <p class="mb-0">Olaylar</p>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center container">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="application-select">Uygulama</label>
                                                <select class="form-control" id="application-select"
                                                        name="application-select" style="width: 100%;">
                                                    <option></option>
                                                    @foreach($applications as $application)
                                                        <option
                                                            value="{{$application->id}}"> {{ $application->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12" id="trigger-select-div" style="display: none;">
                                            <label for="trigger-select">Olay</label>
                                            <div class="form-group">
                                                <select class="form-control" id="trigger-select" name="trigger-select"
                                                        style="width: 100%">
                                                </select>
                                            </div>
                                        </div>
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
                                <button class="btn btn-primary btn-sm ms-auto" id="condition-save-button">Kaydet
                                </button>
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
                                        <select class="form-control" id="condition-select" name="condition-select"
                                                style="line-height: 1.4rem;">
                                            <option>Seçiniz</option>
                                            <option value="=">Eşittir</option>
                                            <option value=">">Büyüktür</option>
                                            <option value="<">Küçüktür</option>
                                            <option value=">=">Büyük Eşittir</option>
                                            <option value="<=">Küçük Eşittir</option>
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
                            <div class="row">
                                <div class="table-responsive p-0">
                                    <table class="table align-items-center mb-0" id="flow-table">
                                        <thead>
                                        <tr>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Uygulama
                                            </th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                Olay
                                            </th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Koşul
                                            </th>
                                            <th class="text-secondary opacity-7"></th>
                                        </tr>
                                        </thead>
                                        <tbody id="condition-body">
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-action" role="tabpanel" aria-labelledby="nav-action-tab">
                    <div class="d-flex justify-content-center">
                        <div class="card" style="width: 40%">
                            <div class="card-header pb-0">
                                <div class="d-flex align-items-center">
                                    <p class="mb-0">Aksiyon</p>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center container">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="actions-application-select"
                                                       class="form-control-label">Uygulama</label>
                                                <select class="form-control" id="actions-application-select"
                                                        name="actions-application-select">
                                                    <option> Seçiniz..</option>
                                                    @foreach($applications as $application)
                                                        <option
                                                            value="{{$application->id}}"> {{ $application->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <label for="actions-select" class="form-control-label">Aksiyon</label>
                                            <select class="form-control" id="actions-select" name="actions-select">
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <div class="card mt-3" id="actions-params-card" style="display: none">
                            <div class="card-header pb-0">
                                <div class="d-flex align-items-center">
                                    <button class="btn btn-primary btn-sm ms-auto" data-bs-toggle="modal"
                                            data-bs-target="#triggerParamsModal">Olay Parametreleri
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row mt-5" id="actions-params">

                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="button" class="btn btn-primary btn-sm ms-auto" data-bs-toggle="modal"
                                        data-bs-target="#modal-save-action">Kaydet
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="triggerParamsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Olay Paramentreleri</h5>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <small>Olay parametrelerinin kullanım örneği: @{{ trigger.stockAmount }} * 5</small>
                    </div>

                    <div class="row" id="triggerParameterList">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0" id="trigger-fields-table">
                                <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Olay Adı
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Kullanımı
                                    </th>
                                </tr>
                                </thead>
                                <tbody id="trigger-fields-body">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn bg-gradient-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-save-action" tabindex="-1" role="dialog" aria-labelledby="modal-save-action"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="card card-plain">
                        <div class="card-header pb-0 text-left">
                            <p class="mb-0">Son bir kaç adım</p>
                        </div>
                        <div class="card-body">
                            <div role="form text-left">
                                <label for="flow-name">Akış Adı</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Akış adı" id="flow-name">
                                </div>
                                <div class="text-center">
                                    <button class="btn btn-primary btn-sm ms-auto" id="flow-save-button">Kaydet</button>
                                </div>
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
        $(document).ready(function () {
            flow.init();
            $('#application-select').select2({
                placeholder: "Uygulama Seçiniz",
                theme: 'bootstrap-5',
                selectionCssClass: "select2--small", // For Select2 v4.1
                dropdownCssClass: "select2--small",
                width: 'style',
            });
            $('#actions-application-select').select2({
                theme: 'bootstrap-5',
                selectionCssClass: "select2--small", // For Select2 v4.1
                dropdownCssClass: "select2--small",
                width: 'style',
            });
            $('#condition-select').select2({
                theme: 'bootstrap-5',
                selectionCssClass: "select2--small", // For Select2 v4.1
                dropdownCssClass: "select2--small",
                width: 'style',
            });
            $('#trigger-parameters-select').select2({
                theme: 'bootstrap-5',
                selectionCssClass: "select2--small", // For Select2 v4.1
                dropdownCssClass: "select2--small",
                width: 'style',
            });
            $('#trigger-select').select2({
                placeholder: "Olay Seçiniz",
                theme: 'bootstrap-5',
                selectionCssClass: "select2--small", // For Select2 v4.1
                dropdownCssClass: "select2--small",
                width: 'style',
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
                        query.applicationId = flow.params.triggerApplicationId
                        return query;
                    },
                    processResults: function (data) {
                        var results = [];
                        $.each(data.data, function (index, value) {
                            results.push({
                                id: value.id,
                                text: value.name,
                                fields: value.fields
                            });
                        });

                        return {
                            "results": results
                        };
                    }
                }
            });
            $('#actions-select').select2({
                theme: 'bootstrap-5',
                selectionCssClass: "select2--small", // For Select2 v4.1
                dropdownCssClass: "select2--small",
                width: 'style',
                ajax: {
                    delay: 250,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: '{{route('app.action.all')}}',
                    data: function (params) {
                        var query = {
                            search: params.term,
                        }
                        query.applicationId = flow.params.actionApplicationId
                        return query;
                    },
                    processResults: function (data) {
                        var results = [];
                        $.each(data.data, function (index, value) {
                            results.push({
                                id: value.id,
                                text: value.name,
                                fields: value.fields
                            });
                        });

                        return {
                            "results": results
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
                triggerFields: null,
                actionApplicationName: null,
                actionApplicationId: null,
                actionFields: null,
                actionId: null,
                actionName: null,
                conditionTemp: {
                    triggerParamId: null,
                    triggerParamName: null,
                    conditionId: null,
                    conditionName: null,
                    value: null,
                }
            },
            conditionTableDelete: function (conditionId) {
                $('#condition-table-row-id-' + conditionId).remove();
            },
            conditionTableAdd: function (conditionObject, conditionId) {
                //todo: burada aynı condition var ise eklemesin
                let row = '<tr id="condition-table-row-id-' + conditionId + '" data-condition-table-condition="' + conditionObject.condition + '">' +
                    '<td class="align-middle"><p class="text-xs font-weight-bold mb-0">' + flow.params.triggerApplicationName + '</p></td>' +
                    '<td class="align-middle"><p class="text-xs font-weight-bold mb-0">' + flow.params.triggerName + '</p></td>' +
                    '<td class="align-middle"><p class="text-xs font-weight-bold mb-0">' + conditionObject.conditionShow + '</p></td>' +
                    '<td class="align-middle"><a onclick="flow.conditionTableDelete(' + conditionId + ')" href="javascript:;"">' +
                    '<i class="ni ni-2x ni-fat-delete"></i>' +
                    '</a></td></tr>';
                document.getElementById('condition-body').innerHTML += row;

            },
            actionParamsBuild: function (fields) {
                let html = '';
                fields.forEach(function (field) {
                    html += flow.formElementBuilder(field);
                });
                document.getElementById('actions-params').innerHTML = html;
            },
            listeners: function () {
                $('#application-select').on('select2:select', function (e) {
                    flow.params.triggerApplicationId = e.params.data.id;
                    flow.params.triggerApplicationName = e.params.data.text;
                    flow.params.triggerName = null;
                    flow.params.triggerId = null;
                    $('#trigger-select-div').css('display', 'block');
                });
                $('#trigger-select').on('select2:select', function (e) {
                    flow.params.triggerId = e.params.data.id;
                    flow.params.triggerName = e.params.data.text;
                    flow.params.triggerFields = e.params.data.fields;
                    $('#trigger-parameters-select').val(null).trigger('change');
                    var newOption = new Option('Seçiniz...', null, false, false);
                    $('#trigger-parameters-select').append(newOption).trigger('change');
                    $.each(e.params.data.fields, function (index, value) {
                        var newOption = new Option(value.name, value.identifier, false, false);
                        $('#trigger-parameters-select').append(newOption).trigger('change');
                    });
                    flow.triggerFieldsListBuild();
                });
                $('#trigger-parameters-select').on('select2:select', function (e) {
                    flow.params.conditionTemp.triggerParamId = e.params.data.id;
                    flow.params.conditionTemp.triggerParamName = e.params.data.text;
                    console.log(flow.params.conditionTemp);

                });
                $('#condition-select').on('select2:select', function (e) {
                    flow.params.conditionTemp.conditionId = e.params.data.id;
                    flow.params.conditionTemp.conditionName = e.params.data.text;
                    console.log(flow.params.conditionTemp);

                });

                $('#actions-application-select').on('select2:select', function (e) {
                    flow.params.actionApplicationId = e.params.data.id;
                    flow.params.actionApplicationName = e.params.data.text;
                    $('#actions-select').val(null).trigger('change');
                });
                $('#actions-select').on('select2:select', function (e) {
                    flow.actionParamsBuild(e.params.data.fields);
                    document.getElementById('actions-params-card').style.display = 'block';
                    flow.params.actionId = e.params.data.id;
                    flow.params.actionName = e.params.data.text;
                });
                $('#condition-save-button').on('click', function () {
                    //todo: aynı conditionı seçmemesini sağlamalıyı mıyız?
                    flow.params.conditionTemp.value = $('#condition-value').val();
                    let conditionObject = {
                        condition: flow.params.conditionTemp.triggerParamId +
                            flow.params.conditionTemp.conditionId +
                            flow.params.conditionTemp.value,
                        conditionShow: flow.params.conditionTemp.triggerParamName + ' ' +
                            flow.params.conditionTemp.conditionId + ' ' +
                            flow.params.conditionTemp.value
                    };
                    flow.conditionTableAdd(conditionObject, Date.now())
                });
                $('#flow-save-button').on('click', function () {
                    flow.flowSave();
                })

            },
            flowSave: function () {
                let conditions = document.querySelectorAll('[data-condition-table-condition]');
                let condition = "";
                let actionParams = document.querySelectorAll('[data-action-param-id]');
                let context = [];
                if (conditions.length) {
                    conditions.forEach(function (item) {
                        condition += item.dataset.conditionTableCondition + "&&";
                    });
                    condition += 1; //todo: burayı kaldır amk bu ne
                } else {
                    condition += "true"
                }
                actionParams.forEach(function (item) {
                    context[item.dataset.actionParamId] = item.value;
                });

                let body = {
                    triggerApplicationId: flow.params.triggerApplicationId,
                    triggerId: flow.params.triggerId,
                    triggerName: flow.params.triggerName,
                    condition: condition,
                    actionApplicationId: flow.params.actionApplicationId,
                    actionId: flow.params.actionId,
                    context: JSON.stringify(Object.assign({}, context)),
                    name: $('#flow-name').val()
                }
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: "POST",
                    url: "{{ route('app.flows.store') }}",
                    data: body,
                    success: function (response) {
                        console.log(response)
                    }
                });

            },
            formElementBuilder: function (field) {
                let html = '<div class="col-3"><div class="form-group">' +
                    '<label for="action-params-' + field.id + '" >' + field.name + '</label>'
                if (field.type === "input") {
                    html += '<input type="text" class="form-control" id="action-params-' + field.id + '" required="' + field.required + '" data-action-param-id="' + field.id + '">'
                }
                //todo: diğer input tipleri eklenecek
                html += '</div></div>';
                return html
            },
            triggerFieldsListBuild: function () {
                console.log(flow.params.triggerFields);
                let html = "";
                flow.params.triggerFields.forEach(function (field) {
                    html += '<tr>' +
                        '<td class="align-middle"><p class="text-xs font-weight-bold mb-0">' + field.name + '</p></td>' +
                        '<td class="align-middle"><p class="text-xs font-weight-bold mb-0">' + field.identifier + '</p></td>' +
                        '</tr>';
                })
                document.getElementById('trigger-fields-body').innerHTML = html;
            }
        }
    </script>
@endsection()

