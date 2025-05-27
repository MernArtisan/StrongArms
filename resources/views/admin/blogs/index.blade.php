@extends('admin.layout.layout')
@section('title', 'Blog Management')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h4 class="page-title m-b-0">Blogs Management</h4>
                                <a href="{{ route('blogs-upload.create') }}" class="btn btn-dark"><i
                                        class="fas fa-plus"></i> Create</a>
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
                                                <th>status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @forelse ($blogs as $b)
                                            <tr>
                                                <td>{{ $b->id }}</td>
                                                <td>{{ $b->title }}</td>
                                                <td>{{ $b->status }}</td>
                                                <td>
                                                    <a href="{{ route('blogs-upload.edit', $b->id) }}" class="btn btn-info"><i class="fas fa-edit"></i></a>
                                                    <form action="{{ route('blogs-upload.destroy', $b->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')"><i class="fas fa-trash"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <p>No data found</p>
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
