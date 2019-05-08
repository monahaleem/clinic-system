@extends('layouts.app')

@section('page-title')
Roles
@endsection

@section('content')
<div class="page-head">
	<h2 class="page-head-title">Add Role</h2>
	<nav aria-label="breadcrumb" role="navigation">
		<ol class="breadcrumb page-head-nav">
			<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
			<li class="breadcrumb-item"><a href="{{ route('roles.index') }}">Roles</a></li>
			<li class="breadcrumb-item active">Add Role</li>
		</ol>
	</nav>
</div>
<hr>
<div class="main-content container-fluid">
	<form action="{{ route('roles.store') }}" method="POST">
		@csrf
	    <div class="form-group">
	        <label for="name">Name</label>
	        <input type="text" name="name" id="name" class="form-control">
	    </div>

    	<h5><b>Assign Permissions</b></h5>

	    <div class='form-group'>
	        @foreach ($permissions as $permission)
	            <input type="checkbox" name="permissions[]" value="{{ $permission->id }}" id="permission-{{ $permission->id }}">
	            <label for="permission-{{ $permission->id }}">{{ $permission->name }}</label>
	        @endforeach
	    </div>

    	<input type="submit" name="Add" class="btn btn-primary">
	</form>
</div>
@endsection

@section('css')
@endsection

@section('js')

@endsection