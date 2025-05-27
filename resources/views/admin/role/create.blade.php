@extends('admin.layout.layout')
@section('title', 'Create New Role')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="page-title m-b-0">Create Role</h4>
                        <a href="{{ route('role.index') }}" class="btn btn-dark">
                            <i class="fas fa-arrow-left"></i> Back To List
                        </a>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('role.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <!-- Role Name -->
                            <div class="form-group">
                                <label for="name" class="text-dark font-weight-bold">Role Name</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-dark text-white"><i class="fas fa-key"></i></span>
                                    </div>
                                    <input type="text" class="form-control" id="name" name="name"
                                           value="{{ old('name') }}" placeholder="Enter role name" required>
                                </div>
                                @error('name')
                                    <small id="nameError" class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Assign Permissions -->
                            <div class="form-group">
                                <label for="permissions" class="text-dark font-weight-bold">Assign Permissions</label>
                                <div class="border border-info p-3 rounded">
                                    <!-- "Select All" Checkbox -->
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="checkbox" id="select-all">
                                        <label class="form-check-label text-dark font-weight-bold" for="select-all">
                                            Select All
                                        </label>
                                    </div>
                                    <hr>
                                    @php
                                    // Group permissions by module
                                    $groupedPermissions = [];
                                    foreach ($permissions as $permission) {
                                        [$module, $action] = explode('-', $permission->name);
                                        $groupedPermissions[$module][$action] = $permission->id;
                                    }
                                @endphp
                                
                                <div class="table-responsive">
                                    <table class="table table-bordered text-center">
                                        <thead class="thead-light">
                                            <tr>
                                                <th class="text-start">Module</th>
                                                <th>Select All</th>
                                                <th>View</th>
                                                <th>Create</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                                <th>Show</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($groupedPermissions as $module => $actions)
                                                <tr>
                                                    <td class="text-start"><strong>{{ ucfirst($module) }}</strong></td>
                                                    <td>
                                                        <input type="checkbox" class="select-module" data-module="{{ $module }}">
                                                    </td>
                                                    @foreach (['view', 'create', 'edit', 'delete', 'show'] as $action)
                                                        <td>
                                                            @if (isset($actions[$action]))
                                                                <input type="checkbox"
                                                                       name="permissions[]"
                                                                       value="{{ $actions[$action] }}"
                                                                       class="permission-checkbox {{ $module }}-perm">
                                                            @else
                                                                —
                                                            @endif
                                                        </td>
                                                    @endforeach
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                
                                @error('permissions')
                                    <small id="permissionsError" class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Submit Button -->
                            <div class="form-group">
                                <button type="submit" class="btn btn-dark">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>

    @section('scripts')
        <script>
            // Select/Deselect all permissions when "Select All" checkbox is toggled
            document.getElementById('select-all').addEventListener('change', function () {
                var checkboxes = document.querySelectorAll('.permission-checkbox');
                for (var checkbox of checkboxes) {
                    checkbox.checked = this.checked;
                }
            });

            
        </script>

        <script>
            $(document).ready(function () {
                $('.select-module').on('change', function () {
                    let module = $(this).data('module');
                    $('.' + module + '-perm').prop('checked', $(this).prop('checked'));
                });
            });
        </script>

        
    @endsection
@endsection
