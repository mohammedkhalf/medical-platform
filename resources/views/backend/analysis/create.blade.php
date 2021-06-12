@extends('backend.layouts.app')

@section('title', __('labels.backend.access.analysis.management') . ' | ' . __('labels.backend.access.analysis.create-profile'))

@section('breadcrumb-links')
    @include('backend.analysis.includes.breadcrumb-links')
@endsection

@section('content')
{{ Form::open(['route' => 'admin.analysis.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post', 'id' => 'create-permission', 'files' => true]) }}

    <div class="card">
        @include('backend.analysis.form')
        @include('backend.components.footer-buttons', [ 'cancelRoute' => 'admin.analysis.index' ])
    </div><!--card-->
    {{ Form::close() }}
@endsection