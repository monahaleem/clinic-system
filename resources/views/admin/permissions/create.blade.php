@extends('layouts.app')

@section('page-title')
Permissions
@endsection

@section('content')
<div class="page-head">
	<h2 class="page-head-title">Add Permission</h2>
	<nav aria-label="breadcrumb" role="navigation">
		<ol class="breadcrumb page-head-nav">
			<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
			<li class="breadcrumb-item"><a href="{{ route('permissions.index') }}">Permissions</a></li>
			<li class="breadcrumb-item active">Add Permission</li>
		</ol>
	</nav>
</div>
<hr>
<div class="main-content container-fluid">
	
	<form method="POST" action="{{ route('permissions.store') }}">
		@csrf
		<div class="form-group">
	        <label>Name</label>
	        <input type="text" name="name" class="form-control">
	    </div><br>
	    @if(!$roles->isEmpty())
	        <h4>Assign Permission to Roles</h4>

	        @foreach ($roles as $role) 
	            <input type="checkbox" id="{{ $role->id }}" name="roles[]" value="{{ $role->id }}">
	            <label for="{{ $role->id }}">{{ ucfirst($role->name) }}</label>
	        @endforeach
	    @endif
	    <br>
	    <input type="submit" value="Add" class="btn btn-primary">
	</form>

</div>
@endsection

@section('css')
@endsection

@section('js')

@endsection