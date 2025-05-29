@extends('admin.layout.layout')
@section('title', 'Blog Management')
@section('styles')

@endsection
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h4 class="page-title m-b-0">Blogs Management</h4>
                                <a href="{{ route('blogs-upload.create') }}" class="btn btn-dark">
                                    <i class="fas fa-plus"></i> Create
                                </a>
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
                                                <th>ID</th>
                                                <th>Title</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($blogs as $b)
                                                <tr>
                                                    <td>{{ $b->id }}</td>
                                                    <td>{{ $b->title }}</td>
                                                    <td>
                                                        <span
                                                            class="badge 
                                                                {{ $b->status === 'published' ? 'badge-success' : '' }}
                                                                {{ $b->status === 'draft' ? 'badge-warning' : '' }}">
                                                            {{ ucfirst($b->status) }}
                                                        </span>

                                                    </td>
                                                    <td>
                                                        <div class="d-flex align-items-center" style="gap: 0.3rem;">
                                                            <a href="{{ route('blogs-upload.edit', $b->id) }}"
                                                                class="btn btn-sm btn-info">
                                                                <i class="fas fa-edit"></i>
                                                            </a>
                                                            <form action="{{ route('blogs-upload.destroy', $b->id) }}"
                                                                method="POST" onsubmit="return confirm('Are you sure?')">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-sm btn-danger">
                                                                    <i class="fas fa-trash"></i>
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="4" class="text-center text-muted">No data found</td>
                                                </tr>
                                            @endforelse
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
