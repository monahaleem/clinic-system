@extends('layouts.app')

@section('page-title')
Permissions
@endsection

@section('content')
<div class="page-head">
	<h2 class="page-head-title">Show Permission</h2>
	<nav aria-label="breadcrumb" role="navigation">
		<ol class="breadcrumb page-head-nav">
			<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
			<li class="breadcrumb-item"><a href="{{ route('permissions.index') }}">Permissions</a></li>
			<li class="breadcrumb-item active">Show Permission</li>
		</ol>
	</nav>
</div>
<hr>
<div class="main-content container-fluid">
	<p>
		<h4>Role: {{ auth()->user()->roles()->pluck('name') }}</h4>
		<h4>Permissions: {{ auth()->user()->permissions()->pluck('name') }}</h4>
	</p>
</div>
@endsection

@section('css')
@endsection

@section('js')

@endsection