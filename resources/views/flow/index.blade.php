@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <div class="row justify-content-center">
                        <div class="col-6">
                            <h6>Flow table</h6>
                        </div>
                        <div class="col-6 justify-center">
                            <a href="#" type="button" class="btn bg-gradient-success float-end">New Flow</a>
                        </div>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0" id="flow-table">
                            <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name
                                </th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    Event Name
                                </th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    Action Name
                                </th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    status
                                </th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Working Count
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
                        data: 'eventName', render: function (data, type, row) {
                            return '<p class="text-xs font-weight-bold mb-0">' + data + '</p>'
                        }
                    },
                    {
                        data: 'actionName', render: function (data, type, row) {
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
                        data: 'workingCount', render: function (data, type, row) {
                            return '<div class="align-middle text-center text-sm">' +
                               ' <span class="text-secondary text-xs font-weight-bold">'+data+'</span>'
                                '</div>'
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
    </script>
@endsection
