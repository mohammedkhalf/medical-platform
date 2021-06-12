@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('labels.backend.access.reservations.management'))

@section('breadcrumb-links')
@include('backend.reservations.includes.breadcrumb-links')
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    {{ __('labels.backend.access.reservations.management') }} <small class="text-muted">{{ __('labels.backend.access.reservations.active') }}</small>
                </h4>
            </div>
            <!--col-->
        </div>
        <!--row-->

        <div class="row mt-4">
            <div class="col">
                <div class="table-responsive">
                    <table id="reservations-table" class="table" data-ajax_url="{{ route("admin.reservations.get") }}">
                        <thead>
                            <tr>
                                <th>{{ trans('labels.backend.access.reservations.table.id') }}</th>
                                <th>{{ trans('labels.backend.access.reservations.table.name') }}</th>
                                <th>{{ trans('labels.backend.access.reservations.table.age') }}</th>
                                <th>{{ trans('labels.backend.access.reservations.table.phone_number') }}</th>
                                <th>{{ trans('labels.backend.access.reservations.table.clinic_id') }} </th>
                                <th>{{ trans('labels.backend.access.reservations.table.price') }} </th>
                                <th>{{ trans('labels.backend.access.reservations.table.created_at') }} </th>
                                <th>{{ trans('labels.general.actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
            <!--col-->
        </div>
        <!--row-->
    </div>
    <!--card-body-->
</div>
<!--card-->
@endsection

@section('pagescript')
<script>
       FTX.Utils.documentReady(function() {
         $('#reservations-table').dataTable({
                    processing: true,
                    serverSide: true,
                    ajax: {
                        url: $('#reservations-table').data('ajax_url'),
                        type: 'post',
                    },
                    columns: [
                        { data: 'id', name: 'id'},
                        { data: 'name', name: 'name'},
                        { data: 'age', name: 'age'},
                        { data: 'phone_number', name: 'phone_number'},
                        { data: 'clinic_id', name: 'clinic_id'},
                        { data: 'price', name: 'price'},
                        { data: 'created_at', name: 'created_at'},
                        { data: 'actions', name: 'actions', searchable: false, sortable: false }
                    ],
                    order: [[0, "asc"]],
                    searchDelay: 500,
                    "createdRow": function (row, data, dataIndex) {
                        FTX.Utils.dtAnchorToForm(row);
                    }
                });
    });
</script>

@stop