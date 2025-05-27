@extends('admin.layout.layout')
@section('title', 'Admin Profile')
@section('content')
  
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Category</h1>
        </div>

        <div class="section-body">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Category List</h4>
                            <div class="card-header-action">
                            @if($isAdmin) 
                              <button class="btn btn-primary" data-toggle="modal" data-target="#addCategoryModal">
                                <i class="fas fa-plus"></i> Add
                            </button>
                            @else
                            @can('categories-create')
                            <button class="btn btn-primary" data-toggle="modal" data-target="#addCategoryModal">
                                <i class="fas fa-plus"></i> Add
                              </button> 
                            @endcan
                            @endif
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th>Category Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($categories as $category)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td>{{ $category->name }}</td>
                                            <td>
                                              @if($isAdmin) 
                                                <button class="btn btn-info btn-edit"
                                                    data-id="{{ $category->id }}"
                                                    data-name="{{ $category->name }}"
                                                    data-toggle="modal" data-target="#editCategoryModal">Edit</button>
                                              @else
                                              @can('categories-edit')
                                                    <button class="btn btn-info btn-edit"
                                                    data-id="{{ $category->id }}"
                                                    data-name="{{ $category->name }}"
                                                    data-toggle="modal" data-target="#editCategoryModal">Edit</button>
                                              @endcan
                                              @endif
                                              
                                              @if($isAdmin) 
                                                  <a href="{{ route('product-category.destroy', $category->id) }}" class="btn btn-danger">Delete</a>
                                                  @else
                                              @can('categories-delete')
                                                <a href="{{ route('product-category.destroy', $category->id) }}" class="btn btn-danger">Delete</a>
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

{{-- Add Category Modal --}}
<div class="modal fade" id="addCategoryModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <form action="{{ route('product-category.store') }}" method="POST">
        @csrf
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Add Category</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span>&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <input type="text" class="form-control" name="name" required>
          </div>

          <div class="modal-body">
            <input type="file" class="form-control" name="file" >
          </div>
          <div class="modal-footer">
            <button class="btn btn-primary" type="submit">Add</button>
          </div>
        </div>
      </form>
    </div>
  </div>
  

{{-- Edit Category Modal --}}
<div class="modal fade" id="editCategoryModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form id="editCategoryForm" method="POST">
      @csrf
      @method('PUT')
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit Category</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span>&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="id" id="edit_id">
          <div class="form-group">
            <label>Category Name</label>
            <input type="text" class="form-control" name="name" id="edit_name" required>
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-primary" type="submit">Update</button>
        </div>
      </div>
    </form>
  </div>
</div>


{{-- JS for dynamic form action --}}


@endsection
@section('scripts')
<script>
    $(document).ready(function () {
      $('.btn-edit').on('click', function () {
        var id = $(this).data('id');
        var name = $(this).data('name');
        $('#edit_id').val(id);
        $('#edit_name').val(name);
        var updateUrl = "{{ url('product-category') }}/" + id;
            $('#editCategoryForm').attr('action', updateUrl);
      });
    });

  </script>
@endsection