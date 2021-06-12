@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('labels.backend.access.analysis.management'))

@section('breadcrumb-links')
@include('backend.analysis.includes.breadcrumb-links')
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    {{ __('labels.backend.access.analysis.management') }} <small class="text-muted">{{ __('labels.backend.access.analysis.active') }}</small>
                </h4>
            </div>
            <!--col-->
        </div>
        <!--row-->

        <div class="row mt-4">
            <div class="col">
                <div class="table-responsive">
                    <table id="analysis-table" class="table" data-ajax_url="{{ route("admin.analysis.get") }}">
                        <thead>
                            <tr>
                                <th>{{ trans('labels.backend.access.analysis.table.id') }}</th>
                                <th>{{ trans('labels.backend.access.analysis.table.name') }}</th>
                                <th>{{ trans('labels.backend.access.analysis.table.status') }}</th>
                                <th>{{ trans('labels.backend.access.analysis.table.created_at') }} </th>
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
         $('#analysis-table').dataTable({
                    processing: true,
                    serverSide: true,
                    ajax: {
                        url: $('#analysis-table').data('ajax_url'),
                        type: 'post',
                    },
                    columns: [
                        { data: 'id', name: 'id'},
                        { data: 'name', name: 'name'},
                        { data: 'status', name: 'status'},
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