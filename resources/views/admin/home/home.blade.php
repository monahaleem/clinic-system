@extends('admin.layouts.app')

@section('title')
Dashboard
@endsection

@section('page-title')
<i class="fas fa-cog"></i> Dashboard
@endsection

@section('content')
    <!-- ACTIONS -->
    @include('admin.home.actions')

    @include('admin.home.last_advices')

    @include('admin.home.modals')
@endsection
