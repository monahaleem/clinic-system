@extends('layouts.app')

@section('page-title')
Permissions
@endsection

@section('content')
<div class="page-head">
	<div class="clearfix">
		<h2 class="page-head-title float-left">Permissions</h2>
		<a href="{{ URL::to('permissions/create') }}" class="btn btn-success float-right">Add Permission</a>
	</div>
	<nav aria-label="breadcrumb" role="navigation">
		<ol class="breadcrumb page-head-nav">
			<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
			<li class="breadcrumb-item"><a href="{{ route('permissions.index') }}">Permissions</a></li>
			<li class="breadcrumb-item active">All Permissions</li>
		</ol>
	</nav>
</div>
<hr>
<div class="main-content container-fluid">
	<div class="table-responsive">
        <table class="table table-bordered table-striped">

            <thead>
                <tr>
                    <th>Permissions</th>
                    <th>Operation</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($permissions as $permission)
                <tr>
                    <td>{{ $permission->name }}</td> 
                    <td>
                    <a href="{{ URL::to('permissions/'.$permission->id.'/edit') }}" class="btn btn-info pull-left" style="margin-right: 3px;">Edit</a>

                    <form method="POST" action="{{ route('permissions.destroy', ['id' => $permission->id]) }}">
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