@extends('backend.layouts.app')

@section('title', __('labels.backend.access.specialists.management') . ' | ' . __('labels.backend.access.specialists.edit-profile'))

@section('breadcrumb-links')
    @include('backend.specialists.includes.breadcrumb-links')
@endsection

@section('content')
{{ Form::model($specialist, ['route' => ['admin.specialists.update', $specialist], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'PATCH', 'id' => 'create-permission', 'files' => true]) }}

    <div class="card">
        @include('backend.specialists.form')
        @include('backend.components.footer-buttons', [ 'cancelRoute' => 'admin.specialists.index', 'id' => $specialist->id ])
    </div><!--card-->

    {{ Form::close() }}
@endsection