@extends('admin.layout.layout')
@section('title', 'Products')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Home Banner</h1>
            <div class="section-header-button ml-auto">
                @if($isAdmin) 
                <a href="{{ route('homebanner.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Add Banner
                </a>
                @else
                @can('product-create')
                <a href="{{ route('homebanner.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Add banner
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
                                <table class="table table-striped" id="">
                                    <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th>Image</th>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($home_banners as $banner)
                                        <tr>
                                            <td class="text-center">{{ $loop->index + 1 }}</td>
                                            <td><img src="{{ asset('/uploads/homebanners/'.$banner->image) }}" alt="" width="100px" height="100px"></td>
                                            <td>{{ $banner->title }}</td>
                                            <td><span style="color: black !important">{{ strip_tags($banner->description) }}</span></td>
                                            <td>{{ $banner->status ? 'Active' : 'Inactive' }}</td>
                                            <td>
                                                <a href="{{ route('homebanner.edit', $banner->id) }}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                                <form action="{{ route('homebanner.destroy', $banner->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')"><i class="fas fa-trash"></i></button>
                                                </form>
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
