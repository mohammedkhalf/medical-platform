@extends('backend.layouts.app')

@section('title', __('labels.backend.access.reservations.management') . ' | ' . __('labels.backend.access.reservations.edit'))

@section('breadcrumb-links')
    @include('backend.reservations.includes.breadcrumb-links')
@endsection

@section('content')
{{ Form::model($reservation, ['route' => ['admin.reservations.update', $reservation], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'PATCH', 'id' => 'create-permission', 'files' => true]) }}

    <div class="card">
        @include('backend.reservations.form')
        @include('backend.components.footer-buttons', [ 'cancelRoute' => 'admin.reservations.index', 'id' => $reservation->id ])
    </div><!--card-->

    {{ Form::close() }}
@endsection