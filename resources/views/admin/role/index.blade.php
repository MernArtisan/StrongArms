@extends('admin.layout.layout')
@section('title', 'Roles List')

@section('content')

    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h4 class="page-title m-b-0">Roles List</h4>
                                @if($isAdmin) 
                                <a href="{{ route('role.create') }}" class="btn btn-dark btn-sm">
                                    <i class="fas fa-key"></i> + Create New Role
                                </a>
                                @else
                                @can('role-create')
                                <a href="{{ route('role.create') }}" class="btn btn-dark btn-sm">
                                    <i class="fas fa-key"></i> + Create New Role
                                </a>
                                @endcan
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section">
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-1">
                                        <thead>
                                            <tr>
                                                <th width="2%">ID</th>
                                                <th>Role Name</th>
                                                <th width="15%" class="text-center">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($roles as $key => $role)
                                                <tr>
                                                    <td>{{ $key+1 }}</td>
                                                    <td>{{ $role->name }}</td>
                                                    <td class="text-center">
                                                        @if($isAdmin)
                                                        <a href="{{ route('role.edit', $role->id) }}" class="btn btn-sm btn-primary">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                        @else
                                                        @can('role-edit')
                                                        <a href="{{ route('role.edit', $role->id) }}" class="btn btn-sm btn-primary">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                        @endcan
                                                        @endif

                                                        @if($isAdmin) 
                                                        <form action="{{ route('role.destroy', $role->id) }}" method="POST" style="display:inline-block;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </form>
                                                        @else
                                                        @can('role-delete')
                                                        <form action="{{ route('role.destroy', $role->id) }}" method="POST" style="display:inline-block;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </form>
                                                        @endcan
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection
