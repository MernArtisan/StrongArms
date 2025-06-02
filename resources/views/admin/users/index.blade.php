@extends('admin.layout.layout')
@section('title', 'Users')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <div class="section-header-button ml-auto">
                @if ($isAdmin)
                    <a href="{{ route('all-users.create') }}" class="btn btn-dark">
                        <i class="fas fa-plus"></i> Add New
                    </a>
                @else
                    @can('user-create')
                        <a href="{{ route('all-users.create') }}" class="btn btn-dark">
                            <i class="fas fa-plus"></i> Add New
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
                            <ul class="nav nav-tabs mb-4" id="userTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="all-users-tab" data-toggle="tab" href="#all-users" role="tab">All Users</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="providers-tab" data-toggle="tab" href="#providers" role="tab">Providers</a>
                                </li>
                            </ul>

                            <div class="tab-content" id="userTabContent">
                                <!-- All Users Tab -->
                                <div class="tab-pane fade show active" id="all-users" role="tabpanel">
                                    <div class="table-responsive">
                                        <table class="table table-striped" id="table-1">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">#</th>
                                                    <th>Image</th>
                                                    <th>Name</th>
                                                    <th>Role</th>
                                                    <th>Email</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($users->filter(fn($u) => $u->getRoleNames()->contains('customer')) as $index => $u)
                                                        <td class="text-center">{{ $loop->iteration }}</td>
                                                        <td>
                                                            <img src="{{ $u->image ? asset($u->image) : asset('default/default-user.jpg') }}" width="40px" height="40px" alt="">
                                                        </td>
                                                        <td>{{ $u->name }}</td>
                                                        <td>{{ $u->getRoleNames()->join(', ') }}</td>
                                                        <td>{{ $u->email }}</td>
                                                        <td>
                                                            @if ($isAdmin || auth()->user()->can('user-edit'))
                                                                <a href="{{ route('all-users.edit', $u->id) }}" class="btn btn-sm btn-info">
                                                                    <i class="fas fa-edit"></i>
                                                                </a>
                                                            @endif
                                                            @if ($isAdmin || auth()->user()->can('user-delete'))
                                                                <form action="{{ route('all-users.destroy', $u->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this user?');">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="btn btn-sm btn-danger">
                                                                        <i class="fas fa-trash"></i>
                                                                    </button>
                                                                </form>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <!-- Providers Tab -->
                                <div class="tab-pane fade" id="table-1" role="tabpanel">
                                    <div class="table-responsive">
                                        <table class="table table-striped" id="table-providers">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">#</th>
                                                    <th>Image</th>
                                                    <th>Name</th>
                                                    <th>Role</th>
                                                    <th>Email</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($users->filter(fn($u) => $u->getRoleNames()->contains('provider')) as $index => $u)
                                                    <tr>
                                                        <td class="text-center">{{ $index + 1 }}</td>
                                                        <td>
                                                            <img src="{{ $u->image ? asset($u->image) : asset('default/default-user.jpg') }}" width="40px" height="40px" alt="">
                                                        </td>
                                                        <td>{{ $u->name }}</td>
                                                        <td>{{ $u->getRoleNames()->join(', ') }}</td>
                                                        <td>{{ $u->email }}</td>
                                                        <td>
                                                            @if ($isAdmin || auth()->user()->can('user-edit'))
                                                                <a href="{{ route('all-users.edit', $u->id) }}" class="btn btn-sm btn-info">
                                                                    <i class="fas fa-edit"></i>
                                                                </a>
                                                            @endif
                                                            @if ($isAdmin || auth()->user()->can('user-delete'))
                                                                <form action="{{ route('all-users.destroy', $u->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this user?');">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="btn btn-sm btn-danger">
                                                                        <i class="fas fa-trash"></i>
                                                                    </button>
                                                                </form>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div> <!-- tab-content -->
                        </div> <!-- card-body -->
                    </div> <!-- card -->
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function () {
        $('#table-all').DataTable();
        $('#table-providers').DataTable();
    });
</script>
@endsection
