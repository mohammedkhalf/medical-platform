@extends('backend.layouts.app')

@section('title', __('labels.backend.access.specialists.management') . ' | ' . __('labels.backend.access.specialists.create-profile'))

@section('breadcrumb-links')
    @include('backend.specialists.includes.breadcrumb-links')
@endsection

@section('content')
{{ Form::open(['route' => 'admin.specialists.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post', 'id' => 'create-permission', 'files' => true]) }}

    <div class="card">
        @include('backend.specialists.form')
        @include('backend.components.footer-buttons', [ 'cancelRoute' => 'admin.specialists.index' ])
    </div><!--card-->
    {{ Form::close() }}
@endsection