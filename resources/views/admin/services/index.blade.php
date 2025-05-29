@extends('admin.layout.layout')
@section('title', 'Service')

@section('content')
     @php
        $isProvider = Auth::check() && Auth::user()->hasRole('provider');
    @endphp
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <div class="section-header-button ml-auto">
                    @if ($isProvider)
                        <a href="{{ route('service.create') }}" class="btn btn-dark">
                            <i class="fas fa-plus"></i> Add Services
                        </a>
                    @else
                        @can('service-create')
                            <a href="{{ route('service.create') }}" class="btn btn-dark">
                                <i class="fas fa-plus"></i> Add Services
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
                                <h4>Services List</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-1">
                                        <thead>
                                            <tr>
                                                <th class="text-center">#</th>
                                                <th>Image</th>
                                                <th>Name</th>
                                                <th>Description</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($services as $u)
                                                <tr>
                                                    <td class="text-center">{{ $loop->iteration }}</td>
                                                    <td>
                                                        @if ($u->image == null)
                                                            <img src="{{ asset('default/default-user.jpg') }}"
                                                                width="40px" height="40px" alt="">
                                                        @else
                                                            <img src="{{ asset($u->image) }}" width="40px" height="40px"
                                                                alt="">
                                                        @endif
                                                    </td>
                                                    <td>{{ $u->name }}</td>
                                                    <td>{{ $u->description }}</td>
                                                    <td>
                                                        <div style="display: flex; align-items: center;">
                                                            @if ($isProvider)
                                                                <a href="{{ route('service.edit', $u->id) }}"
                                                                    class="btn btn-sm btn-info"
                                                                    style="margin-right: 0.5rem;">
                                                                    <i class="fas fa-edit"></i>
                                                                </a>
                                                            @else
                                                                @can('service-edit')
                                                                    <a href="{{ route('service.edit', $u->id) }}"
                                                                        class="btn btn-sm btn-info"
                                                                        style="margin-right: 0.5rem;">
                                                                        <i class="fas fa-edit"></i>
                                                                    </a>
                                                                @endcan
                                                            @endif
                                                            @if ($isProvider || $isAdmin)
                                                                <form action="{{ route('service.destroy', $u->id) }}"
                                                                    method="POST"
                                                                    onsubmit="return confirm('Are you sure you want to delete this user?');"
                                                                    style="margin: 0;">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="btn btn-sm btn-danger">
                                                                        <i class="fas fa-trash"></i>
                                                                    </button>
                                                                </form>
                                                            @else
                                                                @can('service-delete')
                                                                    <form action="{{ route('service.destroy', $u->id) }}"
                                                                        method="POST"
                                                                        onsubmit="return confirm('Are you sure you want to delete this user?');"
                                                                        style="margin: 0;">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit" class="btn btn-sm btn-danger">
                                                                            <i class="fas fa-trash"></i>
                                                                        </button>
                                                                    </form>
                                                                @endcan
                                                            @endif
                                                        </div>
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
        $(document).ready(function() {
            $('#table-1').DataTable();
        });
    </script>
@endsection
