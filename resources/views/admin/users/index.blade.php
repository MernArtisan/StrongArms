@extends('admin.layout.layout')
@section('title', 'Users')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <div class="section-header-button ml-auto">
                @if($isAdmin)
                <a href="{{ route('all-users.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Add Users
                </a>
                @else
                @can('user-create')
                <a href="{{ route('all-users.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Add Users
                </a>
                @endcan
                @endif
            </div>
        </div>

        <div class="section-body">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Users List</h4>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="">
                                    <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>email</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $u)
                                            <tr>
                                                <td class="text-center">{{ $loop->iteration }}</td>
                                                <td>
                                                    @if($u->image == null)
                                                        <img src="{{ asset('default/default-user.jpg') }}" width="40px" height="40px" alt="">
                                                    @else
                                                    <img src="{{ asset($u->image) }}" width="40px" height="40px" alt="">
                                                    @endif
                                                    
                                                </td>
                                                <td>{{ $u->name }}</td>
                                                <td>{{ $u->email }}</td>
                                                <td>
                                                    @if($isAdmin) 
                                                    <a href="{{ route('all-users.edit', $u->id) }}" class="btn btn-info">Edit</a>
                                                    @else
                                                    @can('user-edit')
                                                    <a href="{{ route('all-users.edit', $u->id) }}" class="btn btn-info">Edit</a>
                                                    @endcan
                                                    @endif

                                                    @if($isAdmin)
                                                    <form action="{{ route('all-users.destroy', $u->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this user?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                    </form>
                                                    @else
                                                    @can('user-delete')
                                                    <form action="{{ route('all-users.destroy', $u->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this user?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Delete</button>
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

@section('scripts')
<script>
    $(document).ready(function () {
        $('#table-1').DataTable();
    });
</script>
@endsection
