@extends('layouts.app')

@section('page-title')
Roles
@endsection

@section('content')
<div class="page-head">
	<h2 class="page-head-title">Edit Role</h2>
	<nav aria-label="breadcrumb" role="navigation">
		<ol class="breadcrumb page-head-nav">
			<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
			<li class="breadcrumb-item"><a href="{{ route('roles.index') }}">Roles</a></li>
			<li class="breadcrumb-item active">Edit Role</li>
		</ol>
	</nav>
</div>
<hr>
<div class="main-content container-fluid">
	<form action="{{ route('roles.update', ['id' => $role->id]) }}" method="POST">
		@csrf
		{{ method_field('PUT') }}

	    <div class="form-group">
	        <label for="name">Role Name</label>
	        <input type="text" name="name" class="form-control" id="name" value="{{ $role->name }}">
	    </div>

	    <h5><b>Assign Permissions</b></h5>

	    @foreach ($permissions as $permission)

	        <input type="checkbox" name="permissions[]" id="permission-{{ $permission->id }}" value="{{ $permission->id }}" 
	        	{{ in_array($permission->id, json_decode($role->permissions->pluck('id'))) ? 'checked' : '' }}>
	        <label for="permission-{{ $permission->id }}">{{ ucfirst($permission->name) }}</label>

	    @endforeach
	    <br>
	    <input type="submit" value="Edit" class="btn btn-primary">

    </form>
</div>
@endsection

@section('css')
@endsection

@section('js')

@endsection