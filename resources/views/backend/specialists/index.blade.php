@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('labels.backend.access.specialists.management'))

@section('breadcrumb-links')
@include('backend.specialists.includes.breadcrumb-links')
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    {{ __('labels.backend.access.specialists.management') }} <small class="text-muted">{{ __('labels.backend.access.specialists.active') }}</small>
                </h4>
            </div>
            <!--col-->
        </div>
        <!--row-->

        <div class="row mt-4">
            <div class="col">
                <div class="table-responsive">
                    <table id="specialists-table" class="table" data-ajax_url="{{ route("admin.specialists.get") }}">
                        <thead>
                            <tr>
                                <th>{{ trans('labels.backend.access.specialists.table.id') }}</th>
                                <th>{{ trans('labels.backend.access.specialists.table.name') }}</th>
                                <th>{{ trans('labels.backend.access.specialists.table.status') }}</th>
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
         $('#specialists-table').dataTable({
                    processing: true,
                    serverSide: true,
                    ajax: {
                        url: $('#specialists-table').data('ajax_url'),
                        type: 'post',
                    },
                    columns: [
                        { data: 'id', name: 'id'},
                        { data: 'name', name: 'name'},
                        { data: 'status', name: 'status'},
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