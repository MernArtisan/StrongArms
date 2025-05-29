@extends('admin.layout.layout')
@section('title', 'Products')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Products</h1>
            <div class="section-header-button ml-auto">
                @if($isAdmin) 
                <a href="{{ route('product.create') }}" class="btn btn-dark">
                    <i class="fas fa-plus"></i> Add Product
                </a>
                @else
                @can('product-create')
                <a href="{{ route('product.create') }}" class="btn btn-dark">
                    <i class="fas fa-plus"></i> Add Product
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
                                            <th>Product Name</th>
                                            <th>Category</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Description</th>
                                            <th>status</th>
                                            <th>Created At</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($products as $index => $product)
                                            <tr>
                                                <td class="text-center">{{ $index + 1 }}</td>
                                                <td>
                                                    @if($product->image)
                                                        <img src="{{ asset($product->image) }}" width="60" height="60">
                                                    @else
                                                        N/A
                                                    @endif
                                                </td>
                                                <td>{{ $product->name }}</td>
                                                <td>{{ $product->category->name ?? 'N/A' }}</td>
                                                <td>{{ number_format($product->price, 2) }}</td>
                                                <td>{{ $product->quantity }}</td>
                                               
                                                <td>{{ Str::limit($product->description, 50) }}</td>
                                                <td>{{$product->status}}</td>
                                                <td>{{ $product->created_at->format('d M Y') }}</td>
                                                <td>
                                                    @if($isAdmin) 
                                                    <a href="{{ route('product.show', $product->id) }}" class="btn btn-sm btn-warning">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    @else
                                                    @can('product-show')
                                                    <a href="{{ route('product.show', $product->id) }}" class="btn btn-sm btn-warning">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    @endcan
                                                    @endif
                                                    @if($isAdmin) 
                                                    <a href="{{ route('product.edit', $product->id) }}" class="btn btn-sm btn-info"><i class="fas fa-edit"></i></a>
                                                    @else
                                                    @can('product-edit')
                                                    <a href="{{ route('product.edit', $product->id) }}" class="btn btn-sm btn-info"><i class="fas fa-edit"></i></a>
                                                    @endcan
                                                    @endif

                                                    @if($isAdmin) 
                                                    <form action="{{ route('product.destroy', $product->id) }}" method="POST" style="display:inline-block;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>
                                                    @else
                                                    @can('product-delete')
                                                    <form action="{{ route('product.destroy', $product->id) }}" method="POST" style="display:inline-block;">
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
                                        @if ($products->isEmpty())
                                            <tr>
                                                <td colspan="9" class="text-center">No products found.</td>
                                            </tr>
                                        @endif
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

