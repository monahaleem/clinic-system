@extends('layouts.app')

@section('page-title')
Roles
@endsection

@section('content')
<div class="page-head">
	<div class="clearfix">
		<h2 class="page-head-title float-left">Roles</h2>
		<a href="{{ URL::to('roles/create') }}" class="btn btn-success float-right">Add Role</a>
	</div>
	<nav aria-label="breadcrumb" role="navigation">
		<ol class="breadcrumb page-head-nav">
			<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
			<li class="breadcrumb-item"><a href="{{ route('roles.index') }}">Roles</a></li>
			<li class="breadcrumb-item active">Roles</li>
		</ol>
	</nav>
</div>
<hr>
<div class="main-content container-fluid">
	<div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Role</th>
                    <th>Permissions</th>
                    <th>Operation</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($roles as $role)
                <tr>

                    <td>{{ $role->name }}</td>

                    <td>{{ str_replace(array('[',']','"'),'', $role->permissions()->pluck('name')) }}</td>{{-- Retrieve array of permissions associated to a role and convert to string --}}
                    <td>
                    <a href="{{ URL::to('roles/'.$role->id.'/edit') }}" class="btn btn-info pull-left" style="margin-right: 3px;">Edit</a>

                    <form action="{{ route('roles.destroy', ['id' => $role->id]) }}" method="POST">
                    	@csrf
                    	{{ method_field('DELETE') }}
                    	<input type="submit" value="Delete" class="btn btn-danger">
                    </form>

                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>
    </div>
</div>
@endsection

@section('css')
@endsection

@section('js')

@endsection