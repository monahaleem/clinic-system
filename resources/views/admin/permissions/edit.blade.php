@extends('layouts.app')

@section('page-title')
Permissions
@endsection

@section('content')
<div class="page-head">
	<h2 class="page-head-title">Edit Permission</h2>
	<nav aria-label="breadcrumb" role="navigation">
		<ol class="breadcrumb page-head-nav">
			<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
			<li class="breadcrumb-item"><a href="{{ route('permissions.index') }}">Permissions</a></li>
			<li class="breadcrumb-item active">Edit Permission</li>
		</ol>
	</nav>
</div>
<hr>
<div class="main-content container-fluid">
	<form method="POST" action="{{ route('permissions.update', ['id' => $permission->id]) }}">
		@csrf
		{{ method_field('PUT') }}
		<div class="form-group">
	        <label>Name</label>
	        <input type="text" name="name" class="form-control" value="{{ $permission->name }}">
	    </div><br>
	    <br>
	    <input type="submit" value="Edit" class="btn btn-primary">
	</form>
</div>
@endsection

@section('css')
@endsection

@section('js')

@endsection