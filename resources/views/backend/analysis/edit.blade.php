@extends('backend.layouts.app')

@section('title', __('labels.backend.access.analysis.management') . ' | ' . __('labels.backend.access.analysis.edit'))

@section('breadcrumb-links')
    @include('backend.analysis.includes.breadcrumb-links')
@endsection

@section('content')
{{ Form::model($analysis, ['route' => ['admin.analysis.update', $analysis], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'PATCH', 'id' => 'create-permission', 'files' => true]) }}

    <div class="card">
        @include('backend.analysis.form')
        @include('backend.components.footer-buttons', [ 'cancelRoute' => 'admin.analysis.index', 'id' => $analysis->id ])
    </div><!--card-->

    {{ Form::close() }}
@endsection