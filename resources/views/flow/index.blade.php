@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <div class="row justify-content-center">
                        <div class="col-6">
                            <h6>Akışlar</h6>
                        </div>
                        <div class="col-6 justify-center">
                            <a href="{{ route('app.flows.create') }}" type="button"
                               class="btn bg-gradient-success float-end">Yeni Akış</a>
                        </div>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0" id="flow-table">
                            <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Akış Adı
                                </th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    Uygulama
                                </th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    Olay
                                </th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Durumu
                                </th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Çalışma Sayısı
                                </th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">

                                </th>
                                <th class="text-secondary opacity-7"></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>

                                <td class="align-middle">
                                    <a href="javascript:;" class="text-secondary font-weight-bold text-xs"
                                       data-toggle="tooltip" data-original-title="Edit user">
                                        Edit
                                    </a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css"/>
    <style>
        .dataTables_paginate {
            float: right;
        }

        .dataTables_paginate.paging_simple_numbers.previous {
            display: flex;
            align-items: center;
            justify-content: center;
            color: #8392ab;
            padding: 0;
            margin: 0 3px;
            border: 1px solid #dee2e6;
            border-radius: 50% !important;
            width: 36px;
            height: 36px;
            font-size: .875rem;
            margin-left: 0;
        }

        .paginate_button.current {
            background: transparent;
            background-color: #825ee4;
            box-shadow: 0 7px 14px rgba(50, 50, 93, .1), 0 3px 6px rgba(0, 0, 0, .08);
            color: #fff;
            border: none;
            border-radius: 50% !important;
        }
    </style>
@endsection
@section('js')
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function () {
            $('#flow-table').DataTable({
                ajax: {
                    url: "{{route('app.flows.all')}}",
                    type: 'GET',
                    data: function (params) {
                        return params;
                    },
                    dataSrc: function (json) {
                        json.draw = json.meta.current_page;
                        json.recordsFiltered = json.meta.to;
                        json.recordsTotal = json.meta.total;
                        return json.data;
                    }
                },
                columns: [
                    {
                        data: 'name',
                        render: function (data, type, row) {
                            return '<div class="d-flex px-2 py-1">' +
                                '<div class="d-flex flex-column justify-content-center"> ' +
                                '<h6 class="mb-0 text-sm">' + data + '</h6> ' +
                                ' </div>' +
                                '</div>'
                        }
                    },
                    {
                        data: 'application', render: function (data, type, row) {
                            return '<p class="text-xs font-weight-bold mb-0">' + data + '</p>'
                        }
                    },
                    {
                        data: 'trigger_name', render: function (data, type, row) {
                            return '<p class="text-xs font-weight-bold mb-0">' + data + '</p>'
                        }
                    },
                    {
                        data: 'status', render: function (data, type, row) {
                            return '<div class="align-middle text-center text-sm">' +
                                '<span class="badge badge-sm bg-gradient-' + ((data ? "success" : "danger")) + '">' + (data ? "Aktif" : "Pasif") + '</span>' +
                                '</div>'
                        }
                    },
                    {
                        data: 'working_count', render: function (data, type, row) {
                            return '<div class="align-middle text-center text-sm">' +
                                ' <span class="text-secondary text-xs font-weight-bold">' + data + '</span>'
                            '</div>'
                        }
                    },
                    {
                        data: '', render: function (data, type, row) {
                            return '<div class="align-middle text-center text-sm">' +
                                '<span style="cursor: pointer" onclick="deleteFlow('+row.id+')" class="badge badge-sm bg-gradient-danger">' +
                                'Sil' +
                                '</span>' +
                                '</div>';
                        }
                    },
                ],
                processing: true,
                serverSide: true,
                dom: 'rtip',
                info: false,
                language: {
                    'paginate': {
                        'previous': '<a class="prev-icon"><</a>',
                        'next': '<a class="next-icon">></a>',
                    }
                }
            });
        });

        function deleteFlow(id){
            let url = "{{ route('app.flows.destroy','_id') }}";
            url =url.replace('_id',id);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "DELETE",
                url: url,
                success: function (response) {
                    console.log('okey');
                    $('#flow-table').DataTable().ajax.reload();
                }
            });
        }
    </script>
@endsection
