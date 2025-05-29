@extends('admin.layout.layout')
@section('title', 'Products')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Home Banner</h1>
                <div class="section-header-button ml-auto">
                    @if ($isAdmin)
                        <a href="{{ route('homebanner.create') }}" class="btn btn-dark">
                            <i class="fas fa-plus"></i> Add Banner
                        </a>
                    @else
                        @can('product-create')
                            <a href="{{ route('homebanner.create') }}" class="btn btn-dark">
                                <i class="fas fa-plus"></i> Add Banner
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
                                <h4>Product List</h4>
                            </div>

                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-1">
                                        <thead>
                                            <tr>
                                                <th class="text-center">#</th>
                                                <th>Image</th>
                                                <th>Title</th>
                                                <th>Description</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($home_banners as $banner)
                                                <tr>
                                                    <td class="text-center align-middle">{{ $loop->iteration }}</td>
                                                    <td class="align-middle">
                                                        <img src="{{ asset('/uploads/homebanners/' . $banner->image) }}"
                                                            alt="banner" width="100" height="80"
                                                            style="object-fit: cover; border-radius: 10px;">
                                                    </td>
                                                    <td class="align-middle" style="min-width: 150px;">{{ $banner->title }}
                                                    </td>
                                                    <td class="align-middle"
                                                        style="color: black !important; min-width: 200px;">
                                                        {{ strip_tags($banner->description) }}
                                                    </td>
                                                    <td class="align-middle">
                                                        <span
                                                            class="badge {{ $banner->status ? 'badge-success' : 'badge-danger' }}">
                                                            {{ $banner->status ? 'Active' : 'Inactive' }}
                                                        </span>
                                                    </td>
                                                    <td class="align-middle">
                                                        <div class="d-flex align-items-center" style="gap: 0.3rem;">
                                                            <a href="{{ route('homebanner.edit', $banner->id) }}"
                                                                class="btn btn-sm btn-info">
                                                                <i class="fas fa-edit"></i>
                                                            </a>
                                                            <form action="{{ route('homebanner.destroy', $banner->id) }}"
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
