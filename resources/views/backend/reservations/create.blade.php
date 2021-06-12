@extends('backend.layouts.app')

@section('title', __('labels.backend.access.reservations.management') . ' | ' . __('labels.backend.access.reservations.create-profile'))

@section('breadcrumb-links')
    @include('backend.reservations.includes.breadcrumb-links')
@endsection

@section('content')
{{ Form::open(['route' => 'admin.reservations.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post', 'id' => 'create-permission', 'files' => true]) }}

    <div class="card">
        @include('backend.reservations.form')
        @include('backend.components.footer-buttons', [ 'cancelRoute' => 'admin.reservations.index' ])
    </div><!--card-->
    {{ Form::close() }}
@endsection